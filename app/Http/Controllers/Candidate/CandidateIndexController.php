<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class CandidateIndexController extends Controller
{
//    public function index()
//    {
//        return view('candidate.index');
//    }
    public function index()
    {
        $availablejobs = StaffRequistionForm::where('status',4)->where('status', true)->whereDate('applicationdeadline', '>=', now())->get();
        return view('candidate.availablejobs.index', compact('availablejobs'));
    }
}
