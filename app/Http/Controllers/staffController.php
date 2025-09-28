<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\staff;

class StaffController extends Controller {
    public function index(Request $request) {
        $query = $request->input('query');

        $staffmem = \App\Models\Staff::query()
            ->when($query, function ($q, $query) {
                return $q->where('staff_name', 'like', "%{$query}%")
                        ->orWhere('staff_code', 'like', "%{$query}%");
            })
            ->get();

        return view('staff', compact('staffmem'));
    }

    public function store(Request $request) {
        // Validate incoming data
        $validated = $request->validate([
            'staff_name' => 'required|string|max:50',
            'staff_code' => 'required|string|max:10',
        ]);

        $staff = staff::create($validated);

        if ($staff) {
            return redirect()->back()->with('success', 'Staff member added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add staff member.');
        }
    }

    public function delete($id) {
        $staff = staff::findOrFail($id);
        $staff->delete();

        return redirect()->back()->with('success', 'Staff member deleted successfully!');
    }

    public function edit($id) {
        $staff = staff::findOrFail($id);
        return view('staff-edit', compact('staff'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'staff_name' => 'required|string|max:50',
            'staff_code' => 'required|string|max:10',
        ]);

        $staff = staff::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staffmem')->with('success', 'Updated successfully');
    }
}
