<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\ApplicationAttachment;
use App\Models\CandidateAttachment;
use Illuminate\Http\Request;

class CandidateAttachmentController extends Controller
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
        $path = 'application_attachments/'.$request->user_id;

        $validated = $request->validate([
            'user_id' => 'required',
            'application_attachment_id' => 'required',
            'attachmentdoc' => 'required|mimes:pdf,png,jpg|max:2048'
        ]);


        $fileName = time().'_'.$request->file('attachmentdoc')->getClientOriginalName();
        $request->file('attachmentdoc')->move(public_path($path), $fileName);

        $filePath = $path.'/'.$fileName;

        $validated['attachmentdoc'] = $filePath;

        CandidateAttachment::updateOrCreate([
            'user_id' => $validated['user_id'],
            'application_attachment_id' => $validated['application_attachment_id']
        ], $validated);


        return to_route('candidate.information.index')->with('message','Attachment saved successfully');
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
    public function edit(CandidateAttachment $applicationattachment)
    {
        // Check if the logged in user is the author of the post
        if (auth()->user()->id !== $applicationattachment->user_id) {
            abort(403);
        }

        $attachments = ApplicationAttachment::all();

        //render the edit view
        return view('candidate.applicationattachment.edit', compact('applicationattachment','attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CandidateAttachment $applicationattachment)
    {
        $path = 'application_attachments/'.$request->user_id;

        $validated = $request->validate([
            'application_attachment_id' => 'required',
            'attachmentdoc' => 'nullable|mimes:pdf,png,jpg|max:2048'
        ]);

// check if a new academic certificate file has been uploaded
        if ($request->hasFile('attachmentdoc')) {
            // delete the existing academic certificate file
            if ($applicationattachment->attachmentdoc && file_exists(public_path($applicationattachment->attachmentdoc))) {
                unlink(public_path($applicationattachment->attachmentdoc));
            }

            $fileName = time().'_'.$request->file('attachmentdoc')->getClientOriginalName();
            $request->file('attachmentdoc')->move(public_path($path), $fileName);
            $filePath = $path.'/'.$fileName;
            $validated['attachmentdoc'] = $filePath;
        }

        $applicationattachment->update($validated);

        return to_route('candidate.information.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateAttachment $applicationattachment)
    {
        // Check if the logged in user is the author of the information
        if (auth()->user()->id !== $applicationattachment->user_id) {
            abort(403);
        }
        // Delete the file from the server
        if ($applicationattachment->attachmentdoc) {
            $filePath = public_path($applicationattachment->attachmentdoc);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $applicationattachment->delete();

        return to_route('candidate.information.index')->with('message','Removed successfully');
    }
}
