<?php

namespace App\Http\Controllers\Bpartner;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationLongList;
use App\Models\ApplicationShortList;
use Illuminate\Http\Request;

class ApplicationLongListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?") + 1); // Extract the query parameter from the URL

        $applicationlonglists = ApplicationLongList::where('staff_requistion_forms_id', $param)->get(); // Retrieve the staff requisition form applications that match the specified ID


        return view('bpartner.applicationlonglist.index', compact('applicationlonglists'));
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
            'user_id' => 'max:255',
            'applicant_id' => 'max:255',
            'application_id' => 'max:255',
            'comment' => 'required|max:255|min:3',
            'staff_requistion_forms_id' => 'max:255',
        ]);
        //create or update the comment for shortlisting the candidate
        $longllistcandidate = ApplicationLongList::updateOrCreate(
            ['applicant_id' => $validated['applicant_id'], 'application_id' => $validated['application_id'], 'staff_requistion_forms_id' => $validated['staff_requistion_forms_id']],
            ['comment' => $validated['comment'], 'user_id' =>$validated['user_id']]
        );

        return back()->with('message','Successfully long listed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $applicationlonglist)
    {
        $shortlisted = ApplicationShortList::where('applicant_id', $applicationlonglist->user_id)->where('application_id', $applicationlonglist->id)->get();
        return view('bpartner.applicationlonglist.show', compact('applicationlonglist', 'shortlisted'));
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
