<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Bienvenido</h1>
                <hr class="mt-2 mb-6">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900">Agregar Paciente</h3>
                                    <p class="mt-1 text-sm text-gray-600">Ingresar informacion de nuevo paciente.</p>
                                    <a href="{{ route('patients.create') }}" class="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Agregar Paciente</a>
                                </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="px-4 sm:px-0">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900">Agregar Turno</h3>
                                    <p class="mt-1 text-sm text-gray-600">Ingresar informacion de nuevo turno.</p>
                                    <a href="{{ route('patients.create') }}"class="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Agregar Turno</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
