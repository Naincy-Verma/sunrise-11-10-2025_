<?php

namespace App\Http\Controllers;

use App\Models\RareCase;
use Illuminate\Http\Request;

class RareCaseController extends Controller
{
    // Show all rare cases
    public function index()
    {
        $cases = RareCase::all();
        return view('admin.pages.rare_cases.index', compact('cases'));
    }

    // Show single case details
    public function show($id)
    {
        $case = RareCase::findOrFail($id);
        return view('admin.pages.rare_cases.show', compact('case'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pages.rare_cases.create');
    }

    // Store new case
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin-assets/images/admin-image/rare-cases/'), $filename);
            $data['image'] = $filename;
        }

        RareCase::create($data);

        return redirect()->route('admin.rare-cases.index')->with('success', 'Rare Case Added Successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $case = RareCase::findOrFail($id);
        return view('admin.pages.rare_cases.edit', compact('case'));
    }

    // Update existing case
    public function update(Request $request, $id)
    {
        $case = RareCase::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($case->image && file_exists(public_path('admin-assets/images/admin-image/rare-cases/' . $case->image))) {
                unlink(public_path('admin-assets/images/admin-image/rare-cases/' . $case->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin-assets/images/admin-image/rare-cases/'), $filename);
            $data['image'] = $filename;
        }

        $case->update($data);

        return redirect()->route('admin.rare-cases.index')->with('success', 'Rare Case Updated Successfully!');
    }

    // Delete a case
    public function destroy($id)
    {
        $case = RareCase::findOrFail($id);

        if ($case->image && file_exists(public_path('admin-assets/images/admin-image/rare-cases/' . $case->image))) {
            unlink(public_path('admin-assets/images/admin-image/rare-cases/' . $case->image));
        }

        $case->delete();

        return redirect()->route('admin.rare-cases.index')->with('success', 'Rare Case Deleted Successfully!');
    }
}
