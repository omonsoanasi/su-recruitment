<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\BusinessPartnerComment;
use App\Models\CandidateBasicInfo;
use App\Models\Department;
use App\Models\EDComment;
use App\Models\FOComment;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class AvailableJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $availablejobs = StaffRequistionForm::where('status',4)->where('active', true)->whereDate('applicationdeadline', '>=', now())->get();
        return view('candidate.availablejobs.index', compact('availablejobs'));
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
    public function edit(StaffRequistionForm $availablejob)
    {
        $user_id = auth()->id();
        $coverletters = Application::where('staff_requistion_form_id', $availablejob->id)
            ->where('user_id', $user_id)
            ->get();
        $basicinfo = CandidateBasicInfo::where('user_id',$user_id)->first();
        return view('candidate.availablejobs.edit', compact('availablejob', 'coverletters', 'basicinfo'));
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
