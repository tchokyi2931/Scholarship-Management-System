<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('scholarships.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    request()->validate([
        'title' => ['required', 'min:3'],
        'amount' => ['required']
    ]);
 
    Scholarship::create([
        'title' => request('title'),
        'amount' => request('amount'),
        'description' => request('description')
    ]);

    return redirect('/scholarships');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scholarship $scholarship)
    {
        return view('scholarships.show', ['scholarship' => $scholarship]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scholarship $scholarship)
    {
        return view('scholarships.edit', ['scholarship' => $scholarship]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scholarship $scholarship)
    {
    //authorize (on hold...)

    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'amount' => ['required']
    ]);

    $scholarship->update([
        'title' => request('title'),
        'amount' => request('amount'),
    ]);

    //and persist

    //redirect to the scholarship page
    return redirect('/scholarships/' .$scholarship->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $scholarship)
    {
    //authorize (on hold...)

    //delete the job
    $scholarship->delete();

    //redirect
    return redirect('/scholarships');
    }
}
