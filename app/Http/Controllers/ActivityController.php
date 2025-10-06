<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::all();
        return view('activities', compact('activities'));
    }

    public function store(Request $request) {
        $validated = Activity::create([
            'course_name' => $request->course_name,
            'base_code' => $request->base_code,
            'campus' => $request->campus,
            'intake_month' => $request->intake_month,
            'for_programme' => $request->for_programme,
            'course_id' => $request->course_id,
        ]);

        Activity::create($validated);

        return redirect()->back()->with('success', 'Activity added successfully!');
    }

    public function delete($id) {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->back()->with('success', 'Activity successfully deleted');
    }

    public function edit($id) {
        $activity = Activity::findOrFail($id);
        return view('activity-edit', compact('activity'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'base_code' => 'required|string|max:10',
            'campus' => 'required|string|max:50',
            'intake_month' => 'required|string|max:20',
            'for_programme' => 'required|in:Yes,No',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update($request->all());

        return redirect()->route('activities')->with('success', 'Activity successfully updated');
    }
}
