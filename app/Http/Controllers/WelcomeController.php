<?php

namespace App\Http\Controllers;

use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function vacancy(Request $request)
    {
        $query = $request->input('query');
        $results = [];
        if ($request->filled('query')) {
            $results = DB::table('staff_requistion_forms')
                ->where('jobtitle', 'LIKE', '%' . $query . '%')
                ->get();
        }
        $vacancies = StaffRequistionForm::where('status',4)->get();
        $submitted = $request->has('query');
        return view('welcome', compact('vacancies', 'results', 'submitted'));
    }

}
