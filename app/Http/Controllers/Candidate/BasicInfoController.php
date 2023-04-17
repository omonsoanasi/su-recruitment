<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateBasicInfo;
use Illuminate\Http\Request;

class BasicInfoController extends Controller
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
            'user_id' => 'required',
            'title' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'idnumber' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'dateofbirth' => 'required|date',
            'disability' => 'required',
            'nationality' => 'required',
            'countryofresidence' => 'required',
            'applicanttype' => 'required',
            'maritalstatus' => 'required',
            'relatedtostaff' => 'required',
            'relationshiptype' => 'required_if:relatedtostaff,1',
            'nameofstaff' => 'required_if:relatedtostaff,1',
            'phonenumber' => 'required',
            'townofresidence' => 'required',
            'postaladdress' => 'required',
            'city' => 'required',
            'postalcode' => 'required',
            'currsalary' => 'required',
            'expsalary' => 'required',
            'currentbenefits' => 'required',
            'referralsource' => 'required',
            'othersource' => 'required_if:referralsource,Other',
            'skillscompetence' => 'required',
            'strengths' => 'required',
            'lawviolation' => 'required',
            'violationdesc' => 'required_if:lawviolation,1',
            'exploitation' => 'required',
            'exploitationdesc' => 'required_if:exploitaion,1',
        ]);

        // Update or create the CandidateBasicInfo model based on the user_id
        CandidateBasicInfo::updateOrCreate(['user_id' => $validated['user_id']], $validated);

        // Retrieve the CandidateBasicInfo model based on the user_id
        $candidateInfo = CandidateBasicInfo::where('user_id', $validated['user_id'])->first();

        return to_route('candidate.information.index')->with('message','Basic information saved successfully');
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
