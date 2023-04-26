<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Candidate\BasicInfoController;
use App\Http\Controllers\Controller;
use App\Mail\CandidateInterviewInviteEmail;
use App\Models\Application;
use App\Models\ApplicationLongList;
use App\Models\ApplicationShortList;
use App\Models\CandidateBasicInfo;
use App\Models\HoDFeedback;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ApplicationShortListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1); // Extract the query parameter from the URL

        $applicationshortlists = ApplicationShortList::where('staff_requistion_form_id', $param)->get(); // Retrieve the staff requisition form applications that match the specified ID
        return view('bpartner.applicationshortlist.index', compact('applicationshortlists'));
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
        $validated = $request->validate([
            'user_id' => 'max:255',
            'applicant_id' => 'max:255',
            'application_id' => 'max:255',
            'comment' => 'required|max:255|min:3',
            'staff_requistion_form_id' => 'max:255',
        ]);

//        $positiondetails = StaffRequistionForm::where('id',$request->staff_requistion_form_id)->first();
//        $applicantdata = CandidateBasicInfo::where('user_id',$request->applicant_id)->first();
//        Mail::to($applicantdata->email)->send(new CandidateInterviewInviteEmail($applicantdata, $positiondetails));

        //create or update the comment for shortlisting the candidate
        $shortlistcandidate = ApplicationShortList::updateOrCreate(
            ['applicant_id' => $validated['applicant_id'], 'application_id' => $validated['application_id'], 'staff_requistion_form_id' => $validated['staff_requistion_form_id']],
            ['comment' => $validated['comment'], 'user_id' =>$validated['user_id']]
        );

        return back()->with('message','Invitation sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $applicationshortlist)
    {
        $longlistcomments = ApplicationLongList::where('applicant_id',$applicationshortlist->user_id)->where('application_id', $applicationshortlist->id)->get();
        $shortlistcomments = ApplicationShortList::where('applicant_id',$applicationshortlist->user_id)->where('application_id', $applicationshortlist->id)->get();
        $hodcomments = HoDFeedback::where('applicant_id',$applicationshortlist->user_id)->where('application_id', $applicationshortlist->id)->get();
        return view('bpartner.applicationshortlist.show', compact('applicationshortlist', 'longlistcomments', 'shortlistcomments','hodcomments'));
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
