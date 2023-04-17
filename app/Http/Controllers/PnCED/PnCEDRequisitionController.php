<?php

namespace App\Http\Controllers\PnCED;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartnerComment;
use App\Models\Department;
use App\Models\EDComment;
use App\Models\FOComment;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class PnCEDRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $edrequistions = StaffRequistionForm::where('status','>=',2)->get();
        return view('pnced.edrequistions.index', compact('edrequistions'));
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
    public function edit(StaffRequistionForm $edrequistion)
    {
        $bpcomments = BusinessPartnerComment::where('staff_requistion_forms_id', $edrequistion->id)->get();
        $focomments = FOComment::where('staff_requistion_forms_id', $edrequistion->id)->get();
        $edcomments = EDComment::where('staff_requistion_forms_id', $edrequistion->id)->get();
        $jobTypes = JobType::all();
        $departments = Department::all();
        return view('pnced.edrequistions.edit', compact('edrequistion', 'bpcomments','focomments','jobTypes', 'departments','edcomments'));
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
