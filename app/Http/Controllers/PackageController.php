<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    // Show all blogs (Admin list)
    public function index()
    {
        $packages = Package::all();
        return view('admin.pages.package.index', compact('packages'));
    }

    // Show single blog details (Admin)
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.pages.package.show', compact('package'));
    }

    // Show create form
    public function create() 
    {
        return view('admin.pages.package.create');
    }

    // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            
            'heading' => 'required|string|max:255',
            'tests' => 'required|array'
        ]);

        $data = $request->all();

        Package::create($data);

        return redirect()->route('admin.package.index')->with('success', 'Package section added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.pages.package.edit', compact('package'));
    }

    // Update existing blog
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $request->validate([

            'heading' => 'required|string|max:255',
             'tests' => 'required|array',
        ]);

        $data = $request->all();

        $package->update($data);

        return redirect()->route('admin.package.index')->with('success', 'Package section updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        $package->delete();

        return redirect()->route('admin.package.index')->with('success', 'Package section deleted successfully!');
    }
}
