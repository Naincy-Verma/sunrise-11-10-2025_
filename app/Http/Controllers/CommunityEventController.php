<?php

namespace App\Http\Controllers;

use App\Models\CommunityEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommunityEventController extends Controller
{
    // Show all events
    public function index()
    {
        $events = CommunityEvent::latest()->get(); // Already done
        return view('admin.pages.community_events.index', compact('events'));
    }

    // Show form to create new event
    public function create()
    {
        return view('admin.pages.community_events.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Generate a unique clean slug
        $slug = Str::slug($request->title);
        $count = CommunityEvent::where('slug', 'LIKE', "{$slug}%")->count();
        $slug = $count ? "{$slug}-" . ($count + 1) : $slug;

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ];

        // Upload image if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin-assets/images/admin-image/community-events/'), $filename);
            $data['image'] = $filename;
        }

        CommunityEvent::create($data);

        return redirect()->route('admin.community-events.index')
                         ->with('success', 'Community Event Added Successfully!');
    }

    // Show single event
    public function show($id)
    {
        $event = CommunityEvent::findOrFail($id);
        return view('admin.pages.community_events.show', compact('event'));
    }

    // Show edit form
    public function edit($id)
    {
        $event = CommunityEvent::findOrFail($id);
        return view('admin.pages.community_events.edit', compact('event'));
    }

    // Update event
    public function update(Request $request, $id)
    {
        $event = CommunityEvent::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ];

        // Regenerate slug only if title changes
        if ($request->title !== $event->title) {
            $slug = Str::slug($request->title);
            $count = CommunityEvent::where('slug', 'LIKE', "{$slug}%")->count();
            $data['slug'] = $count ? "{$slug}-" . ($count + 1) : $slug;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            $oldPath = public_path('admin-assets/images/admin-image/community-events/' . $event->image);
            if ($event->image && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin-assets/images/admin-image/community-events/'), $filename);
            $data['image'] = $filename;
        }

        $event->update($data);

        return redirect()->route('admin.community-events.index')
                         ->with('success', 'Community Event Updated Successfully!');
    }

    // Delete event
    public function destroy($id)
    {
        $event = CommunityEvent::findOrFail($id);

        if ($event->image && file_exists(public_path('admin-assets/images/admin-image/community-events/' . $event->image))) {
            unlink(public_path('admin-assets/images/admin-image/community-events/' . $event->image));
        }

        $event->delete();

        return redirect()->route('admin.community-events.index')
                         ->with('success', 'Community Event Deleted Successfully!');
    }
}
