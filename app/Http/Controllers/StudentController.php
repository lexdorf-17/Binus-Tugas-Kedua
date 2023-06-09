<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $grades = Student::select('grade', \DB::raw('COUNT(*) as count'))
                         ->groupBy('grade')
                         ->get();

        $labels = $grades->pluck('grade');
        $data = $grades->pluck('count');
    
        return view('students.index', compact('students', 'labels', 'data'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string',
            'name' => 'required|string',
            'score_quiz' => 'required|numeric',
            'score_assignment' => 'required|numeric',
            'score_absent' => 'required|numeric',
            'score_practice' => 'required|numeric',
            'score_test' => 'required|numeric',
        ]);
    
        // Calculate the average score
        $averageScore = ($validatedData['score_quiz'] + $validatedData['score_assignment'] + $validatedData['score_absent'] + $validatedData['score_practice'] + $validatedData['score_test']) / 5;
    
        // Assign the grade based on the average score
        if ($averageScore <= 65) {
            $validatedData['grade'] = 'D';
        } elseif ($averageScore <= 75) {
            $validatedData['grade'] = 'C';
        } elseif ($averageScore <= 85) {
            $validatedData['grade'] = 'B';
        } else {
            $validatedData['grade'] = 'A';
        }
    
        Student::create($validatedData);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }
    

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string',
            'name' => 'required|string',
            'score_quiz' => 'required|numeric',
            'score_assignment' => 'required|numeric',
            'score_absent' => 'required|numeric',
            'score_practice' => 'required|numeric',
            'score_test' => 'required|numeric',
        ]);
    
        // Calculate the average score
        $averageScore = ($validatedData['score_quiz'] + $validatedData['score_assignment'] + $validatedData['score_absent'] + $validatedData['score_practice'] + $validatedData['score_test']) / 5;
    
        // Assign the grade based on the average score
        if ($averageScore <= 65) {
            $validatedData['grade'] = 'D';
        } elseif ($averageScore <= 75) {
            $validatedData['grade'] = 'C';
        } elseif ($averageScore <= 85) {
            $validatedData['grade'] = 'B';
        } else {
            $validatedData['grade'] = 'A';
        }
    
        $student->update($validatedData);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }    

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
