<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        // Filter by status if a query parameter is provided
        $status = $request->get('status');

        // if ($status && in_array($status, ['pending', 'confirmed', 'cancelled'])) {
        //     $appointments = Appointment::with(['country','state','city','specialty','doctor','timeSlot'])
        //         ->where('status', $status)
        //         ->get();
        // } else {
        //     $appointments = Appointment::with(['country','state','city','specialty','doctor','timeSlot'])->get();
        // }

        if ($status && in_array($status, ['pending', 'confirmed', 'cancelled']))
             {
                $appointments = Appointment::with(['country','state','city','speciality','doctor','timeSlot'])
                    ->{$status}() // ✅ dynamically call the matching scope
                    ->get();
            } 
        else 
            {
                $appointments = Appointment::with(['country','state','city','speciality','doctor','timeSlot'])->get();
            }

        // Count totals for status badges
        $pendingCount = Appointment::where('status', 'pending')->count();
        $confirmedCount = Appointment::where('status', 'confirmed')->count();
        $cancelledCount = Appointment::where('status', 'cancelled')->count();

        return view('admin.pages.book-appointment.appointment.index', compact(
            'appointments',
            'pendingCount',
            'confirmedCount',
            'cancelledCount',
            'status'
        ));
    }

    public function edit($id)
    {
          $appointment = Appointment::findOrFail($id); 
        return view('admin.pages.book-appointment.appointment.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id); 

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $appointment->update(['status' => $request->status]);

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment status updated successfully.');
    }

    public function destroy($id)
    {
         $appointment = Appointment::findOrFail($id);

        $appointment->delete();
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function show($id)
    {
        // Fetch the appointment along with all related models
        $appointment = Appointment::with(['country', 'state', 'city', 'speciality', 'doctor', 'timeSlot'])
            ->findOrFail($id);

        // Return the view with the appointment data
        return view('admin.pages.book-appointment.appointment.show', compact('appointment'));
    }

}
