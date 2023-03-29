<?php

use App\Models\Doctor;
use App\Models\Patient;

    $doctors = Doctor::all();
    $patients = Patient::all();

?>

<x-app-layout>
    @if (session('success'))
        <div class="js-success-message w-full text-white p-6 bg-green-700">
            {{ session('success') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Area de Pacientes</h1>
                <hr class="mt-2 mb-6">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Agendar una cita</h3>
                                <p class="mt-1 text-sm text-gray-600">Seleccione los datos para agregar una cita.</p>
                            </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">

                                <form method="POST" action="{{ route('events.store') }}">
                                @csrf

                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="doctor" class="block text-sm font-medium leading-6 text-gray-900">Médico</label>
                                                    <select name="doctor_id" id="doctor_id" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->last_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Paciente</label>
                                                    <select name="patient_id" id="patient_id" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    @foreach ($patients as $patient)
                                                        <option value="{{ $patient->id }}">{{ $patient->name}} {{$patient->last_name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <div>
                                                        <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Fecha y hora inicio:</label>
                                                        <input 
                                                            type="datetime-local" 
                                                            id="start_date"
                                                            name="start_date" 
                                                            min="{{ now()->format('Y-m-d\TH:i') }}" 
                                                            hour-range="9-17"
                                                            class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <div>
                                                        <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">Fecha y Hora de finalización:</label>
                                                        <input 
                                                            type="datetime-local" 
                                                            id="end_date"
                                                            name="end_date"           
                                                            hour-range="9-17"
                                                            class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{__('Calendar')}}</h1>
                <hr class="mt-2 mb-6">
                    <div class="mt-10 sm:mt-0">
                        <div id="calendar"></div>
                    </div>            
                </div>
            </div>
        </div>
    </div>

    @push('scripts');
    <script>    

        var citasEvents = @json($events);

    </script>
    @endpush
   
</x-app-layout>
