
<x-app-layout>
@if (session('success'))
    <div class="w-full text-white p-6 bg-green-700">
        {{ session('success') }}
    </div>
@endif
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
                    <form action action="{{ route('patients.index') }}" method="GET">

                        <div class="flex w-1/4 mb-4">
                            <input type="text" name="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Buscar...">
                            <button type="submit" class="ml-2 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Buscar</button>
                        </div>
                        </form>
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
                                <td class="px-6 py-4 whitespace-nowrap">
                                <td>
                                    <div class="flex gap-4 items-center justify-center">
                                        <a href="{{ route('patients.edit', $patient) }}" class="text-white px-8 py-2 rounded-md bg-indigo-600 hover:bg-indigo-900">{{__('Edit')}}</a>
                                    <button type="button" class="text-white px-8 py-2 rounded-md bg-red-600 hover:bg-red-900" data-toggle="modal" data-target="#confirm-delete-{{ $patient->id }}">{{__('Delete')}}</button>
                                    <!-- Modal 
                                    <div class="modal fixed z-10 inset-0 overflow-y-auto" id="confirm-delete-{{ $patient->id }}">
                                        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
                                        <div class="modal-container w-3/4 fixed top-0 left-0 right-0 mx-auto my-10">
                                            <div class="bg-white rounded shadow-lg p-8">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-bold text-lg mb-4">Confirm Deletion</h4>
                                                        <button type="button" class="close text-gray-500 hover:text-gray-900" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-gray-700 mb-4">
                                                        Are you sure you want to delete {{ $patient->name }}?
                                                    </div>
                                                    <div class="modal-footer flex justify-end">
                                                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded" data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('patients.destroy', $patient) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    </div>  
                                </td>   
                                </td>
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
