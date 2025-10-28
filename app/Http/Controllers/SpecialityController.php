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
        $specialities = Speciality::all();
        return view('admin.pages.specialities.index', compact('specialities'));
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
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'nullable|boolean'
        ]);

        $data = $request->only(['title', 'description']);
        $data['slug'] = Str::slug($request->title);
        $data['status'] = $request->status ?? 1; // Default Active

        // Upload icon
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '_' . $icon->getClientOriginalName();
            $icon->move(public_path('admin-assets/images/admin-image/specialties/icons'), $iconName);
            $data['icon'] = 'admin-assets/images/admin-image/specialties/icons/' . $iconName;
        }

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin-assets/images/admin-image/specialties/images'), $imageName);
            $data['image'] = 'admin-assets/images/admin-image/specialties/images/' . $imageName;
        }

        Speciality::create($data);

        return redirect()->route('admin.specialities.index')->with('success', 'Speciality created successfully.');
    }

    // Show a single specialty
    public function show(Speciality $speciality)
    {
        return view('admin.pages.specialities.show', compact('speciality'));
    }

    // Edit specialty form
    public function edit(Speciality $speciality)
    {
        return view('admin.pages.specialities.edit', compact('speciality'));
    }

    // Update specialty
    public function update(Request $request, Speciality $speciality)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'nullable|boolean'
        ]);

        $data = $request->only(['title', 'description']);
        $data['slug'] = Str::slug($request->title);
        $data['status'] = $request->status ?? $speciality->status;

        // Icon upload
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $iconName = time() . '_' . $icon->getClientOriginalName();
            $icon->move(public_path('admin-assets/images/admin-image/specialties/icons'), $iconName);
            $data['icon'] = 'admin-assets/images/admin-image/specialties/icons/' . $iconName;
        }

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin-assets/images/admin-image/specialties/images'), $imageName);
            $data['image'] = 'admin-assets/images/admin-image/specialties/images/' . $imageName;
        }

        $speciality->update($data);

        return redirect()->route('admin.specialities.index')->with('success', 'Speciality updated successfully.');
    }

    // Delete specialty
    public function destroy(Speciality $speciality)
    {
        $speciality->delete();
        return redirect()->route('admin.specialities.index')->with('success', 'Speciality deleted successfully.');
    }
}
