<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    // Show all doctors
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.pages.doctor.index', compact('doctors'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pages.doctor.create');
    }

    // Store doctor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'experience' => 'nullable|string',
            'designation' => 'nullable|string',
            'qualification' => 'nullable|string',
            'speciality' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'profile_url' => 'nullable|string|max:255',
            'appointment_url' => 'nullable|url',
            'brief_profile_heading' => 'nullable|string',
            'brief_profile_description' => 'nullable|string',
            'metrics' => 'nullable|array',
            'metrics.*' => 'nullable|string',
            'notable_records' => 'nullable|string',
            'professional_heading' => 'nullable|string',
            'professional_subheading' => 'nullable|string',
            'professional_description' => 'nullable|string',
            'training_record' => 'nullable|string',
            'specialized_heading' => 'nullable|string',
            'specialized_subheading' => 'nullable|string',
            'specialized_title' => 'nullable|string',
            'specialized_description' => 'nullable|string',
            'areas_of_specialization' => 'nullable|array',
            'areas_of_specialization.*' => 'nullable|string',
            'contributions_heading' => 'nullable|string',
            'contributions_description' => 'nullable|string',
            'latest_achievement' => 'nullable|string',
        ]);

        // ✅ Generate unique slug from name
        $validated['slug'] = Str::slug($request->name);

        // ✅ Upload Profile Image
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin-assets/images/admin-image/doctors'), $imageName);
            $validated['profile_image'] = $imageName;
        }

        // ✅ Convert arrays to JSON
        $validated['metrics'] = json_encode($request->metrics);
        $validated['areas_of_specialization'] = json_encode($request->areas_of_specialization);

        // ✅ Save doctor
        Doctor::create($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor added successfully!');
    }

    // Show a single doctor (admin)
    public function show(Doctor $doctor)
    {
        return view('admin.pages.doctor.show', compact('doctor'));
    }

    // Edit form
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.pages.doctor.edit', compact('doctor'));
    }

    // Update doctor
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'experience' => 'nullable|string',
            'designation' => 'nullable|string',
            'qualification' => 'nullable|string',
            'speciality' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'profile_url' => 'nullable|string|max:255',
            'appointment_url' => 'nullable|url',
            'brief_profile_heading' => 'nullable|string',
            'brief_profile_description' => 'nullable|string',
            'metrics' => 'nullable|array',
            'metrics.*' => 'nullable|string',
            'notable_records' => 'nullable|string',
            'professional_heading' => 'nullable|string',
            'professional_subheading' => 'nullable|string',
            'professional_description' => 'nullable|string',
            'training_record' => 'nullable|string',
            'specialized_heading' => 'nullable|string',
            'specialized_subheading' => 'nullable|string',
            'specialized_title' => 'nullable|string',
            'specialized_description' => 'nullable|string',
            'areas_of_specialization' => 'nullable|array',
            'areas_of_specialization.*' => 'nullable|string',
            'contributions_heading' => 'nullable|string',
            'contributions_description' => 'nullable|string',
            'latest_achievement' => 'nullable|string',
        ]);

        // ✅ Generate unique slug from name
        $validated['slug'] = Str::slug($request->name);

        // ✅ Upload new image if available
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin-assets/images/admin-image/doctors'), $imageName);
            $validated['profile_image'] = $imageName;
        }

        // ✅ Convert arrays to JSON
        $validated['metrics'] = json_encode($request->metrics);
        $validated['areas_of_specialization'] = json_encode($request->areas_of_specialization);

        $doctor->update($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    // Delete doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        $imagePath = public_path('admin-assets/images/admin-image/doctors/' . $doctor->profile_image);
        if ($doctor->profile_image && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $doctor->delete();
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully!');
    }

    // Frontend doctor detail page
    public function doctorDetail($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();
        return view('pages.team-details', compact('doctor'));
    }
}
