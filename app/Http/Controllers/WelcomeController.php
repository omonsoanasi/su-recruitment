<?php

namespace App\Http\Controllers;

use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function vacancy()
    {
        $vacancies = StaffRequistionForm::where('status',4)->get();
        return view('welcome', compact('vacancies'));
    }
}
