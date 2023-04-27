<?php

namespace App\Http\Controllers\FinanceOfficer;

use App\Http\Controllers\Controller;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class FOIndexController extends Controller
{
    public function index()
    {
        $forequistions = StaffRequistionForm::where('status','=',1)->orWhere('status','=',2)->get();
        $approvedforequistions = StaffRequistionForm::where('status','=',3)->get();
        $allrequistions = StaffRequistionForm::all();
        $pncapproved = StaffRequistionForm::where('status',4)->get();
        return view ('financeofficer.index', compact('forequistions', 'approvedforequistions', 'allrequistions', 'pncapproved'));
    }
}
