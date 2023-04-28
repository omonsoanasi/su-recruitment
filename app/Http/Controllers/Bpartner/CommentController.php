<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Mail\BusinessPartnerApprovalEmail;
use App\Mail\BusinessPartnerRequistionRejectionEmail;
use App\Models\BusinessPartnerComment;
use App\Models\StaffRequistionForm;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
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
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'comment' => 'required|max:255|min:3',
            'user_id' => 'max:255',
            'staff_requistion_forms_id' => 'max:255',
            'status' => 'required'
        ]);
        $formId = $validated['staff_requistion_forms_id'];
        $staffFormRequistion = StaffRequistionForm::find($formId);
        $staffFormRequistion->status = $validated['status'];
//        $staffFormRequistion->save();

//        $financeofficer = User::role('Finance Officer')->get();
//        $emails = $financeofficer->pluck('email');
//        Mail::to($emails)->send(new MyEmail());
        $foemails = User::role('Finance Officer')->pluck('email')->toArray();

        $bpComment = BusinessPartnerComment::updateOrCreate(
            ['staff_requistion_forms_id' => $validated['staff_requistion_forms_id']],
            ['comment' => $validated['comment'], 'user_id' =>$validated['user_id']]
        );

        if($validated['status'] == -1)
            Mail::to($staffFormRequistion->user->email)->send(new BusinessPartnerRequistionRejectionEmail($staffFormRequistion, $validated));
        elseif($validated['status'] == 1)
            Mail::to($foemails)->send(new BusinessPartnerApprovalEmail($staffFormRequistion, $validated));

        return to_route('bpartner.requistions.index')->with('message','Successfully updated');
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
