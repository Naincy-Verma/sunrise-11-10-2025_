<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PatientEducation;

class PatientEducationController extends Controller
{
    public function index()
    {
        $educations = PatientEducation::all();
        return view('admin.pages.patient_education.index', compact('educations'));
    }

    public function create()
    {
        $types = ['Your Rights as a Patient', 'Your Responsibilities as a Patient'];
        return view('admin.pages.patient_education.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'descriptions' => 'required|array',
            'descriptions.*' => 'required|string',
        ]);

        foreach ($request->descriptions as $desc) {
            PatientEducation::create([
                'heading' => $request->heading,
                'description' => $desc,
            ]);
        }

        return redirect()->route('admin.patient-education.index')->with('success', 'Patient education added successfully.');
    }

    public function edit($id)
    {
        $education = PatientEducation::findOrFail($id);
        $types = ['Your Rights as a Patient', 'Your Responsibilities as a Patient'];
        return view('admin.pages.patient_education.edit', compact('education', 'types'));
    }

    public function update(Request $request, $id)
    {
        $education = PatientEducation::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $education->update([
            'heading' => $request->heading,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.patient-education.index')->with('success', 'Patient education updated successfully.');
    }

    public function destroy($id)
    {
        $education = PatientEducation::findOrFail($id);
        $education->delete();
        return redirect()->route('admin.patient-education.index')->with('success', 'Patient education deleted successfully.');
    }

    public function show($id)
    {
        // Get the first record for this heading
        $education = PatientEducation::findOrFail($id);

        // Fetch all descriptions for the same heading
        $allEducations = PatientEducation::where('heading', $education->heading)->get();

        return view('admin.pages.patient_education.show', compact('education', 'allEducations'));
    }
}
