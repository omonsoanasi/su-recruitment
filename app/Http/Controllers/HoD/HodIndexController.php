<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Models\CandidateOffer;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class HodIndexController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $staffrequistions = StaffRequistionForm::where('user_id','=',$user_id)->whereNotIn('status',[4])->get();
        $approvedrequistions = StaffRequistionForm::where('user_id','=',$user_id)->where('status',[4])->get();
        return view('hod.index', compact('staffrequistions','approvedrequistions'));
    }
}
