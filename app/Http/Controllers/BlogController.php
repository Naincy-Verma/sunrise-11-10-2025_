<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Show all blogs (Admin list)
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.pages.blogs.index', compact('blogs'));
    }

    // Show single blog details (Admin)
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.pages.blogs.show', compact('blog'));
    }

    // Show create form
    public function create()
    {
        return view('admin.pages.blogs.create');
    }

    // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->all();

        // Generate slug automatically
        $data['slug'] = Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin-assets/images/admin-image/blogs/'), $filename);
            $data['image'] = $filename;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Added Successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.pages.blogs.edit', compact('blog'));
    }

    // Update existing blog
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'published_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Handle new image upload (delete old one)
        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path('admin-assets/images/admin-image/blogs/' . $blog->image))) {
                unlink(public_path('admin-assets/images/admin-image/blogs/' . $blog->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin-assets/images/admin-image/blogs/'), $filename);
            $data['image'] = $filename;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Updated Successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && file_exists(public_path('admin-assets/images/admin-image/blogs/' . $blog->image))) {
            unlink(public_path('admin-assets/images/admin-image/blogs/' . $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog Deleted Successfully!');
    }
}
