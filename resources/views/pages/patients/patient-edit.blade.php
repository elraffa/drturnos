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
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Area de Pacientes</h1>
                <hr class="mt-2 mb-6">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Editar Paciente</h3>
                                <p class="mt-1 text-sm text-gray-600">Ingrese los cambios y haga click en el botón Guardar del formulario.</p>
                            </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">

                            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                                <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                                        <input type="text" name="name" id="first-name" value="{{ $patient->name }}" autocomplete="given-name" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Apellido</label>
                                        <input type="text" name="last_name" id="last_name" value="{{ $patient->last_name }}" autocomplete="family-name" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                        <input type="text" name="email" id="email" autocomplete="email" value="{{ $patient->email }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="phone_number" class="block text-sm font-medium leading-6 text-gray-900">Número de teléfono:</label>
                                        <input type="tel" name="phone_number" id="phone_number" value="{{ $patient->phone_number }}" required class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="dni" class="block text-sm font-medium leading-6 text-gray-900">DNI</label>
                                        <input type="text" name="dni" id="dni" autocomplete="dni" value="{{ $patient->dni }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="insurance_name" class="block text-sm font-medium leading-6 text-gray-900">Obra Social / Prepaga</label>
                                        <input type="text" name="insurance_name" id="insurance_name" autocomplete="insurance_name" value="{{ $patient->insurance_name }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="insurance_number" class="block text-sm font-medium leading-6 text-gray-900">Número de Socio OS</label>
                                        <input type="text" name="insurance_number" id="insurance_number" autocomplete="insurance_number" value="{{ $patient->insurance_number }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street_address" class="block text-sm font-medium leading-6 text-gray-900">Dirección</label>
                                        <input type="textarea" name="street_address" id="street_address" autocomplete="street_address" value="{{ $patient->street_address }}" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Ciudad</label>
                                        <input type="text" name="city" id="city" value="{{ $patient->city }}" autocomplete="address-level2" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="state" class="block text-sm font-medium leading-6 text-gray-900">Provincia</label>
                                        <input type="text" name="state" id="state" value="{{ $patient->state }}" autocomplete="address-level1" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="postal_code" class="block text-sm font-medium leading-6 text-gray-900">Código Postal</label>
                                        <input type="text" name="postal_code" id="postal_code" value="{{ $patient->postal_code }}" autocomplete="postal_code" class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Guardar</button>
                                </div>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
