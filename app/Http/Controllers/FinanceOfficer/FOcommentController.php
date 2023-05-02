<?php

namespace App\Http\Controllers\FinanceOfficer;

use App\Http\Controllers\Controller;
use App\Models\FOComment;
use App\Models\StaffRequistionForm;
use Illuminate\Http\Request;

class FOcommentController extends Controller
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
            'comment' => 'required|max:2055|min:3',
            'user_id' => 'max:255',
            'staff_requistion_forms_id' => 'max:255',
            'status' => 'required',
        ]);
        $formId = $validated['staff_requistion_forms_id'];
        $staffFormRequistion = StaffRequistionForm::find($formId);
        $staffFormRequistion->status = $validated['status'];
        $staffFormRequistion->save();

        $foComment = FOComment::updateOrCreate(
            ['staff_requistion_forms_id' => $validated['staff_requistion_forms_id']],
            ['comment' => $validated['comment'], 'user_id' =>$validated['user_id']]
        );

        return to_route('financeofficer.forequistions.index')->with('message','Successfully updated');
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
