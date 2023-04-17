<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BpartnerIndexController extends Controller
{
    public function index()
    {
        return view('bpartner.index');
    }
}
