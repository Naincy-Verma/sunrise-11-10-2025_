<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuickEnquiry;
use App\Models\Appointment;
use App\Models\ProgramRegistration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalQuickEnquiries = QuickEnquiry::count();
        $totalAppointments = Appointment::count();
        $totalProgramRegistrations = ProgramRegistration::count();

        return view('admin.pages.dashboard', compact(
            'totalQuickEnquiries',
            'totalAppointments',
            'totalProgramRegistrations'
        ));
    }
}
