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

    <p class="mt-6">
        <x-button href="/students/{{ $student->id }}/edit">Edit Student</x-button>
    </p>

</x-layout>