<?php

namespace App\Http\Controllers\PnCED;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PnCEDIndexController extends Controller
{
    public function index ()
    {
        return view ('pnced.index');
    }
}
