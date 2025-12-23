<x-layout>
    <x-slot:heading>
        Scholarship
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $scholarship->title }}</h2>

    <p>
        This Scholarship funds {{ $scholarship->amount }} per year.
    </p>

    <p class="mt-6">
    <x-button href="/scholarships/{{ $scholarship->id }}/edit">Edit Scholarship</x-button>

</x-layout>