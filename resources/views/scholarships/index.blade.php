<x-layout>
    <x-slot:heading>
        Scholarship System
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($scholarships as $scholarship)
            <a href="/scholarships/{{ $scholarship['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div>
                    <strong>{{ $scholarship['title'] }}:</strong> Pays {{ $scholarship['amount'] }} per year.
                </div>
            </a>
        @endforeach
</div>

</x-layout>  