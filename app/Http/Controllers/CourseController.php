<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('course.index', [
            'data' => Course::all()
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create')->with('semesters', Semester::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('course', [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'semester_id' => ['required', 'exists:semesters,id'],
        ]);

        Course::create($validated);

        return back()->with('status', 'result');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course,
            'semesters' => Semester::all()
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validateWithBag('course', [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'semester_id' => ['required', 'exists:semesters,id'],
        ]);

        $course->update($validated);

        return back()->with('status', 'result');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
