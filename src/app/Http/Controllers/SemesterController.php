<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('semester.index', [
            'data' => Semester::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('semester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('semester', [
            'name' => ['required', 'string', 'max:20'],
            'year' => ['required', 'numeric', 'digits:4'],
        ]);

        Semester::create($validated);

        return back()->with('status', 'result');


        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        return view('semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        $validated = $request->validateWithBag('semester', [
            'name' => ['required', 'string', 'max:20'],
            'year' => ['required', 'numeric', 'digits:4'],
        ]);

        $semester->update($validated);

        return back()->with('status', 'result');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();

        return back()->with('status', 'deleted');
    }
}
