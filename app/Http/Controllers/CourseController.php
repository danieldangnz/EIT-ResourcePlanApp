<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Course;
use App\Models\Campus;
use App\Models\Intake;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // List all courses
    public function index()
    {
        $courses = Course::with(['campus', 'programme'])->get();
        $campuses = Campus::all();
        $programmes = Programme::all();
        $intakes = Intake::all();
        $programme = null;

        return view('courses', compact('courses', 'campuses', 'programmes', 'intakes', 'programme'));
    }

    // List courses filtered by a specific programme
    public function indexByProgramme($programmeId) {
        $programme = Programme::findOrFail($programmeId);

        // Only courses that belong to this programme
        $courses = Course::with(['campus', 'programme'])
                        ->where('programme_id', $programme->id)
                        ->get();

        $campuses = Campus::all();
        $programmes = Programme::all();
        $intakes = Intake::all();

        return view('courses', compact('courses', 'campuses', 'programmes', 'intakes', 'programme'));
    }

    public function edit(Course $course) {
        $campuses = Campus::all();
        $programmes = Programme::all();
        $intakes = Intake::all();

        return view('courses-edit', compact('course', 'campuses', 'programmes', 'intakes'));
    }

    // Update course
    public function update(Request $request, Course $course) {
        $request->validate([
            'title' => 'required|string|max:255',
            'base_code' => 'required|string|max:20',
            'campus_id' => 'required|exists:campuses,id',
            'intake' => 'required|string|max:10',
            'programme_id' => 'required|exists:programmes,id',
        ]);

        $course->update($request->only('title','base_code','campus_id','intake','programme_id'));

        return redirect()->back()->with('success', 'Course updated successfully!');
    }

    // Store new course
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'base_code' => 'required|string|max:20',
            'campus_id' => 'required|exists:campuses,id',
            'intake' => 'required|string|max:10',
            'programme_id' => 'required|exists:programmes,id',
        ]);

        Course::create($request->only('title','base_code','campus_id','intake','programme_id'));

        return back()->with('success', 'Course added successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success', 'Course deleted successfully!');
    }
}
