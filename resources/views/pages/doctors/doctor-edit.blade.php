<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Doctors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Area de Médicos</h1>
                <hr class="mt-2 mb-6">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Editar Médico</h3>
                                <p class="mt-1 text-sm text-gray-600">Ingrese los cambios y haga click en el botón Guardar del formulario.</p>
                            </div>
                            </div>
                            <div class="mt-5 md:col-span-2 md:mt-0">

                            <h1>{{ $doctor->name }} {{ $doctor->last_name }}</h1>


                            <form method="POST" action="{{ route('doctor.edit', $doctor->id) }}">
                                @csrf
                                @method('POST')

                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <h2 class="font-bold mb-2" name="monday" value="monday">Lunes</h2>
                                        @foreach (range(9, 17) as $hour)
                                            <div>
                                                <input type="checkbox" name="availability[monday][]" value="{{ $hour }}">
                                                <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <h2 class="font-bold mb-2">Martes</h2>
                                        @foreach (range(9, 17) as $hour)
                                            <div>
                                                <input type="checkbox" name="availability[tuesday][]" value="{{ $hour }}">
                                                <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <h2 class="font-bold mb-2">Miércoles</h2>
                                        @foreach (range(9, 17) as $hour)
                                            <div>
                                                <input type="checkbox" name="availability[wednesday][]" value="{{ $hour }}">
                                                <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <h2 class="font-bold mb-2">Jueves</h2>
                                        @foreach (range(9, 17) as $hour)
                                            <div>
                                                <input type="checkbox" name="availability[thursday][]" value="{{ $hour }}">
                                                <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <h2 class="font-bold mb-2">Viernes</h2>
                                        @foreach (range(9, 17) as $hour)
                                            <div>
                                                <input type="checkbox" name="availability[friday][]" value="{{ $hour }}">
                                                <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">{{__('Save')}}</button>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>