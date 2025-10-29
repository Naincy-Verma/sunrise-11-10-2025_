<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainingGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrainingGalleryController extends Controller
{
    /**
     * Display all gallery images.
     */
    public function index()
    {
        $gallery = TrainingGallery::latest()->get();
        return view('admin.pages.training.training_gallery.index', compact('gallery'));
    }

    /**
     * Show form to upload new images.
     */
    public function create()
    {
        return view('admin.pages.training.training_gallery.create');
    }

    /**
     * Store multiple uploaded images.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $imageName = time() . '_' . uniqid() . '.' . $imageFile->extension();
                $imageFile->move(public_path('admin-assets/images/admin-image/training_gallery'), $imageName);

                TrainingGallery::create([
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('admin.training-gallery.index')
                         ->with('success', 'Images uploaded successfully!');
    }

    /**
     * Delete image.
     */
    public function destroy($id)
    {
        $gallery = TrainingGallery::findOrFail($id);

        $imagePath = public_path('admin-assets/images/admin-image/training_gallery/' . $gallery->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
