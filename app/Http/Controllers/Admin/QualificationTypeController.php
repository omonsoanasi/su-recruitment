<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualificationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QualificationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualificationtypes = QualificationType::all();
        return view('admin.qualificationtype.index', compact('qualificationtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.qualificationtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        QualificationType::create($validated);

        return to_route('admin.qualificationtype.index')->with('message', 'type Successfully Saved');
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
    public function edit(QualificationType $qualificationtype)
    {
        return view('admin.qualificationtype.edit', compact('qualificationtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QualificationType $qualificationtype): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        $qualificationtype->update($validated);

        return to_route('admin.qualificationtype.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualificationType $qualificationtype)
    {
        $qualificationtype->delete();

        return to_route('admin.qualificationtype.index')->with('message','Type removed');
    }
}
