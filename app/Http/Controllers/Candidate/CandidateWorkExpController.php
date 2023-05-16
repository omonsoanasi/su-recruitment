<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateWorkExp;
use Illuminate\Http\Request;

class CandidateWorkExpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        try {
        $validated = $request->validate([
            'user_id' => 'required',
            'jobtitle' => 'required',
            'department' => 'required',
            'companyname' => 'required',
            'country' => 'required',
            'specialization' => 'required',
            'currentemployer' => 'required|boolean',
            'fromdate' => 'required|date',
            'todate' => $request->input('currentemployer') ? 'nullable' : 'required|date',
            'currsalary' => 'required',
            'leavingreason' => 'nullable',
            'achievement' => 'nullable',
        ]);
//        } catch (\Illuminate\Validation\ValidationException $e) {
//            dd($e->getMessage());
//        }

        CandidateWorkExp::create($validated);

        return to_route('candidate.information.index')->with('message', 'Successfully Saved');
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
    public function edit(CandidateWorkExp $workexperience)
    {
        // Check if the logged in user is the author of the post
        if (auth()->user()->id !== $workexperience->user_id) {
            abort(403);
        }

        //render the edit view
        return view('candidate.workexperience.edit', compact('workexperience',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CandidateWorkExp $workexperience)
    {
        $validated = $request->validate([
            'jobtitle' => 'required',
            'department' => 'required',
            'companyname' => 'required',
            'country' => 'required',
            'specialization' => 'required',
            'currentemployer' => 'required|boolean',
            'fromdate' => 'required|date',
            'todate' => $request->input('currentemployer') ? 'nullable' : 'required|date',
            'currsalary' => 'required',
            'leavingreason' => 'nullable',
            'achievement' => 'nullable',
        ]);

        $workexperience->update($validated);

        return to_route('candidate.information.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateWorkExp $workexperience)
    {
        // Check if the logged in user is the author of the information
        if (auth()->user()->id !== $workexperience->user_id) {
            abort(403);
        }
        $workexperience->delete();

        return to_route('candidate.information.index')->with('message','Removed successfully');
    }
}
