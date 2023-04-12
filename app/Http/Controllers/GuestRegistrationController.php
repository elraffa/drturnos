<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Patient;
use App\Models\Event;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GuestRegistrationController extends Controller
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

        return view('guest.guest-register', compact('events'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // DB Transaction
        DB::transaction(function () use ($request) {
            $validatedData = $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:patients',
                'phone_number' => 'required|unique:patients',
                'street_address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postal_code' => 'required',
                'dni' => 'required|unique:patients',
                'insurance_name' => 'required',
                'insurance_number' => 'required|unique:patients'
            ], [
                'name.required' => 'El nombre es requerido',
                'last_name.required' => 'El apellido es requerido',
                'email.required' => 'El email es requerido',
                'email.email' => 'El email debe ser válido',
                'email.unique' => 'El email ya está en uso',
                'phone_number.required' => 'El número de teléfono es requerido',
                'phone_number.unique' => 'El número de teléfono ya está en uso',
                'street_address.required' => 'La dirección es requerida',
                'city.required' => 'La ciudad es requerida',
                'state.required' => 'El estado es requerido',
                'postal_code.required' => 'El código postal es requerido',
                'dni.required' => 'El DNI es requerido',
                'dni.unique' => 'El DNI ya está en uso',
                'insurance_name.required' => 'El nombre de la obra social es requerido',
                'insurance_number.required' => 'El número de la obra social es requerido',
                'insurance_number.unique' => 'El número de la obra social ya está en uso'
            ]
            );

            // $guest = new Guest();
            // $guest->name = $validatedData['name'];
            // $guest->last_name = $validatedData['last_name'];
            // $guest->email = $validatedData['email'];
            // $guest->phone_number = $validatedData['phone_number'];
            // $guest->save();

            $patient = new Patient();
            $patient->name = $validatedData['name'];
            $patient->last_name = $validatedData['last_name'];
            $patient->email = $validatedData['email'];
            $patient->phone_number = $validatedData['phone_number'];
            $patient->street_address = $validatedData['street_address'];
            $patient->city = $validatedData['city'];
            $patient->state = $validatedData['state'];
            $patient->postal_code = $validatedData['postal_code'];
            $patient->dni = $validatedData['dni'];
            $patient->insurance_name = $validatedData['insurance_name'];
            $patient->insurance_number = $validatedData['insurance_number'];
            $patient->save();

            $doctor = Doctor::find($request->input('doctor_id'));
            $event = new event();
            $event->event = "Cita de " . $patient->last_name . " con el Dr. " . $doctor->last_name;
            $event->patient_id = $patient->id;
            $event->doctor_id = $request->input('doctor_id');
            $event->start_date = $request->input('start_date');
            $event->end_date = $request->input('end_date');
            $event->save();
        });

        return redirect('guest/guest-register')->with('success', 'Gracias por registrarte.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
