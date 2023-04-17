<?php

namespace App\Http\Controllers\FinanceOfficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FOIndexController extends Controller
{
    public function index()
    {
        return view ('financeofficer.index');
    }
}
