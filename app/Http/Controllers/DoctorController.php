<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Show the doctors index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors.index', ['doctors' => $doctors]);
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
    
        return view('doctors.show', compact('doctor'));
    }
    
}
