<?php

namespace App\Http\Controllers;

use App\Models\VideoTestimonial;
use Illuminate\Http\Request;

class VideoTestimonialController extends Controller
{
    // List all video testimonials
    public function index()
    {
        $videos = VideoTestimonial::all();
        return view('admin.pages.video_testimonials.index', compact('videos'));
    }

    // Show single video testimonial
    public function show($id)
    {
        $video = VideoTestimonial::findOrFail($id);
        return view('admin.pages.video_testimonials.show', compact('video'));
    }

    // Create form
    public function create()
    {
        return view('admin.pages.video_testimonials.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video' => 'required|mimes:mp4,mov,avi,webm|max:51200',
        ]);

        $data = $request->all();

        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoName = time() . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->move(public_path('admin-assets/images/admin-image/video-testimonials/'), $videoName);
            $data['video'] = $videoName;
        }

        VideoTestimonial::create($data);

        return redirect()->route('admin.video_testimonials.index')->with('success', 'Video Testimonial Added Successfully!');
    }

    // Edit form
    public function edit($id)
    {
        $video = VideoTestimonial::findOrFail($id);
        return view('admin.pages.video_testimonials.edit', compact('video'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $video = VideoTestimonial::findOrFail($id);

        $request->validate([
            'patient_name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'video' => 'nullable|mimes:mp4,mov,avi,webm|max:51200',
        ]);

        $data = $request->all();

        if ($request->hasFile('video')) {
            if ($video->video && file_exists(public_path('admin-assets/images/admin-image/video-testimonials/' . $video->video))) {
                unlink(public_path('admin-assets/images/admin-image/video-testimonials/' . $video->video));
            }
            $videoFile = $request->file('video');
            $videoName = time() . '.' . $videoFile->getClientOriginalExtension();
            $videoFile->move(public_path('admin-assets/images/admin-image/video-testimonials/'), $videoName);
            $data['video'] = $videoName;
        }

        $video->update($data);

        return redirect()->route('admin.video_testimonials.index')->with('success', 'Video Testimonial Updated Successfully!');
    }

    // Delete
    public function destroy($id)
    {
        $video = VideoTestimonial::findOrFail($id);

        if ($video->video && file_exists(public_path('admin-assets/images/admin-image/video-testimonials/' . $video->video))) {
            unlink(public_path('admin-assets/images/admin-image/video-testimonials/' . $video->video));
        }

        $video->delete();

        return redirect()->route('admin.video_testimonials.index')->with('success', 'Video Testimonial Deleted Successfully!');
    }
}
