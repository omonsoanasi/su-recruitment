<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\CandidateBasicInfo;
use App\Models\StaffRequistionForm;
class BpartnerIndexController extends Controller
{
    public function index()
    {
        $newrequistions = StaffRequistionForm::where('status',0)->get();
        $pncapprovedrequistions = StaffRequistionForm::where('status', '>=', 3)->get();
        $activeapplications = StaffRequistionForm::where('status', 4)->get();
        $male = CandidateBasicInfo::where('gender','Male')->get();
        $female = CandidateBasicInfo::where('gender','Female')->get();
        $other = CandidateBasicInfo::where('gender','Other')->get();
        return view('bpartner.index', compact('newrequistions', 'pncapprovedrequistions', 'activeapplications', 'male', 'female', 'other'));
    }
}
