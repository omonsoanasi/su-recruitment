<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Models\BusinessPartnerComment;
use App\Models\CampusLocation;
use App\Models\Department;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffRequisitionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $staffrequistions = StaffRequistionForm::where('user_id','=',$user_id)->where('status', '!=', -2)->get();
        return view('hod.staffrequistionform.index', compact('staffrequistions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobtypes = JobType::all();
        $departments = Department::all();
        $campuslocations = CampusLocation::all();
        return view('hod.staffrequistionform.create', compact('jobtypes', 'departments', 'campuslocations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id' => 'max:255',
            'job_type_id' => 'max:255',
            'department_id' => 'max:255',
            'campus_location_id' => 'max:255',
            'jobtitle' => 'max:255|min:3',
            'approvedsalary' => 'max:255|min:3',
            'reportingto' => 'max:255|min:3',
            'numberofvacancies' => 'max:255',
            'noofcurrentholders' => 'max:255',
            'statusofemployment' => 'min:3',
            'startdate' => 'max:255',
            'advertise' => 'max:255',
            'advertjustification' => 'max:2055',
            'jobpurpose' => 'min:3',
            'accountability' => 'min:3',
            'educationalqualifications' => 'min:3',
            'experience' => 'max:2055|min:3',
            'personalqualities' => 'min:3',
            'other' => 'max:20055',
            'skill' => 'max:20055',
            'onlineexam'=> 'required',
            'technicalexam' => 'required'
        ]);

        $slug = Str::slug($validated['jobtitle']) . '-' . time();
        $validated['slug'] = $slug;
        StaffRequistionForm::create($validated);

        return to_route('hod.staffrequistionform.index')->with('message','Requisition submitted successfully');
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
    public function edit(StaffRequistionForm $staffrequistionform)
    {
        // Check if the logged in user is the author of the post
        if (auth()->user()->id !== $staffrequistionform->user_id) {
            abort(403);
        }

        $comments = BusinessPartnerComment::where('staff_requistion_forms_id', $staffrequistionform->id)->get();
        $jobTypes = JobType::all();
        $departments = Department::all();
        $campuslocations = CampusLocation::all();
        $businesspartnerrejection = BusinessPartnerComment::where('staff_requistion_forms_id', $staffrequistionform->id)->get();
        //render the edit view
        return view('hod.staffrequistionform.edit', compact('staffrequistionform','comments', 'jobTypes', 'departments', 'campuslocations', 'businesspartnerrejection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffRequistionForm $staffrequistionform)
    {
        $validated = $request->validate([
            'user_id' => 'max:255',
            'job_type_id' => 'max:255',
            'department_id' => 'max:255',
            'campus_location_id' => 'max:255',
            'jobtitle' => 'max:255|min:3',
            'approvedsalary' => 'max:255|min:3',
            'reportingto' => 'max:255|min:3',
            'numberofvacancies' => 'max:255',
            'noofcurrentholders' => 'max:255',
            'statusofemployment' => 'min:3',
            'startdate' => 'max:255',
            'advertise' => 'max:255',
            'advertjustification' => 'max:2055',
            'jobpurpose' => 'min:3',
            'accountability' => 'min:3',
            'educationalqualifications' => 'min:3',
            'experience' => 'max:2055|min:3',
            'personalqualities' => 'min:3',
            'other' => 'max:20055',
            'skill' => 'max:20055',
            'onlineexam'=> 'required',
            'technicalexam' => 'required',
            'status' => 'required',
        ]);
        $staffrequistionform->update($validated);

        return to_route('hod.staffrequistionform.index')->with('message','Requisition updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffRequistionForm $staffrequistionform): RedirectResponse
    {
        // Check if the logged in user is the author of the form
        if (auth()->user()->id !== $staffrequistionform->user_id) {
            abort(403);
        }
        $staffrequistionform->delete();

        return to_route('hod.staffrequistionform.index')->with('message','Requisition deleted');
    }
}
