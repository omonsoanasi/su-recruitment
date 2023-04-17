<?php

namespace App\Http\Controllers\FinanceOfficer;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartnerComment;
use App\Models\Department;
use App\Models\FOComment;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class FORequistionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forequistions = StaffRequistionForm::where('status','=',1)->orWhere('status','=',2)->get();
        return view('financeofficer.forequistions.index', compact('forequistions'));
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
    public function edit(StaffRequistionForm $forequistion)
    {
        $bpcomments = BusinessPartnerComment::where('staff_requistion_forms_id', $forequistion->id)->get();
        $focomments = FOComment::where('staff_requistion_forms_id', $forequistion->id)->get();
        $jobTypes = JobType::all();
        $departments = Department::all();
        return view('financeofficer.forequistions.edit', compact('forequistion', 'bpcomments','focomments','jobTypes', 'departments'));
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
