<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobtypes = JobType::all();
        return view('admin.jobtypes.index', compact('jobtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:jobtypes|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        JobType::create($validated);

        return to_route('admin.jobtypes.index')->with('message', 'Job Type Successfully Saved');
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
    public function edit(JobType $jobtype)
    {
        return view('admin.jobtypes.edit', compact('jobtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobType $jobtype): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:jobtypes|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        $jobtype->update($validated);

        return to_route('admin.jobtypes.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobType $jobtype)
    {
        $jobtype->delete();

        return to_route('admin.jobtypes.index')->with('message','Job type removed');
    }
}
