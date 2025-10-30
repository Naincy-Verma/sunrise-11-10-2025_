<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Show all doctors
    public function index()
    {
        $doctors = Doctor::with('speciality')->get();
        return view('admin.pages.doctor.index', compact('doctors'));
    }

    // Show create form
    public function create()
    {
        $specialities = Speciality::all();
        return view('admin.pages.doctor.create', compact('specialities'));
    }

    // Store doctor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'speciality_id' => 'nullable|exists:our_specialties,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'experience' => 'nullable|string',
            'designation' => 'nullable|string',
            'qualification' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'profile_url' => 'nullable|string|max:255',
            'appointment_url' => 'nullable|url',
            'brief_profile_heading' => 'nullable|string',
            'brief_profile_description' => 'nullable|string',
            'brief_profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'brief_notable_records' => 'nullable|string',
            'brief_metrics' => 'nullable|array',
            'professional_heading' => 'nullable|string',
            'professional_description' => 'nullable|array',
            'training_heading' => 'nullable|string',
            'training_description' => 'nullable|array',
            'training_record' => 'nullable|string',
            'specialized_heading' => 'nullable|string',
            'specialized_subheading' => 'nullable|string',
            'specialized_description' => 'nullable|array',
            'area_specialized_heading' => 'nullable|string',
            'areas_of_specialization' => 'nullable|array',
            'contributions_heading' => 'nullable|string',
            'contributions_description' => 'nullable|string',
            'latest_achievement' => 'nullable|string',
        ]);

        // ✅ Assign array fields safely (Laravel handles JSON automatically due to $casts)
        $validated['brief_metrics'] = $request->brief_metrics ?? [];
        $validated['professional_description'] = $request->professional_description ?? [];
        $validated['training_description'] = $request->training_description ?? [];
        $validated['specialized_description'] = $request->specialized_description ?? [];
        
        $validated['areas_of_specialization'] = $request->areas_of_specialization ?? [];

        // ✅ Upload images
        if ($request->hasFile('profile_image')) {
            $imageName = time().'_profile.'.$request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('admin-assets/images/admin-image/doctors'), $imageName);
            $validated['profile_image'] = $imageName;
        }

        if ($request->hasFile('brief_profile_image')) {
            $briefImageName = time().'_brief.'.$request->file('brief_profile_image')->getClientOriginalExtension();
            $request->file('brief_profile_image')->move(public_path('admin-assets/images/admin-image/doctors'), $briefImageName);
            $validated['brief_profile_image'] = $briefImageName;
        }

        Doctor::create($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor added successfully!');
    }

    // Edit doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $specialities = Speciality::all();
        return view('admin.pages.doctor.edit', compact('doctor', 'specialities'));
    }

    // Update doctor
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        $validated = $request->validate([
            'speciality_id' => 'nullable|exists:our_specialties,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'experience' => 'nullable|string',
            'designation' => 'nullable|string',
            'qualification' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'profile_url' => 'nullable|string|max:255',
            'appointment_url' => 'nullable|url',
            'brief_profile_heading' => 'nullable|string',
            'brief_profile_description' => 'nullable|string',
            'brief_profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'brief_notable_records' => 'nullable|string',
            'brief_metrics' => 'nullable|array',
            'professional_heading' => 'nullable|string',
            'professional_description' => 'nullable|array',
            'training_heading' => 'nullable|string',
            'training_description' => 'nullable|array',
            'training_record' => 'nullable|string',
            'specialized_heading' => 'nullable|string',
            'specialized_subheading' => 'nullable|string',
            'specialized_description' => 'nullable|array',
            'area_specialized_heading' => 'nullable|string',
            'areas_of_specialization' => 'nullable|array',
            'contributions_heading' => 'nullable|string',
            'contributions_description' => 'nullable|string',
            'latest_achievement' => 'nullable|string',
        ]);

        // ✅ Handle arrays safely
        $validated['brief_metrics'] = $request->brief_metrics ?? [];
        $validated['professional_description'] = $request->professional_description ?? [];
        $validated['training_description'] = $request->training_description ?? [];
        $validated['specialized_description'] = $request->specialized_description ?? [];
        $validated['areas_of_specialization'] = $request->areas_of_specialization ?? [];

        // ✅ Handle images
        if ($request->hasFile('profile_image')) {
            $imageName = time().'_profile.'.$request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->move(public_path('admin-assets/images/admin-image/doctors'), $imageName);
            $validated['profile_image'] = $imageName;
        }

        if ($request->hasFile('brief_profile_image')) {
            $briefImageName = time().'_brief.'.$request->file('brief_profile_image')->getClientOriginalExtension();
            $request->file('brief_profile_image')->move(public_path('admin-assets/images/admin-image/doctors'), $briefImageName);
            $validated['brief_profile_image'] = $briefImageName;
        }

        $doctor->update($validated);

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    // Show a single doctor
    public function show($id)
    {
        $doctor = Doctor::with('speciality')->findOrFail($id);
        return view('admin.pages.doctor.show', compact('doctor'));
    }

    // Delete doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        if ($doctor->profile_image && file_exists(public_path('admin-assets/images/admin-image/doctors/'.$doctor->profile_image))) {
            unlink(public_path('admin-assets/images/admin-image/doctors/'.$doctor->profile_image));
        }

        if ($doctor->brief_profile_image && file_exists(public_path('admin-assets/images/admin-image/doctors/'.$doctor->brief_profile_image))) {
            unlink(public_path('admin-assets/images/admin-image/doctors/'.$doctor->brief_profile_image));
        }

        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
