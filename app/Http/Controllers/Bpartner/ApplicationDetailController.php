<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class ApplicationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishedjobs = StaffRequistionForm::where('status',4)->get();
        return view('bpartner.applications.index', compact('publishedjobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
