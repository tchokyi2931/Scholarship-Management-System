<x-layout>
    <x-slot:heading>
        User Management
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($users as $user)
            <a href="/users/{{ $user->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <strong>{{ $user->name }}</strong> - {{ $user->email }}
                        <span class="ml-2 px-2 py-1 text-xs rounded-full 
                            {{ $user->role === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</x-layout>