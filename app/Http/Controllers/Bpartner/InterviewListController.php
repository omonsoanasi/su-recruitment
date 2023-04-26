<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationLongList;
use App\Models\ApplicationShortList;
use App\Models\HoDFeedback;
use App\Models\InterviewInvitation;
use Illuminate\Http\Request;

class InterviewListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1); // Extract the query parameter from the URL

        $interviewlists = InterviewInvitation::where('staff_requistion_form_id', $param)->get();
        return view('bpartner.interviewlist.index', compact('interviewlists'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $interviewlist)
    {
        $longlistcomments = ApplicationLongList::where('applicant_id',$interviewlist->user_id)->where('application_id', $interviewlist->id)->get();
        $shortlistcomments = ApplicationShortList::where('applicant_id',$interviewlist->user_id)->where('application_id', $interviewlist->id)->get();
        $hodcomments = HoDFeedback::where('applicant_id',$interviewlist->user_id)->where('application_id', $interviewlist->id)->get();
        return view('bpartner.interviewlist.show', compact('interviewlist', 'longlistcomments', 'shortlistcomments','hodcomments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
