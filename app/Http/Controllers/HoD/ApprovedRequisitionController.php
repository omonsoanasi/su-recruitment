<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartnerComment;
use App\Models\Department;
use App\Models\EDComment;
use App\Models\FOComment;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;

        $approvedrequistions = StaffRequistionForm::where('status', 4)->where('user_id', $userId)->get();

        return view('hod.approvedrequistion.index', compact('approvedrequistions'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffRequistionForm $approvedrequistion)
    {
        // Check if the logged in user is the owner of the requisition
        if (auth()->user()->id !== $approvedrequistion->user_id) {
            abort(403);
        }

        $bpcomments = BusinessPartnerComment::where('staff_requistion_forms_id', $approvedrequistion->id)->get();
        $focomments = FOComment::where('staff_requistion_forms_id', $approvedrequistion->id)->get();
        $edcomments = EDComment::where('staff_requistion_forms_id', $approvedrequistion->id)->get();
        $jobTypes = JobType::all();
        $departments = Department::all();
        return view('hod.approvedrequistion.edit', compact('approvedrequistion', 'bpcomments','focomments','jobTypes', 'departments','edcomments'));
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
