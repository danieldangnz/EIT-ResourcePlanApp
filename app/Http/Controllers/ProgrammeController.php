<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Section;
use App\Models\Intake;
use App\Models\Campus;

class ProgrammeController extends Controller
{
    public function index() {
        $sections = Section::all();
        $intakes = Intake::all();
        $campuses = Campus::all();
        $programmes = Programme::with('section')->get();

        return view('programmes', compact('programmes', 'sections', 'intakes', 'campuses'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'section_id' => 'required|exists:sections,SectionID',
            'title'      => 'required|string|max:255',
            'base_code'  => 'required|string|max:20',
            'intake'     => 'required|string|max:10',
            'campus'     => 'required|string|max:100',

            'region'          => 'nullable|string|max:10',
            'full_prog_code'  => 'nullable|string|max:50',
            'full_desc'       => 'nullable|string|max:255',
            'prog_stud_set'   => 'nullable|string|max:50',
            'prog1_code'      => 'nullable|string|max:50',
        ]);

        $programme = Programme::create($validated);

        if ($programme) {
            return redirect()->back()->with('success', 'Programme added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add programme.');
        }
    }

    public function delete($id)
    {
        $programme = Programme::findOrFail($id);
        $programme->delete();

        return redirect()->back()->with('success', 'Programme deleted successfully!');
    }

    public function edit($id)
    {
        $programme = Programme::findOrFail($id);
        $sections = Section::all();
        return view('programmes-edit', compact('programme', 'sections'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'base_code' => 'required|string|max:10',
            'region' => 'nullable|string|max:3',
            'start_month' => 'nullable|string|max:20',
            'section_id' => 'required|exists:sections,id',
        ]);

        $programme = Programme::findOrFail($id);
        $programme->update($request->all());

        return redirect()->route('programmes')->with('success', 'Updated successfully');
    }
}
