<?php

use App\Models\Doctor;

    $doctors = Doctor::all();

?>

<x-guest-layout>


    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-3xl font-bold mb-8">Todos los médicos</h2>

        <ul class="space-y-4">
            @foreach ($doctors as $doctor)
                <li class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <img class="w-12 h-12 rounded-full object-cover" src="{{ $doctor->avatar_url }}" alt="{{ $doctor->name }}">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $doctor->name }} {{ $doctor->last_name }}</h3>
                                <span class="text-gray-500">{{ $doctor->specialty }}</span>
                            </div>
                        </div>
                        <a href="{{ route('doctors.show', $doctor) }}" class="text-indigo-500 hover:text-indigo-600">Ver perfil</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</x-guest-layout>