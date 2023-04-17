<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicationAttachment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicationAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicationattachments = ApplicationAttachment::all();
        return view('admin.applicationattachment.index', compact('applicationattachments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.applicationattachment.create');
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

        ApplicationAttachment::create($validated);

        return to_route('admin.applicationattachment.index')->with('message', 'Successfully Saved');
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
    public function edit(ApplicationAttachment $applicationattachment)
    {
        return view('admin.applicationattachment.edit', compact('applicationattachment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApplicationAttachment $applicationattachment): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        $applicationattachment->update($validated);

        return to_route('admin.applicationattachment.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationAttachment $applicationattachment)
    {
        $applicationattachment->delete();

        return to_route('admin.applicationattachment.index')->with('message','Successfully removed');
    }
}
