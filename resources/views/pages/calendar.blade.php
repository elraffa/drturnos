<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

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




