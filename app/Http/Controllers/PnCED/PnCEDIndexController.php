<?php

namespace App\Http\Controllers\PnCED;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class PnCEDIndexController extends Controller
{
    public function index ()
    {
        $requistions = StaffRequistionForm::all();
        $publishedRequisitions = StaffRequistionForm::where('status',4)->get();
        $applications = Application::all();
        return view ('pnced.index', compact('requistions', 'publishedRequisitions', 'applications'));
    }
}
