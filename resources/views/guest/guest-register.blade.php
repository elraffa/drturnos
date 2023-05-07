<?php

use App\Models\Doctor;
use App\Models\Patient;

    $doctors = Doctor::all();
    $patients = Patient::all();

?>


<x-guest-layout>
@if (session('success'))
    <div class="js-success-message w-full text-white p-6 bg-green-700">
        {{ session('success') }}
    </div>
@endif
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="col-span-6 sm:col-span-3 m-6">
                    <label for="doctor" class="block text-sm font-medium leading-6 text-gray-900">Seleccionar Médico</label>
                        <select name="doctor_id" id="doctor_id" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->last_name }}</option>
                        @endforeach
                        </select>
                        <button id="check-availability-btn" class="inline-flex justify-center rounded-md bg-indigo-600 my-4 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Buscar disponibilidad</button>
                </div>
                <div class="p-6">

                <div class="my-10 sm:mt-0">
                    <div id="guest-calendar"></div>
                </div>  
                    
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Solicita un turno</h1>
                <hr class="mt-2 mb-6">
                <div class="py-12">

                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Ingresa tus datos</h3>
                                <p class="mt-1 text-sm text-gray-600">Te pedimos que ingreses tus datos para registrar tu turno.</p>
                            </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">

                            <form id="guest-form" action="{{ route('guest.register.store') }}" method="POST">
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
                                        <div></div>
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
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                            <input type="text" name="name" id="first-name"  value="{{ old('name') }}"  autocomplete="given-name" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('name')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" autocomplete="family-name" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('last_name')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                            <input type="text" name="email" id="email" value="{{ old('email') }}" autocomplete="email" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('email')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Número de teléfono:</label>
                                            <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('phone_number')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="dni" class="block text-sm font-medium leading-6 text-gray-900">DNI</label>
                                            <input type="text" name="dni" id="dni" autocomplete="dni" value="{{ old('dni') }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('dni')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="insurance_name" class="block text-sm font-medium leading-6 text-gray-900">Obra Social / Prepaga</label>
                                            <input type="text" name="insurance_name" id="insurance_name" autocomplete="insurance_name" value="{{ old('insurance_name') }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('insurance_name')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="insurance_number" class="block text-sm font-medium leading-6 text-gray-900">Número de Socio OS</label>
                                            <input type="text" name="insurance_number" id="insurance_number" autocomplete="insurance_number" value="{{ old('insurance_number') }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('insurance_number')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6">
                                            <label for="street_address" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                                            <input type="textarea" name="street_address" id="street_address" autocomplete="street_address" value="{{ old('street_address') }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('street_address')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Ciudad</label>
                                            <input type="text" name="city" id="city" autocomplete="address-level2" value="{{ old('city') }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('city')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="state" class="block text-sm font-medium leading-6 text-gray-900">Provincia</label>
                                            <input type="text" name="state" id="state" value="{{ old('state') }}" autocomplete="address-level1" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('state')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                            <label for="postal_code" class="block text-sm font-medium leading-6 text-gray-900">Código Postal</label>
                                            <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" autocomplete="postal_code" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            @error('postal_code')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Enviar</button>
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


    <div class="py-4">
  <form action="" method="POST">
    @csrf
    
    <div class="flex flex-col mb-4">
      <label for="days" class="font-bold mb-2">Days of the Week:</label>
      <div class="flex">
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="monday" id="monday" class="mr-2">
          <label for="monday">Monday</label>
        </div>
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="tuesday" id="tuesday" class="mr-2">
          <label for="tuesday">Tuesday</label>
        </div>
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="wednesday" id="wednesday" class="mr-2">
          <label for="wednesday">Wednesday</label>
        </div>
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="thursday" id="thursday" class="mr-2">
          <label for="thursday">Thursday</label>
        </div>
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="friday" id="friday" class="mr-2">
          <label for="friday">Friday</label>
        </div>
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="saturday" id="saturday" class="mr-2">
          <label for="saturday">Saturday</label>
        </div>
        <div class="mr-4">
          <input type="checkbox" name="days[]" value="sunday" id="sunday" class="mr-2">
          <label for="sunday">Sunday</label>
        </div>
      </div>
    </div>

    <div class="flex flex-col mb-4">
      <label for="times" class="font-bold mb-2">Available Time Slots:</label>
      <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1">
          <input type="checkbox" name="times[]" value="9:00" id="time-9" class="mr-2">
          <label for="time-9">9:00am - 10:00am</label>
        </div>
        <div class="col-span-1">
          <input type="checkbox" name="times[]" value="10:00" id="time-10" class="mr-2">
          <label for="time-10">10:00am - 11:00am</label>
        </div>
        <div class="col-span-1">
          <input type="checkbox" name="times[]" value="11:00" id="time-11" class="mr-2">
          <label for="time-11">11:00am - 12:00pm</label>
        </div>
        <div class="col-span-1">
          <input type="checkbox" name="times[]" value="12:00" id="time-12" class="mr-2">
          <label for="time-12">12:00pm - 1:

<div class="grid grid-cols-8 gap-4">
  <div class="col-span-2">
    <label class="block font-medium text-gray-700 mb-2">Monday</label>
    <input type="checkbox" name="monday[]" value="8-9am" id="monday_8-9am"><label for="monday_8-9am">8-9am</label><br>
    <input type="checkbox" name="monday[]" value="9-10am" id="monday_9-10am"><label for="monday_9-10am">9-10am</label><br>
    <!-- Add more time slots as needed -->
  </div>
  <div class="col-span-2">
    <label class="block font-medium text-gray-700 mb-2">Tuesday</label>
    <input type="checkbox" name="tuesday[]" value="8-9am" id="tuesday_8-9am"><label for="tuesday_8-9am">8-9am</label><br>
    <input type="checkbox" name="tuesday[]" value="9-10am" id="tuesday_9-10am"><label for="tuesday_9-10am">9-10am</label><br>
    <!-- Add more time slots as needed -->
  </div>
  <div class="col-span-2">
    <label class="block font-medium text-gray-700 mb-2">Wednesday</label>
    <input type="checkbox" name="wednesday[]" value="8-9am" id="wednesday_8-9am"><label for="wednesday_8-9am">8-9am</label><br>
    <input type="checkbox" name="wednesday[]" value="9-10am" id="wednesday_9-10am"><label for="wednesday_9-10am">9-10am</label><br>
    <!-- Add more time slots as needed -->
  </div>
  <div class="col-span-2">
    <label class="block font-medium text-gray-700 mb-2">Thursday</label>
    <input type="checkbox" name="thursday[]" value="8-9am" id="thursday_8-9am"><label for="thursday_8-9am">8-9am</label><br>
    <input type="checkbox" name="thursday[]" value="9-10am" id="thursday_9-10am"><label for="thursday_9-10am">9-10am</label><br>
    <!-- Add more time slots as needed -->
  </div>
  <div class="col-span-2">
    <label class="block font-medium text-gray-700 mb-2">Friday</label>
    <input type="checkbox" name="friday[]" value="8-9am" id="friday_8-9am"><label for="friday_8-9am">8-9am</label><br>
    <input type="checkbox" name="friday[]" value="9-10am" id="friday_9-10am"><label for="friday_9-10am">9-10am</label><br>
    <!-- Add more time slots as


</x-guest-layout>