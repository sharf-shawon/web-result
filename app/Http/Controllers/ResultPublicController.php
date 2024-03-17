<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ResultPublicController extends Controller
{
    /**
     * Display a public result search page.
     */
    public function index()
    {
        return view('result-public.index');
    }

    /**
     * Display the specified result.
     */
    public function show(Request $request)
    {
        $request->validate([
            'student_id' => ['required', 'string', 'max:255', 'exists:students,student_id'],
            'date_of_birth' => ['required', 'date'],
        ]);
        $student = Student::where([
            'student_id' => $request->student_id,
            'date_of_birth' => $request->date_of_birth,
        ])
            ->firstOrFail();
        return view('result-public.show')->with('student', $student);
    }
}
