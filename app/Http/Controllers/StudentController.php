<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index', [
            'data' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validateWithBag('student', [
            'student_id' => ['required', 'string', 'max:255', 'unique:students'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'cgpa' => ['required', 'numeric', 'min:0', 'max:4'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image'))
            $validated['image'] = $request->file('image')->store('images');

        Student::create($validated);

        return back()->with('status', 'result');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validateWithBag('student', [
            'student_id' => ['required', 'string', 'max:255', 'unique:students,student_id,' . $student->id],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email,' . $student->id],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'cgpa' => ['required', 'numeric', 'min:0', 'max:4'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image'))
            $validated['image'] = $request->file('image')->store('images');

        $student->update($validated);

        return back()->with('status', 'result');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return back()->with('status', 'deleted');
    }
}
