<?php

namespace App\Http\Controllers;

use App\Models\PatientTestimonial;
use Illuminate\Http\Request;

class PatientTestimonialController extends Controller
{
    // Show all testimonials
    public function index()
    {
        $testimonials = PatientTestimonial::all();
        return view('admin.pages.patient_testimonials.index', compact('testimonials'));
    }
    // Show single testimonial
    public function show($id)
    {
        $testimonial = PatientTestimonial::findOrFail($id);
        return view('admin.pages.patient_testimonials.show', compact('testimonial'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pages.patient_testimonials.create');
    }

    // Store new testimonial
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'video' => 'required|mimes:mp4,mov,avi,webm|max:51200', // max 50MB
        ]);

        $data = $request->all();

        // Handle video
        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = time() . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->move(public_path('admin-assets/images/admin-image/testimonials/'), $videoName);
            $data['video'] = $videoName;
        }

        PatientTestimonial::create($data);

        return redirect()->route('admin.patient_testimonials.index')->with('success', 'Testimonial Added Successfully!');
    }

    // Edit form
    public function edit($id)
    {
        $testimonial = PatientTestimonial::findOrFail($id);
        return view('admin.pages.patient_testimonials.edit', compact('testimonial'));
    }

    // Update testimonial
    public function update(Request $request, $id)
    {
        $testimonial = PatientTestimonial::findOrFail($id);

        $request->validate([
            'patient_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'video' => 'nullable|mimes:mp4,mov,avi,webm|max:51200', // optional on update
        ]);

        $data = $request->all();

        // Update video
        if ($request->hasFile('video')) {
            // Delete old video if exists
            if ($testimonial->video && file_exists(public_path('admin-assets/images/admin-image/testimonials/' . $testimonial->video))) {
                unlink(public_path('admin-assets/images/admin-image/testimonials/' . $testimonial->video));
            }
            $videoFile = $request->file('video');
            $videoName = time() . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->move(public_path('admin-assets/images/admin-image/testimonials/'), $videoName);
            $data['video'] = $videoName;
        }

        $testimonial->update($data);

        return redirect()->route('admin.patient_testimonials.index')->with('success', 'Testimonial Updated Successfully!');
    }

    // Delete testimonial
    public function destroy($id)
    {
        $testimonial = PatientTestimonial::findOrFail($id);

        // Delete video if exists
        if ($testimonial->video && file_exists(public_path('admin-assets/images/admin-image/testimonials/' . $testimonial->video))) {
            unlink(public_path('admin-assets/images/admin-image/testimonials/' . $testimonial->video));
        }

        $testimonial->delete();

        return redirect()->route('admin.patient_testimonials.index')->with('success', 'Testimonial Deleted Successfully!');
    }
}
