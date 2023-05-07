<x-app-layout>

<form method="POST" action="{{ route('doctor.availability.update') }}">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-2 gap-4">
        <div>
            <h2 class="font-bold mb-2">Monday</h2>
            @foreach (range(9, 17) as $hour)
                <div>
                    <input type="checkbox" name="availability[monday][]" value="{{ $hour }}">
                    <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                </div>
            @endforeach
        </div>
        <div>
            <h2 class="font-bold mb-2">Tuesday</h2>
            @foreach (range(9, 17) as $hour)
                <div>
                    <input type="checkbox" name="availability[tuesday][]" value="{{ $hour }}">
                    <label class="ml-2">{{ $hour }}:00 - {{ $hour + 1 }}:00</label>
                </div>
            @endforeach
        </div>
        <!-- repeat for each day of the week -->
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Save</button>
</form>

</x-app-layout>