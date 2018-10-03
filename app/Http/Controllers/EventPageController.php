<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterEventRequest;
use App\User;
use App\EventUser;

class EventPageController extends Controller
{
    private $domainEventJson;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->domainEventJson = json_decode(file_get_contents(base_path().'\config\domainEvent.json'), true);
    }

    /**
     * Renders the event if the domain exists
     *
     * @param string $domain
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renderEvent($domain)
    {
        // Check if domain exists or through 404 not found
        $domainDetails = \App\Domain::where('domein', $domain)->firstOrFail();

        // @todo load strings

        // Save the domainDetails to the session
        session(['domainDetails' => $domainDetails]);

        $userType = false;
        if (\Auth::user()){
            if (\Auth::user()->hasRole('standhouder')) {
                $userType = 'standhouder';
            }
        }

        // Get all the sell types
        $sellTypes = \App\SellTypes::all();

        $view = 'event_templates.'.$domainDetails['template'].'.index';

        if (\View::exists($view)) {
            // return the view that corresponds to the domain
            return view($view)->with([
                'domainDetails' => $domainDetails,
                'authenticated' => \Auth::user(),
                'userType' => $userType,
                'sellTypes' => $sellTypes,
                'user' => \Auth::user()]);
        } else {
            Log::error('view ' . $view . ' couldn\'t be loaded');
            abort(404);
        }
    }

    /**
     * Login a user on an event page
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $credentials = $request->validated();

        if (\Auth::attempt($credentials)) {
            // Authentication passed...
            return response()->json(['authenticated' => true, 'message' => 'The user is authenticaed',
                'user' => \Auth::user()]);
        }

        return response()->json(['authenticated' => false, 'message' => 'The credentials are invalid']);
    }

    public function registerEvent(RegisterEventRequest $request)
    {

        // The incoming request is valid...

        // Retrieve the validated input data...
        $data = $request->validated();
//        dd($data);

        // Get event
        if ($request->session()->has('domainDetails')) {
            $eventId = session('domainDetails')['event_id'];
        } else {
            // Fallback in case of expired session
            $eventId = $request->input('eventId');
        }
        $event = \App\Event::where('id', $eventId)->get();

        // Check if event exists
        if ($event->isEmpty()) {
            // Event doesn't exist or session is gone.
            return response()->json(['error' => 'evenement niet gevonden']);
        } else {
            // Because of the get it could return more than one event
            // but we only want the first
            $event = $event[0];
        }

        // Check if User didn't sign up to this event allready
        if (User::checkIfUserIsSubscribedToEvent($event)) {
            // User signed up allready
            return response()->json(['error' => 'Je bent al aangemeld voor deze markt. Je kunt inloggen om je gegevens in te zien.']);
        }
        // User didn't sign up yet

        // Create record
        $eventUserData = array(
                'event' => $event,
                'eventExtra' => $data
            );
        $eventUser = \Auth::user()->assignEventUser($eventUserData);

        return $eventUser;
    }
}
