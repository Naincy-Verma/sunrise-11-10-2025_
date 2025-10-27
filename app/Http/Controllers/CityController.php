<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;

class CityController extends Controller
{
    // List all cities
    public function index()
    {
        $cities = City::with('state.country')->get();
        return view('admin.pages.book-appointment.city.index', compact('cities'));
    }

    // Show create form
    public function create()
    {
        $countries = Country::all(); // Only 
    
        return view('admin.pages.book-appointment.city.create', compact('countries'));
    }

    // Store new city
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities,name',
            'state_id' => 'required|exists:states,id',
        ]);

        City::create($request->all());

        return redirect()->route('admin.cities.index')->with('success', 'City added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::all();
        return view('admin.pages.book-appointment.city.edit', compact('city','countries'));
    }

    // Update city
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:cities,name,' . $city->id,
            'state_id' => 'required|exists:states,id',
        ]);

        $city->update($request->all());

        return redirect()->route('admin.cities.index')->with('success', 'City updated successfully.');
    }

    // Delete city
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success', 'City deleted successfully.');
    }

    // AJAX: get states by country
    public function getStates($countryId)
    {
        $states = State::where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($states);
    }


}
