<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\ApplicationAttachment;
use App\Models\CandidateAcademicBackground;
use App\Models\CandidateAttachment;
use App\Models\CandidateBasicInfo;
use App\Models\CandidateDeclaration;
use App\Models\CandidateWorkExp;
use App\Models\QualificationType;
use App\Models\ReferralSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $referralsources = ReferralSource::all();
        $qualificationtypes = QualificationType::all();
        $applicationattachments = ApplicationAttachment::all();
        $candidateInfo = CandidateBasicInfo::where('user_id', $userId)->first();
        $candidatedeclaration = CandidateDeclaration::where('user_id', $userId)->first();
        $candidateacademicinfos = CandidateAcademicBackground::with('qualificationtype')->where('user_id', $userId)->get();
        $workexperiences = CandidateWorkExp::where('user_id', $userId)->get();
        $candidateattachments = CandidateAttachment::where('user_id', $userId)->get();
        return view('candidate.information.index', compact('referralsources','qualificationtypes', 'candidateInfo', 'candidateacademicinfos', 'workexperiences', 'applicationattachments', 'candidateattachments', 'candidatedeclaration'));
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
