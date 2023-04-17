<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateAcademicBackground;
use App\Models\QualificationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcademicInfoController extends Controller
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
    public function store(Request $request): RedirectResponse
    {
        $path = 'academic_certs/'.$request->user_id;

        $validated = $request->validate([
            'user_id' => 'required',
            'qualification_type_id' => 'required',
            'qualificationtitle' => 'required',
            'specializationarea' => 'min:3',
            'institutionname' => 'required',
            'fromdate' => 'required',
            'todate' => 'required',
            'academiccert' => 'required|mimes:pdf,png,jpg|max:2048'
        ]);


        $fileName = time().'_'.$request->file('academiccert')->getClientOriginalName();
        $request->file('academiccert')->move(public_path($path), $fileName);

        $filePath = $path.'/'.$fileName;

        $validated['academiccert'] = $filePath;

        CandidateAcademicBackground::updateOrCreate([
            'user_id' => $validated['user_id'],
            'qualification_type_id' => $validated['qualification_type_id']
        ], $validated);


        return to_route('candidate.information.index')->with('message','Academic information saved successfully');
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
    public function edit(CandidateAcademicBackground $academicinfo)
    {
        // Check if the logged in user is the author of the post
        if (auth()->user()->id !== $academicinfo->user_id) {
            abort(403);
        }

        $qualificationtypes = QualificationType::all();

        //render the edit view
        return view('candidate.academicinfo.edit', compact('academicinfo','qualificationtypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CandidateAcademicBackground $academicinfo): RedirectResponse
    {

        $path = 'academic_certs/'.$request->user_id;

        $validated = $request->validate([
            'qualification_type_id' => 'required',
            'qualificationtitle' => 'required',
            'specializationarea' => 'min:3',
            'institutionname' => 'required',
            'fromdate' => 'required',
            'todate' => 'required',
            'academiccert' => 'nullable|mimes:pdf,png,jpg|max:2048'
        ]);

// check if a new academic certificate file has been uploaded
        if ($request->hasFile('academiccert')) {
            // delete the existing academic certificate file
            if ($academicinfo->academiccert && file_exists(public_path($academicinfo->academiccert))) {
                unlink(public_path($academicinfo->academiccert));
            }

            $fileName = time().'_'.$request->file('academiccert')->getClientOriginalName();
            $request->file('academiccert')->move(public_path($path), $fileName);
            $filePath = $path.'/'.$fileName;
            $validated['academiccert'] = $filePath;
        }

        $academicinfo->update($validated);

        return to_route('candidate.information.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateAcademicBackground $academicinfo)
    {
        // Check if the logged in user is the author of the information
        if (auth()->user()->id !== $academicinfo->user_id) {
            abort(403);
        }
        // Delete the file from the server
        if ($academicinfo->academiccert) {
            $filePath = public_path($academicinfo->academiccert);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $academicinfo->delete();

        return to_route('candidate.information.index')->with('message','Removed successfully');
    }
}
