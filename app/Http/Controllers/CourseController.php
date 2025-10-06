<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Course;

class CourseController extends Controller {
    public function index() {
        $programmes = Programme::all();
        $courses = Course::with('programme')->get();
        return view('courses', compact('programmes', 'courses'));
    }

    public function edit($id) {
        $course = Course::findOrFail($id);
        $programmes = Programme::all();

        // Use your file name directly
        return view('courses-edit', compact('course', 'programmes'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'programme_id' => 'required|exists:programmes,id',
            'courseDescription' => 'required|string|max:500',
            'courseCode' => 'required|string|max:50',
            'courseFullCode' => 'required|string|max:50',
            'onlyOneCourseForProgramme' => 'nullable|boolean',
            'status' => 'required|in:working,completed',
        ]);

        $validated['onlyOneCourseForProgramme'] = $request->has('onlyOneCourseForProgramme');
        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course successfully added.');
    }

    public function update(Request $request, Course $course) {
        $validated = $request->validate([
            'programme_id' => 'required|exists:programmes,id',
            'courseDescription' => 'required|string|max:500',
            'courseCode' => 'required|string|max:50',
            'courseFullCode' => 'required|string|max:50',
            'onlyOneCourseForProgramme' => 'nullable|boolean',
            'status' => 'required|in:working,completed',
        ]);

        $validated['onlyOneCourseForProgramme'] = $request->has('onlyOneCourseForProgramme');

        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Course successfully updated.');
    }

    public function destroy(Course $course) {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course successfully deleted.');
    }
}
