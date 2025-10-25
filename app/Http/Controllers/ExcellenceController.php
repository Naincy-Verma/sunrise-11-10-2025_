<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Excellence;

class ExcellenceController extends Controller
{
    public function index()
    {
        $excellences = Excellence::all();
        return view('admin.pages.training.excellence.index', compact('excellences'));
    }

    public function create()
    {
        return view('admin.pages.training.excellence.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('heading', 'description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('admin-assets/images/admin-image/excellences'), $filename);
            $data['image'] = $filename;
        }

        Excellence::create($data);

        return redirect()->route('admin.excellences.index')->with('success', 'Excellence added successfully!');
    }

    public function edit($id)
    {
        $excellence = Excellence::findOrFail($id);
        return view('admin.pages.training.excellence.edit', compact('excellence'));
    }

    public function update(Request $request, $id)
    {
        $excellence = Excellence::findOrFail($id);

        $request->validate([
            'heading' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('heading', 'description');

        if ($request->hasFile('image')) {
            if ($excellence->image && file_exists(public_path('admin-assets/images/admin-image/excellences/'.$excellence->image))) {
                unlink(public_path('admin-assets/images/admin-image/excellences/'.$excellence->image));
            }
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('admin-assets/images/admin-image/excellences'), $filename);
            $data['image'] = $filename;
        }

        $excellence->update($data);

        return redirect()->route('admin.excellences.index')->with('success', 'Excellence updated successfully!');
    }

    public function destroy($id)
    {
        $excellence = Excellence::findOrFail($id);

        if ($excellence->image && file_exists(public_path('admin-assets/images/admin-image/excellences/'.$excellence->image))) {
            unlink(public_path('admin-assets/images/admin-image/excellences/'.$excellence->image));
        }

        $excellence->delete();
        return redirect()->route('admin.excellences.index')->with('success', 'Excellence deleted successfully!');
    }
}
