<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientRegistrationController extends Controller
{
    public function create()
    {
        return view('pages.patient-register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:patients,email|email',
            'phone_number' => 'required',
        ]);

        $patient = new Patient;
        $patient->name = $validatedData['name'];
        $patient->last_name = $validatedData['last_name'];
        $patient->email = $validatedData['email'];
        $patient->phone_number = $validatedData['phone_number'];
        $patient->is_guest = true;
        $patient->save();

        return redirect()->route('home');
    }
}
