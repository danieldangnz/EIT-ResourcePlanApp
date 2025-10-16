<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Section;

class ProgrammeController extends Controller
{
    public function index() {
        $sections = Section::all();

        $programmes = Programme::with('section')->get();

        return view('programmes', compact('programmes', 'sections'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'section_id'      => 'required|exists:sections,SectionID',
            'title'           => 'required|string|max:255',
            'base_code'       => 'required|string|max:20',
            'region'          => 'required|string|max:10',
            'intake'          => 'required|string|max:10',
            'full_prog_code'  => 'required|string|max:50',
            'campus'          => 'required|string|max:100',
            'full_desc'       => 'required|string|max:255',
            'prog_stud_set'   => 'required|string|max:50',
            'prog1_code'      => 'required|string|max:50',
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
        $sections = Section::all(); // so you can edit the section
        return view('programmes-edit', compact('programme', 'sections'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:100',
            'base_code' => 'required|string|max:10',
            'region' => 'required|string|max:3',
            'start_month' => 'required|string|max:20',
            'section_id' => 'required|exists:sections,id',
        ]);

        $programme = Programme::findOrFail($id);
        $programme->update($request->all());

        return redirect()->route('programmes')->with('success', 'Updated successfully');
    }
}
