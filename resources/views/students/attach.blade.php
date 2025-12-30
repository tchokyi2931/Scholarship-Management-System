<x-layout>
    <x-slot:heading>
        Attach Scholarship
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $student->name }}</h2>

    <form method="POST" action="/students/{{ $student->id }}/scholarships">
        @csrf

        <div class="mt-6">
            <label for="scholarship" class="block text-sm font-medium text-gray-900">Scholarship</label>
            <select name="scholarship" id="scholarship" class="mt-2 block w-full rounded-md border-gray-300">
                <option value="">Choose a scholarship...</option>
                @foreach($scholarships as $scholarship)
                    <option value="{{ $scholarship->id }}">{{ $scholarship->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-6 flex items-center gap-x-6">
            <x-button href="/students/{{ $student->id }}">Cancel</x-button>
            <x-form-button>Attach</x-form-button>
        </div>
    </form>
</x-layout>