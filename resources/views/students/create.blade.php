<x-layout>
    <x-slot:heading>
        Add Student
    </x-slot:heading>

<form method="POST" action="/students">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Add a new Student</h2>
      <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="name">Name</x-form-label>

          <div class="mt-2">
            <x-form-input id="name" name="name" placeholder="Tenzin" value="{{ old('name') }}" required />

            <x-form-error name="name"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="name">Email</x-form-label>

          <div class="mt-2">
            <x-form-input id="email" name="email" placeholder="tenzin@example.com" value="{{ old('email') }}" type="email" required />

            <x-form-error name="email"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="name">Student ID</x-form-label>

          <div class="mt-2">
            <x-form-input id="student_id" name="student_id" placeholder="STU001" value="{{ old('student_id') }}" required />

            <x-form-error name="student_id"/>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="name">Department</x-form-label>

          <div class="mt-2">
            <x-form-input id="department" name="department" placeholder="Computer Science" value="{{ old('department') }}" required />

            <x-form-error name="department"/>
          </div>
        </x-form-field>
     

      </div>
    </div>
  </div>
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/students" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
    <x-form-button>Save</x-form-button>
  </div>
</form>
</x-layout>