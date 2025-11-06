<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Campus;
use App\Models\Intake;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::with('course')->get();
        $courses = Course::all();
        $campuses = Campus::all();
        $intakes = Intake::all();
        $course = null;

        return view('activities', compact('activities', 'courses', 'campuses', 'intakes', 'course'));
    }

    public function indexByCourse($courseId) {
        $course = Course::findOrFail($courseId);
        $activities = Activity::with('course')->where('course_id', $course->id)->get();
        $courses = Course::all();
        $campuses = Campus::all();
        $intakes = Intake::all();

        return view('activities', compact('activities', 'courses', 'campuses', 'intakes', 'course'));
    }

    public function store(Request $request) {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'base_code' => 'required|string|max:20',
            'campus' => 'required|string|max:100',
            'intake_month' => 'required|string|max:50',
            'for_programme' => 'required|in:Yes,No',
            'course_id' => 'required|exists:courses,id',
        ]);

        Activity::create($request->only(
            'course_name',
            'base_code',
            'campus',
            'intake_month',
            'for_programme',
            'course_id'
        ));

        return back()->with('success', 'Activity added successfully!');
    }

    public function delete($id) {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return back()->with('success', 'Activity deleted successfully!');
    }

    public function edit($id) {
        $activity = Activity::findOrFail($id);
        $courses = Course::all();
        $campuses = Campus::all();
        $intakes = Intake::all();

        return view('activity-edit', compact('activity', 'courses', 'campuses', 'intakes'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'base_code' => 'required|string|max:20',
            'campus' => 'required|string|max:100',
            'intake_month' => 'required|string|max:50',
            'for_programme' => 'required|in:Yes,No',
            'course_id' => 'required|exists:courses,id',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update($request->only(
            'course_name',
            'base_code',
            'campus',
            'intake_month',
            'for_programme',
            'course_id'
        ));

        return redirect()->back()->with('success', 'Activity updated successfully!');
    }
}
