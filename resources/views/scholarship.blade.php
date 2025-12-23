<x-layout>
    <x-slot:heading>
        Scholarship
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $scholarship['name'] }}</h2>
    <p>
        This Scholarship funds {{ $scholarship['amount'] }} per year.
    </p>

</x-layout>