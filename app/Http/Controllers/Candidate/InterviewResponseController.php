<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\InterviewInvitation;
use Illuminate\Http\Request;

class InterviewResponseController extends Controller
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
        dd($request);
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
    public function edit(Application $interviewresponse)
    {
        // Check if the logged in user is the intended candidate
        if (auth()->user()->id !== $interviewresponse->user_id) {
            abort(403);
        }
        $interviewinvitation = InterviewInvitation::where('application_id',$interviewresponse->id)->first();
        return view('candidate.interviewresponse.edit', compact('interviewresponse','interviewinvitation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $interviewresponse)
    {
        $validated = $request->validate([
            'candidateresponse' => 'required',
            'candidatecomment' => 'nullable',
            'responded' => 'required',
        ]);
        $interviewinvitation = InterviewInvitation::where('application_id',$interviewresponse->id)->first();

        $interviewinvitation->update($validated);

        return to_route('candidate.index')->with('message','Thank for your response');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
