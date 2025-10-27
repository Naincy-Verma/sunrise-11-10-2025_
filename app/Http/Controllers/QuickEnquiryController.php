<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuickEnquiry;
use Illuminate\Http\Request;

class QuickEnquiryController extends Controller
{
    /**
     * Display a listing of all quick enquiries.
     */
    public function index()
    {
        // Fetch all enquiries along with their related time slots
        $enquiries = QuickEnquiry::with('timeSlot')->latest()->get();

        return view('admin.pages.quick_enquiry.index', compact('enquiries'));
    }

    /**
     * Show a single enquiry (optional if you plan to view details).
     */
    public function show($id)
    {
        $enquiry = QuickEnquiry::with('timeSlot')->findOrFail($id);
        return view('admin.pages.quick_enquiry.show', compact('enquiry'));
    }

    /**
     * Delete a quick enquiry (if needed from admin panel).
     */
    public function destroy($id)
    {
        $enquiry = QuickEnquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('admin.quick-enquiries.index')
                         ->with('success', 'Enquiry deleted successfully.');
    }
}
