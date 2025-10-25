<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecializedCourse;

class SpecializedCourseController extends Controller
{
    public function index()
    {
        $courses = SpecializedCourse::orderBy('id', 'asc')->get(); // newest first
        return view('admin.pages.training.specialized_course.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.pages.training.specialized_course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'sub_title'      => 'nullable|string|max:255',
            'badge_label'    => 'required|string|max:255',
            'price'          => 'required|numeric',
            'features'       => 'required|array',
            'button_text'    => 'required|string|max:255',
            'status'         => 'required|in:active,inactive',
        ]);

        // SpecializedCourse::create([
        //     'title' => $request->title,
        //     'sub_title' => $request->sub_title,
        //     'badge_label' => $request->badge_label,
        //     'price' => $request->price,
        //     'features' => json_encode($request->features),
        //     'button_text' => $request->button_text,
        //     'status' => $request->status,
        // ]);

        SpecializedCourse::create($request->all());

        return redirect()->route('admin.specialized_course.index')->with('success', 'Specialized course added successfully!');
    }

    public function edit($id)
    {
        $course = SpecializedCourse::findOrFail($id);
        return view('admin.pages.training.specialized_course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = SpecializedCourse::findOrFail($id);

        $request->validate([
            'title'         => 'sometimes|required|string|max:255',
            'sub_title'     => 'sometimes|nullable|string|max:255',
            'badge_label'   => 'sometimes|required|string|max:255',
            'price'         => 'sometimes|required|numeric',
            'features'      => 'sometimes|required|array',
            'button_text'   => 'sometimes|required|string|max:255',
            'status'        => 'sometimes|required|in:active,inactive',
        ]);

        // $course->update([
        //     'title'         => $request->title,
        //     'sub_title'     => $request->sub_title,
        //     'badge_label'   => $request->badge_label,
        //     'price'         => $request->price,
        //     'features'      => ($request->features),
        //     'button_text'   => $request->button_text,
        //     'status'        => $request->status,
        // ]);

          $course->update($request->all());

        return redirect()->route('admin.specialized_course.index')->with('success', 'Specialized course updated successfully!');
    }

    public function destroy($id)
    {
        $course = SpecializedCourse::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.specialized_course.index')->with('success', 'Specialized course deleted successfully!');
    }
}

