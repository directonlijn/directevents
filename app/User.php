<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\EventUser;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Returns the role for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    /**
     * Does the user have a particular role?
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }
        return false;
    }

    /**
     * Assign a role to the user
     *
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    /**
     * Remove a role from a user
     *
     * @param $role
     * @return mixed
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * Returns the events for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }

    /**
     * Returns the eventsExtra data for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventsExtra()
    {
        return $this->belongsToMany('App\EventUser')->withTimestamps();
    }

    /**
     * Does the user have a particular event?
     *
     * @param $name
     * @return bool
     */
    public function hasEvent($name)
    {
        foreach ($this->events as $event)
        {
            if ($event->name == $name) return true;
        }
        return false;
    }

    /**
     * Assign a event to the user
     *
     * @param $event
     * @return mixed
     */
//    public function assignEvent($event)
//    {
//        return $this->events()->attach($event);
//    }

    /**
     * Assign a event to the user
     *
     * @param $eventExtra
     * @return mixed
     */
    public function assignEventUser($eventUserData)
    {
//        dd($eventUserData['eventExtra']);
//        dd($eventUserData['event']);
//        dd($eventUserData['event']['id']);
        // Create new event
        $eventUser = new EventUser;

        // Set event extra data
        $eventUser->event_id = $eventUserData['event']->id;
        $eventUser->user_id = \Auth::user()->id;
        $eventUser->food = $eventUserData['eventExtra']['foodType'];
        $eventUser->sell_types = implode (", ", $eventUserData['eventExtra']['sellTypes']);
        $eventUser->ground_spots = $eventUserData['eventExtra']['groundSpots'];
        $eventUser->stalls = $eventUserData['eventExtra']['stalls'];

        // Save the eventUser
        $eventUser->save();

        // Return the new eventUser model
        return $eventUser;
    }

    /**
     * Remove a role from a user
     *
     * @param $event
     * @return mixed
     */
    public function removeEvent($event)
    {
        return $this->events()->detach($event);
    }

    public static function checkIfUserIsSubscribedToEvent($event)
    {
        // Transform $event to eventId
        $eventId = (variableIsModel($event)) ? $event->id : $event;

        $signedUp = EventUser::where(['event_id' => $eventId, 'user_id' => \Auth::user()->id])->get();

        return (count($signedUp) > 0);
    }
}
