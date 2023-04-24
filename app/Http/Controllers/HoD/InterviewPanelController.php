<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Mail\PanelMemberInvite;
use App\Mail\PanelMemberInviteEmail;
use App\Models\InterviewPanel;
use App\Models\StaffRequistionForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InterviewPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $ownrequistions = StaffRequistionForm::where('user_id', $userid)->where('status',4)->get();
        return view('hod.interviewpanel.index', compact('ownrequistions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userid = Auth::user()->id;
        $ownrequistions = StaffRequistionForm::where('user_id', $userid)->where('status',4)->get();
        return view('hod.interviewpanel.create', compact('ownrequistions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'max:255',
            'staff_requistion_form_id'=> 'required',
            'panelistname' => 'required',
//            'panelistemail' => 'required|email|unique:interview_panels,panelistemail',
            'panelistemail' => 'required|email',
            'panelistphonenumber' => 'required',
            'interviewnotes' => 'required',
            'interviewdate' => 'required',
        ]);

        $toemail = $validated['panelistemail'];

        InterviewPanel::create($validated);

//        Mail::to($toemail)->send(new PanelMemberInviteEmail($validated));

        return to_route('hod.interviewpanel.index')->with('message','Panelist Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffRequistionForm $interviewpanel)
    {
        $panels = InterviewPanel::where('staff_requistion_form_id', $interviewpanel->id)->get();
        return view('hod.interviewpanel.show', compact('panels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InterviewPanel $interviewpanel)
    {
        $userid = Auth::user()->id;
        $ownrequistions = StaffRequistionForm::where('user_id', $userid)->where('status',4)->get();
        return view('hod.interviewpanel.edit', compact('ownrequistions', 'interviewpanel'));
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
    public function destroy(InterviewPanel $interviewpanel)
    {
        // Check if the logged in user is the author of the form
        if (auth()->user()->id !== $interviewpanel->user_id) {
            abort(403);
        }
        $interviewpanel->delete();

        return to_route('hod.interviewpanel.index')->with('message','Panelist removed successfully');
    }
}
