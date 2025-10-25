<?php

namespace App\Http\Controllers;

use App\Models\Vision_Mission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $visions = Vision_Mission::all();
        return view('admin.pages.aboutpage.vision_mission.index', compact('visions'));
    }

    public function create()
    {
        return view('admin.pages.aboutpage.vision_mission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon_vission'          => 'required|string|max:255',
            'heading_vission'       => 'required|string|max:255',
            'vission_description'   => 'required|string',
            'icon_mission'          => 'required|string|max:255',
            'heading_mission'       => 'required|string|max:255',
            'mission_description'   => 'required|string',
            'stats'                 => 'required|array',
        ]);

        $data = $request->all();
        $data['stats'] = json_encode($request->stats); // ✅ convert array to JSON

        Vision_Mission::create($data);

        return redirect()->route('admin.vision-mission.index')
                         ->with('success', 'Vision & Mission added successfully!');
    }

    public function show($id)
    {
        $vision = Vision_Mission::findOrFail($id);
        return view('admin.pages.aboutpage.vision_mission.show', compact('vision'));
    }

    public function edit($id)
    {
        $vision = Vision_Mission::findOrFail($id);
        return view('admin.pages.aboutpage.vision_mission.edit', compact('vision'));
    }

    public function update(Request $request, $id)
    {
        $vision = Vision_Mission::findOrFail($id);

        $request->validate([
            'icon_vission'          => 'required|string|max:255',
            'heading_vission'       => 'required|string|max:255',
            'vission_description'   => 'required|string',
            'icon_mission'          => 'required|string|max:255',
            'heading_mission'       => 'required|string|max:255',
            'mission_description'   => 'required|string',
            'stats'                 => 'required|array',
        ]);

        $data = $request->all();
        $data['stats'] = json_encode($request->stats); // ✅ encode again

        $vision->update($data);

        return redirect()->route('admin.vision-mission.index')
                         ->with('success', 'Vision & Mission updated successfully!');
    }

    public function destroy($id)
    {
        $vision = Vision_Mission::findOrFail($id);
        $vision->delete();

        return redirect()->route('admin.vision-mission.index')
                         ->with('success', 'Vision & Mission deleted successfully!');
    }
}
