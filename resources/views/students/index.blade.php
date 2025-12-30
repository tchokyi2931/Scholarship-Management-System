<x-layout>
    <x-slot:heading>
        Student list
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($students as $student)
            <a href="/students/{{ $student->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div>
                    <strong>{{ $student->name }}:</strong> studies {{ $student->department ?? 'N/A' }}.
                </div>
            </a>
        @endforeach

        <div>
            {{ $students->links() }}
        </div>
    </div>

</x-layout>