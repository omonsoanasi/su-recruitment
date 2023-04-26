<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Mail\CandidateInterviewInviteEmail;
use App\Models\Application;
use App\Models\ApplicationLongList;
use App\Models\ApplicationShortList;
use App\Models\CandidateBasicInfo;
use App\Models\CandidateOffer;
use App\Models\HoDFeedback;
use App\Models\InterviewInvitation;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CandidateOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1); // Extract the query parameter from the URL

        $candidateoffers = CandidateOffer::where('staff_requistion_form_id', $param)->get();
        return view('bpartner.candidateoffer.index', compact('candidateoffers'));
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
            'comments' => 'required|max:255|min:3',
            'staff_requistion_form_id' => 'max:255',
            'interviewdate' => 'required',
            'interviewtime' => 'required',
            'offered' => 'required',
        ]);

        //create or update the comment for shortlisting the candidate
        $candidateoffer = CandidateOffer::updateOrCreate(
            ['applicant_id' => $validated['applicant_id'], 'application_id' => $validated['application_id'], 'staff_requistion_form_id' => $validated['staff_requistion_form_id']],
            ['comments' => $validated['comments'], 'user_id' =>$validated['user_id'], 'interviewtime' =>$validated['interviewtime'], 'interviewdate' =>$validated['interviewdate'], 'offered' =>$validated['offered']]
        );
//        $positiondetails = StaffRequistionForm::where('id',$request->staff_requistion_form_id)->first();
//        $applicantdata = CandidateBasicInfo::where('user_id',$request->applicant_id)->first();
//        $interviewresponse = $validated['application_id'];
//        Mail::to($applicantdata->email)->send(new CandidateInterviewInviteEmail($applicantdata, $positiondetails, $validated, $interviewresponse));

        return back()->with('message','Process completed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $candidateoffer)
    {
        $longlistcomments = ApplicationLongList::where('applicant_id',$candidateoffer->user_id)->where('application_id', $candidateoffer->id)->get();
        $shortlistcomments = ApplicationShortList::where('applicant_id',$candidateoffer->user_id)->where('application_id', $candidateoffer->id)->get();
        $hodcomments = HoDFeedback::where('applicant_id',$candidateoffer->user_id)->where('application_id', $candidateoffer->id)->get();
        $interviewcomments = CandidateOffer::where('applicant_id',$candidateoffer->user_id)->where('application_id', $candidateoffer->id)->get();
        return view('bpartner.candidateoffer.show', compact('candidateoffer', 'longlistcomments', 'shortlistcomments','hodcomments','interviewcomments'));
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
