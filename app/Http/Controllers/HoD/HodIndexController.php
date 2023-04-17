<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HodIndexController extends Controller
{
    public function index()
    {
        return view('hod.index');
    }
}
