<?php

namespace App\Http\Controllers\HoD;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationLongList;
use App\Models\ApplicationShortList;
use App\Models\BusinessPartnerComment;
use App\Models\CampusLocation;
use App\Models\Department;
use App\Models\JobType;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceivedApplicationsContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $param = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1); // Extract the query parameter from the URL

        //get the requisitionform and the HoD details of the one who created the requisition
        $staffrequistionform = StaffRequistionForm::where('id',$param)->first();
        // Check if the logged in user is the author of the form
        if (auth()->user()->id !== $staffrequistionform->user_id) {
            abort(403);
        }
        //sends a list of the long listed candidates to the HOD for recommendations
        $applicationlonglists = ApplicationLongList::where('staff_requistion_forms_id', $param)->get();

        return view('hod.applications.index', compact('applicationlonglists'));
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
    public function edit(Application $application)
    {
        $receivedapplications = Application::where('staff_requistion_form_id',$application->staff_requisition_form_id)->get();
        //render the edit view
        return view('hod.applications.edit', compact('receivedapplications'));
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
