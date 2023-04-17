<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\EDComment;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;
        $myapplications = Application::where('user_id',$userId)->get();
        return view('candidate.applications.index', compact('myapplications'));
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
            'coverletter' => 'required|min:3',
            'user_id' => 'max:255',
            'staff_requistion_form_id' => 'max:255',
        ]);
//        $formId = $validated['staff_requistion_form_id'];
//        $staffFormRequistion = StaffRequistionForm::find($formId);
//        $staffFormRequistion->status = '3';
//        $staffFormRequistion->save();

        $application = Application::firstOrCreate(
            ['staff_requistion_form_id' => $validated['staff_requistion_form_id'], 'user_id' => $validated['user_id']],
            ['coverletter' => $validated['coverletter']]
        );

        return to_route('candidate.availablejobs.index')->with('message','Application sent successfully');
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
