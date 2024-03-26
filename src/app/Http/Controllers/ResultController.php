<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('result.index', [
            'data' => Result::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('result.create')->with([
            'students' => Student::all(),
            'courses' => Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('result', [
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'gpa' => ['required', 'numeric', 'min:0', 'max:4'],
        ]);

        Result::create($validated);

        return back()->with('status', 'result');
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        return view('result.edit')->with([
            'result' => $result,
            'students' => Student::all(),
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        $validated = $request->validateWithBag('result', [
            'student_id' => ['required', 'exists:students,id'],
            'course_id' => ['required', 'exists:courses,id'],
            'gpa' => ['required', 'numeric', 'min:0', 'max:4'],
        ]);

        $result->update($validated);

        return back()->with('status', 'result');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        $result->delete();

        return back()->with('status', 'deleted');
    }
}
