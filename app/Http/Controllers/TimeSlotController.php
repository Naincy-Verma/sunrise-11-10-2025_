<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeSlot;

class TimeSlotController extends Controller
{
    public function index()
    {
        $timeslots = TimeSlot::all();
        return view('admin.pages.book-appointment.time-slot.index', compact('timeslots'));
    }

    public function create()
    {
        return view('admin.pages.book-appointment.time-slot.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
             'status' => 'required|in:active,inactive'
        ]);
        
        TimeSlot::create([
        'start_time' => $request->start_time,
        'end_time'   => $request->end_time,
        'status'     => $request->status,
    ]);

        return redirect()->route('admin.time-slots.index')->with('success', 'Time slot added successfully.');
    }

    public function edit($id)
    {
         $timeSlot = TimeSlot::findOrFail($id);
        return view('admin.pages.book-appointment.time-slot.edit', compact('timeSlot'));
    }

    public function update(Request $request, $id)
    {
         $timeSlot = TimeSlot::findOrFail($id);

        $request->validate([
            'start_time' => 'sometimes|required',
            'end_time' => 'sometimes|required|after:start_time',
             'status' => 'sometimes|required|in:active,inactive'
        ]);
        
         $timeSlot->update([
            'start_time' => $request->start_time,
            'end_time'   => $request->end_time,
            'status'     => $request->status,  
        ]);

        return redirect()->route('admin.time-slots.index')->with('success', 'Time slot updated successfully.');
    }

    public function destroy($id)
    {
         $timeSlot = TimeSlot::findOrFail($id);
        $timeSlot->delete();
        return redirect()->route('admin.time-slots.index')->with('success', 'Time slot deleted successfully.');
    }
}
