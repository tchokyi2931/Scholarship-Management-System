<x-layout>
    <x-slot:heading>
        Attach Student
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $scholarship->title }}</h2>

    <form method="POST" action="/scholarships/{{ $scholarship->id }}/students">
        @csrf

        <div class="mt-6">
            <label for="student" class="block text-sm font-medium text-gray-900">Student</label>
            <select name="student" id="student" class="mt-2 block w-full rounded-md border-gray-300">
                <option value="">Choose a student...</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->student_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-6 flex items-center gap-x-6">
            <x-button href="/scholarships/{{ $scholarship->id }}">Cancel</x-button>
            <x-form-button>Attach</x-form-button>
        </div>
    </form>
</x-layout>