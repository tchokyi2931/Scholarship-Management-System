<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::simplePaginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'student_id' => ['required', 'unique:students,student_id'],
            'department' => ['nullable']
        ]);

        Student::create([
            'name' => request('name'),
            'email' => request('email'),
            'student_id' => request('student_id'),
            'department' => request('department'),
        ]);

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('scholarships');
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        if($student->user_id && $student->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'You can only edit your own students.');

        }

        return view('students.edit', ['student' => $student]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        if ($student->user_id && $student->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        abort(403, 'You can only update your own students.');
    }

        //validate
        request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'student_id' => ['required', 'unique:students,student_id,' . $student->id],
            'department' => ['nullable']
        ]);

        $student->update([
            'name' => request('name'),
            'email' => request('email'),
            'student_id' => request('student_id'),
            'department' => request('department'),
        ]);

        //redirect to the student page
        return redirect('/students/' . $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->user_id && $student->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
        abort(403, 'You can only delete your own students.');
    }

        //delete the student
        $student->delete();

        //redirect
        return redirect('/students');
    }

    public function attach(Student $student)
{
    $scholarships = Scholarship::all();

    return view('students.attach', [
        'student' => $student,
        'scholarships' => $scholarships
    ]);
}

public function attachScholarship(Student $student)
{
    $student->scholarships()->attach(request('scholarship'));

    return redirect('/students/' . $student->id);
}

public function detachScholarship(Student $student)
{
    $student->scholarships()->detach(request('scholarship'));

    return redirect('/students/' . $student->id);
}
}