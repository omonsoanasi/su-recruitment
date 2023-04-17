<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampusLocation;
use Illuminate\Http\Request;

class CampusLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campuslocations = CampusLocation::all();
        return view('admin.campuslocation.index', compact('campuslocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.campuslocation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:campus_locations|max:255|min:3',
        ]);

        CampusLocation::create($validated);

        return to_route('admin.campuslocation.index')->with('message', 'Location Successfully Saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampusLocation $campuslocation)
    {
        return view('admin.campuslocation.edit', compact('campuslocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampusLocation $campuslocation)
    {
        $validated = $request->validate([
            'name' => 'required|unique:jobtypes|max:255|min:3',
        ]);

        $campuslocation->update($validated);

        return to_route('admin.campuslocation.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
