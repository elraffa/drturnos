<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        
        $patients = Patient::all();

        if ($searchTerm) {
            $patients = Patient::query()
            ->where('name', 'LIKE', "%{$searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$searchTerm}%")
            ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
            ->get();
     }
        return view('pages.patients.patients', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.patients.patient-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    
    {
           
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
        
            Patient::create($validatedData);

            return redirect()->route('patients.index')->with('success', 'Paciente agregado con éxito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {

        $patient = Patient::findOrFail($patient->id);

        return view('pages.patients.patient-edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient = Patient::findOrFail($patient->id);

        $patient->name = $request->input('name');
        $patient->last_name = $request->input('last_name');
        $patient->email = $request->input('email');
        $patient->phone_number = $request->input('phone_number');
        $patient->dni = $request->input('dni');
        $patient->street_address = $request->input('street_address');
        $patient->city = $request->input('city');
        $patient->state = $request->input('state');
        $patient->postal_code = $request->input('postal_code');
        $patient->insurance_name = $request->input('insurance_name');
        $patient->insurance_number = $request->input('insurance_number');

        $patient->save();

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index');
    }
}
