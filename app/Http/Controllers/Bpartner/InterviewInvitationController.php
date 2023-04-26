<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Mail\CandidateInterviewInviteEmail;
use App\Models\ApplicationShortList;
use App\Models\CandidateBasicInfo;
use App\Models\InterviewInvitation;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InterviewInvitationController extends Controller
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
                'user_id' => 'max:255',
                'applicant_id' => 'max:255',
                'application_id' => 'max:255',
                'comments' => 'required|max:255|min:3',
                'staff_requistion_form_id' => 'max:255',
                'interviewdate' => 'required',
                'interviewlocation' => 'required',
                'interviewtime' => 'required',
                'extrarequirements' => 'max:255'
            ]);
//        } catch (\Illuminate\Validation\ValidationException $e) {
//            dd($e->errors());
//        }
        //create or update the comment for shortlisting the candidate
        $invitecandidate = InterviewInvitation::updateOrCreate(
            ['applicant_id' => $validated['applicant_id'], 'application_id' => $validated['application_id'], 'staff_requistion_form_id' => $validated['staff_requistion_form_id']],
            ['comments' => $validated['comments'], 'user_id' =>$validated['user_id'], 'interviewlocation' =>$validated['interviewlocation'], 'interviewtime' =>$validated['interviewtime'], 'interviewdate' =>$validated['interviewdate'], 'extrarequirements' =>$validated['extrarequirements']]
        );
        $positiondetails = StaffRequistionForm::where('id',$request->staff_requistion_form_id)->first();
        $applicantdata = CandidateBasicInfo::where('user_id',$request->applicant_id)->first();
        $interviewresponse = $validated['application_id'];
        Mail::to($applicantdata->email)->send(new CandidateInterviewInviteEmail($applicantdata, $positiondetails, $validated, $interviewresponse));

        return back()->with('message','Added to short list');
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
