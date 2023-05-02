<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartnerComment;
use App\Models\Department;
use App\Models\EDComment;
use App\Models\FOComment;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequistionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requistions = StaffRequistionForm::where('status', '>=', 0)->where('status','<=', 2)->orWhere('status', '=', -2)->orWhere('status', '=', -3)->orderBy('status', 'asc')->get();
        return view('bpartner.requistions.index', compact('requistions'));
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
    public function edit(StaffRequistionForm $requistion)
    {
        $comments = BusinessPartnerComment::where('staff_requistion_forms_id', $requistion->id)->get();
        $focomments = FOComment::where('staff_requistion_forms_id', $requistion->id)->get();
        $edComments = EDComment::where('staff_requistion_forms_id', $requistion->id)->get();
        $jobTypes = JobType::all();
        $departments = Department::all();
        return view('bpartner.requistions.edit', compact('requistion', 'comments','focomments', 'jobTypes', 'departments', 'edComments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffRequistionForm $staffRequistionForm)
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
