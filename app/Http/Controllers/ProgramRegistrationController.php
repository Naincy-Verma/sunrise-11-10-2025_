<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProgramRegistration;

class ProgramRegistrationController extends Controller
{
    /**
     * Display a listing of the program registrations.
     */
    public function index()
    {
        // Fetch all registrations with related training program
        $registrations = ProgramRegistration::with('trainingProgram')->orderBy('id', 'desc')->get();

        return view('admin.pages.training.program_registration.index', compact('registrations'));
    }

    /**
     * Optional: show a single registration (if needed)
     */
    public function show($id)
    {
        $registration = ProgramRegistration::with('trainingProgram')->findOrFail($id);
        return view('admin.pages.training.program_registration.show', compact('registration'));
    }

    /**
     * Optional: delete a registration (if needed)
     */
    public function destroy($id)
    {
        $registration = ProgramRegistration::findOrFail($id);

        // Delete document file if exists
        if ($registration->document && file_exists(public_path($registration->document))) {
            unlink(public_path($registration->document));
        }

        $registration->delete();

        return redirect()->route('admin.program_registration.index')->with('success', 'Registration deleted successfully.');
    }
}
