<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationLongList;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class ApplicationShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1); // Extract the query parameter from the URL

        $receivedapplications = Application::where('staff_requistion_form_id', $param)->get(); // Retrieve the staff requisition form applications that match the specified ID

        return view('bpartner.applicationshow.index', compact('receivedapplications'));
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Application $applicationshow)
    {
        $longlisted = ApplicationLongList::where('application_id', $applicationshow->id)->where('applicant_id',$applicationshow->user_id)->get();
        return view('bpartner.applicationshow.show', compact('applicationshow','longlisted'));
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
//        $staffrequistionform->delete();

//        return to_route('hod.staffrequistionform.index')->with('message','Requisition deleted');
    }
}
