<x-guest-layout>
@if (session('success'))
    <div class="js-success-message w-full text-white p-6 bg-green-700">
        {{ session('success') }}
    </div>
@endif
</x-guest-layout>