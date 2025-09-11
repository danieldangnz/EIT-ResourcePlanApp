<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index() {
        $programmes = Programme::all();
        return view('programmes', compact('programmes'));
    }

    public function store(Request $request) {
        // Validate incoming data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'base_code' => 'required|string|max:10',
            'region' => 'required|string|max:3',
            'start_month' => 'required|string|max:20'
        ]);

        $programme = Programme::create($validated);

        if ($programme) {
            return redirect()->back()->with('success', 'Programme added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add programme.');
        }
    }

    public function delete($id) {
        $programme = Programme::findOrFail($id);
        $programme->delete();

        return redirect()->back()->with('success', 'Programme deleted successfully!');
    }

    public function edit($id) {
        $programme = Programme::findOrFail($id);
        return view('programmes-edit', compact('programme'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:100',
            'base_code' => 'required|string|max:10',
            'region' => 'required|string|max:3',
            'start_month' => 'required|string|max:20',
        ]);

        $programme = Programme::findOrFail($id);
        $programme->update($request->all());

        return redirect()->route('programmes')->with('success', 'Updated successfully');
    }
}
