<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Models\HoDFeedback;
use Illuminate\Http\Request;

class HoDFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'comment' => 'required|max:255|min:3',
            'user_id' => 'max:255',
            'staff_requistion_form_id' => 'max:255',
            'application_id' => 'required',
            'applicant_id' => 'required',
        ]);
        $hodfeedback = HoDFeedback::updateOrCreate(
            ['staff_requistion_form_id' => $validated['staff_requistion_form_id'], 'application_id' => $validated['application_id'], 'applicant_id' => $validated['applicant_id']],
            ['comment' => $validated['comment'], 'user_id' =>$validated['user_id']]
        );

        return back()->with('message','Successfully updated');
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
