<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialityController extends Controller
{
    // Show all specialties
    public function index()
    {
        $specialties = Speciality::all(); 
        return view('admin.pages.specialities.index', compact('specialties'));
    }

    // Show form to create a specialty
    public function create()
    {
        return view('admin.pages.specialities.create');
    }

    // Store a new specialty
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'required|boolean'
        ]);

        $data = $request->only(['title','description']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time().'_'.$icon->getClientOriginalName();
            $icon->move(public_path('admin-assets/images/admin-image/specialties/icons'), $iconName);
            $data['icon'] = 'admin-assets/images/admin-image/specialties/icons/' . $iconName;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin-assets/images/admin-image/specialties/images'), $imageName);
            $data['image'] = 'admin-assets/images/admin-image/specialties/images/' . $imageName;
        }

        Speciality::create($data);
        return redirect()->route('specialties.index')->with('success', 'Speciality created successfully.');
    }

    // Show a single specialty
    public function show(Speciality $specialty)
    {
        return view('admin.pages.specialities.show', compact('specialty'));
    }

    // Edit specialty form
    public function edit(Speciality $specialty)
    {
        return view('admin.pages.specialities.edit', compact('specialty'));
    }
   // Update specialty
    public function update(Request $request, Speciality $specialty)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'required|boolean'
        ]);

        $data = $request->only(['title','description']);
        $data['slug'] = Str::slug($request->title);

        // Icon upload
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time().'_'.$icon->getClientOriginalName();
            $icon->move(public_path('admin-assets/images/admin-image/specialties/icons'), $iconName);
            $data['icon'] = 'admin-assets/images/admin-image/specialties/icons/' . $iconName;
        }

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('admin-assets/images/admin-image/specialties/images'), $imageName);
            $data['image'] = 'admin-assets/images/admin-image/specialties/images/' . $imageName;
        }

        $specialty->update($data);

        return redirect()->route('specialties.index')->with('success', 'Speciality updated successfully.');
    }

    // Delete specialty
    public function destroy(Speciality $specialty)
    {
        $specialty->delete();
        return redirect()->route('specialties.index')->with('success', 'Speciality deleted successfully.');
    }
}