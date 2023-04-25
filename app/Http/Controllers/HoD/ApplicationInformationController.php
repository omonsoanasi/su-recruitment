<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationShortList;
use App\Models\HoDFeedback;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use function Psy\sh;

class ApplicationInformationController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $applicationinformation)
    {
        //get the requisitionform and the HoD details of the one who created the requisition
        $staffrequistionform = StaffRequistionForm::where('id',$applicationinformation->staff_requistion_form_id)->first();
        // Check if the logged in user is the author of the form
        if (auth()->user()->id !== $staffrequistionform->user_id) {
            abort(403);
        }
        $hodfeedback = HoDFeedback::where('user_id',$staffrequistionform->user_id)->where('application_id', $applicationinformation->id)->get();
        $shortlistcomments = ApplicationShortList::where('application_id',$applicationinformation->id)->get();
        return view('hod.applicationinformation.show', compact('applicationinformation', 'hodfeedback', 'shortlistcomments'));
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
