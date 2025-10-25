<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingProgram;

class TrainingProgramController extends Controller
{
    public function index()
    {
        $programs = TrainingProgram::orderBy('s_no', 'asc')->get();
        return view('admin.pages.training.training_program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.pages.training.training_program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'training_course' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
        ]);

         // Get all existing s_no in ascending order
        $existingNumbers = TrainingProgram::orderBy('s_no')->pluck('s_no')->toArray();

        // Find the first missing number
        $nextSNo = 1;
        foreach($existingNumbers as $num){
            if($num != $nextSNo) break;
            $nextSNo++;
        }

       TrainingProgram::create([
        's_no' => $nextSNo,
        'training_course' => $request->training_course,
        'duration' => $request->duration,
        'schedule' => $request->schedule,
    ]);

        return redirect()->route('admin.training_program.index')->with('success', 'Training program added successfully!');
    }

    public function edit($id)
    {
        $program = TrainingProgram::findOrFail($id);
        return view('admin.pages.training.training_program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = TrainingProgram::findOrFail($id);

        $request->validate([
            's_no' => 'sometimes|required|integer|unique:training_programs,s_no,'.$id,
            'training_course' => 'sometimes|required|string|max:255',
            'duration' => 'sometimes|required|string|max:255',
            'schedule' => 'sometimes|required|string|max:255',
        ]);

        $program->update($request->all());

        return redirect()->route('admin.training_program.index')->with('success', 'Training program updated successfully!');
    }

    public function destroy($id)
    {
        $program = TrainingProgram::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.training_program.index')->with('success', 'Training program deleted successfully!');
    }
}
