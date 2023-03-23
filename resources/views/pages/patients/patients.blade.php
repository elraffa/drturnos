<?php

$patients = App\Models\Patient::all();

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pacientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{__('All Patients')}}</h1>
                <hr class="mt-2 mb-6">
                    <div class="mt-10 sm:mt-0">
                        <div class="flex w-1/4 mb-4">
                            <input type="text" name="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Buscar...">
                            <button class="ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Buscar</button>
                        </div>

                    <div className="relative mt-6 h-full overflow-x-auto overflow-y-hidden shadow-md sm:rounded-lg">
                        
                       <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__('Name')}}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__('Last Name')}}</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__('Actions')}}</th>
                                </tr>      
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($patients as $patient)
                                <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $patient->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                         </div>
                        <div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
