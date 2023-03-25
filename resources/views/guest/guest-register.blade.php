<x-guest-layout>
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
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Agregar Paciente</h3>
                                <p class="mt-1 text-sm text-gray-600">Ingresar informacion de nuevo paciente.</p>
                            </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">

                            <form action="{{ route('guest.register.store') }}" method="POST">
                            @csrf

                                <div class="overflow-hidden shadow sm:rounded-md">
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
</x-guest-layout>