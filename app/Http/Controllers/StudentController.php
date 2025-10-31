<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
    {
        $students = Student::with('group')->get();
        return view('student_index', compact('students'));
    }

    public function create(Group $group)
    {
        return view('student_create', compact('group'));
    }

    public function store(Request $request, Group $group)
    {
        $request->validate([
            'surname' => 'required|string|max:255',
            'name' => 'required|string|max:255'
        ]);

        $group->students()->create($request->all());
        return redirect()->route('groups.show', $group);
    }

    public function show(Group $group, Student $student)
    {
        return view('student_show', compact('student'));
    }
}
