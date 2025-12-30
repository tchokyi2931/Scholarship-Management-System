<x-layout>
    <x-slot:heading>
        Scholarship
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $scholarship->title }}</h2>

    <p>
        This Scholarship funds {{ $scholarship->amount }} per year.
    </p>

    @if($scholarship->description)
        <p class="mt-2">
            {{ $scholarship->description }}
        </p>
    @endif

    <div class="mt-6">
        <h3 class="font-semibold mb-2">Students:</h3>
        @foreach ($scholarship->students as $student)
            <div class="flex items-center justify-between mb-2">
                <a href="/students/{{ $student->id }}" class="text-indigo-600 hover:underline">
                    {{ $student->name }}
                </a>
                <form method="POST" action="/scholarships/{{ $scholarship->id }}/students/detach">
                    @csrf
                    <input type="hidden" name="student" value="{{ $student->id }}">
                    <button class="text-red-500 text-sm">Remove</button>
                </form>
            </div>
        @endforeach

        <x-button href="/scholarships/{{ $scholarship->id }}/attach">Attach Student</x-button>
    </div>

    <p class="mt-6">
    <x-button href="/scholarships/{{ $scholarship->id }}/edit">Edit Scholarship</x-button>

</x-layout>