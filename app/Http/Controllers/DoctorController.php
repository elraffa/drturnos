<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Availability;

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

        return view('pages.doctors.index', ['doctors' => $doctors]);
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
    
        return view('pages.doctors.show', compact('doctor'));
    }

    public function updateAvailability( $id, Request $request )
    {
        $doctor = Doctor::findOrFail( $id );

        $availability = $request->input('availability');

        // $doctor->setAvailability($availability);

        return view('pages.doctors.doctor-edit', ['doctor' => $doctor]); 
    }
    public function saveAvailability(Request $request)
    {
        dump($request->all());
        $data = $request->availability;
    
        $json = json_encode($data);

        dump($json);
    
        $doctorAvailability = new Availability();
        dump($doctorAvailability);
        $doctorAvailability->availability_date = $json;
        // $doctorAvailability->doctor_id = $request->input('doctor_id');
        // $doctorAvailability->save();
    
        //return redirect()->back()->with('success', 'Availability saved successfully');
    }
    
}
