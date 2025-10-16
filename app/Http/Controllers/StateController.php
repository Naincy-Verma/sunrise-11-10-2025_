<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('country')->get();
        return view('admin.pages.book-appointment.state.index', compact('states'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.pages.book-appointment.state.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:states,name',
            'country_id' => 'required|exists:countries,id',
        ]);
        State::create($request->all());
        return redirect()->route('admin.states.index')->with('success', 'State added successfully.');
    }

    public function edit($id)
    {
        $countries = Country::all();
        return view('admin.pages.book-appointment.state.edit', compact('state','countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:states,name,' . $state->id,
            'country_id' => 'required|exists:countries,id',
        ]);
        $state->update($request->all());
        return redirect()->route('admin.states.index')->with('success', 'State updated successfully.');
    }

    public function destroy($id)
    {
        $state->delete();
        return redirect()->route('admin.states.index')->with('success', 'State deleted successfully.');
    }
}

