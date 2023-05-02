<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartnerComment;
use App\Models\CampusLocation;
use App\Models\Department;
use App\Models\EDComment;
use App\Models\FOComment;
use App\Models\JobType;
use App\Models\PublishedJobComment;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class PnCApprovedRequistionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pncapprovedrequistions = StaffRequistionForm::where('status', '>=', 3)->get();

        return view('bpartner.pncapprovedrequistions.index', compact('pncapprovedrequistions'));
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
    public function edit(StaffRequistionForm $pncapprovedrequistion)
    {
        $bpcomments = BusinessPartnerComment::where('staff_requistion_forms_id', $pncapprovedrequistion->id)->get();
        $focomments = FOComment::where('staff_requistion_forms_id', $pncapprovedrequistion->id)->get();
        $edcomments = EDComment::where('staff_requistion_forms_id', $pncapprovedrequistion->id)->get();
        $jobTypes = JobType::all();
        $departments = Department::all();
        $campuslocations = CampusLocation::all();
        $publishable = PublishedJobComment::where('staff_requistion_forms_id', $pncapprovedrequistion->id)->first();
        return view('bpartner.pncapprovedrequistions.edit', compact('pncapprovedrequistion', 'bpcomments','focomments','jobTypes', 'departments','edcomments','campuslocations', 'publishable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffRequistionForm $pncapprovedrequistion)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
