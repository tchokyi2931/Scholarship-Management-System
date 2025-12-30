<x-layout>
    <x-slot:heading>
        Students
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $student->name }}</h2>

    <p>
        This Student is from {{ $student->department ?? 'N/A' }} department.
    </p>

    <p>
        Email: {{ $student->email }}
    </p>

    <p>
        Student ID: {{ $student->student_id }}
    </p>

    <div class="mt-6">
        <h3 class="font-semibold mb-2">Scholarships:</h3>
        @foreach ($student->scholarships as $scholarship)
            <div class="flex items-center justify-between mb-2">
                <a href="/scholarships/{{ $scholarship->id }}" class="text-indigo-600 hover:underline">
                    {{ $scholarship->title }}
                </a>
                <form method="POST" action="/students/{{ $student->id }}/scholarships/detach">
                    @csrf
                    <input type="hidden" name="scholarship" value="{{ $scholarship->id }}">
                    <button class="text-red-500 text-sm">Remove</button>
                </form>
            </div>
        @endforeach

        <x-button href="/students/{{ $student->id }}/attach">Attach Scholarship</x-button>
    </div>

    <p class="mt-6">
        <x-button href="/students/{{ $student->id }}/edit">Edit Student</x-button>
    </p>

</x-layout>