<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Requests\CreateEventRequest;

class EventController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Event $event)
    {
        // Delete the event
        $event->delete();

        // Set alert for index page

        // Show the index page

    }

    /**
     * Render the event menu page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('directevents.admin.events.index');
    }

    /**
     * Shows all the events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $events = Event::all();
        return view('directevents.admin.events.showAll', compact('events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Event $event)
    {
        return view('directevents.admin.events.show', compact('event'));
    }

    /**
     * Show the form for creating a new event.
      *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all the domains
        $domains = \App\Domain::all();

        return view('directevents.admin.events.create',compact('domains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $validated = $request->validated();

        $event= new \App\Event;
        if($request->hasfile('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            $event->filename=$name;
        }
        $event->name=$request->get('name');
//        $date=date_create($request->get('days'));
//        $format = date_format($date,"Y-m-d");
//        $event->days = strtotime($format);
        $event->days = $request->get('days');

        $event->price_ground=$request->get('price_ground');
        $event->price_ground_all_days=$request->get('price_ground_all_days');
        $event->price_stand=$request->get('price_stand');
        $event->price_stand_all_days=$request->get('price_stand_all_days');
        $event->domain=$request->get('domain');
        $event->address=$request->get('address');
        $event->street_number=$request->get('street_number');
        $event->addition=$request->get('addition');
        $event->zipcode=$request->get('zipcode');
        $event->city=$request->get('city');
        $event->country=$request->get('country');
        $event->save();

        return redirect('admin/evenementen')->with('success', 'Evenement is aangemaakt');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tld, $id)
    {
        // Get the event by ID
        $event = \App\Event::where('id', $id)->first();

        // Get all the domains
        $domains = \App\Domain::all();

        return view('directevents.admin.events.edit',compact('event', 'domains'));
    }

    /**
     * Show the map with the numbers
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function plattegrond($tld, $id)
    {
        // Get the event by ID
        $event = \App\Event::where('id', $id)->first();

        $standhouders = $event->users();

        return view('directevents.admin.events.plattegrond',compact('event', '$standhouders'));
    }
}
