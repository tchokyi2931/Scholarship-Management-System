<x-layout>
    <x-slot:heading>
        User Details
    </x-slot:heading>

    <div class="space-y-6">
        <div>
            <h2 class="font-bold text-lg">{{ $user->name }}</h2>
            <p class="text-gray-600">Email: {{ $user->email }}</p>
            <p class="text-gray-600">
                Role: 
                <span class="ml-2 px-2 py-1 text-xs font-semibold rounded-full 
                    {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </p>
            <p class="text-gray-600">Created: {{ $user->created_at->format('M d, Y') }}</p>
        </div>

        @if($user->students->count() > 0)
            <div>
                <h3 class="font-semibold mb-2">Associated Students:</h3>
                <ul class="list-disc list-inside">
                    @foreach ($user->students as $student)
                        <li>
                            <a href="/students/{{ $student->id }}" class="text-indigo-600 hover:underline">
                                {{ $student->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-6">
            <x-button href="/users/{{ $user->id }}/edit">Edit User</x-button>
        </div>
    </div>
</x-layout>