<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Doctor;
use App\Models\Patient;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_events = Event::all();

        $events = [];

        foreach ($all_events as $event) {
           $events[] = [
            'title' => $event->event,
            'start' => $event->start_date,
            'end'   => $event->end_date,
           ];
        }

        //return view('pages.calendar', compact('events'));
        return view('pages.events.events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    
    {
           
        $event = new Event;
        $doctor = Doctor::find($request->doctor_id);
        $patient = Patient::find($request->patient_id);
        $event->event = "Cita de " . $patient->last_name . " con el Dr. " . $doctor->last_name;
        $event->patient_id = $request->patient_id;
        $event->doctor_id = $request->doctor_id;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->save();

        return redirect()->route('events.index')->with('success', 'El turno fue agregado con exito. Puede revisarlo en el calendario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update($request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
