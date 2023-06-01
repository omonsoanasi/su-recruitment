<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::orderBy('id','desc')->limit(1)->first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'companyName'=>'required',
            'aboutTitle'=>'required',
            'aboutContent'=>'required',
            'mainUrl'=>'required'
        ]);
        About::create($validated);

        return to_route('admin.about.index')->with('message','About us information saved successfully');
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
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'companyName'=>'required',
            'aboutTitle'=>'required',
            'aboutContent'=>'required',
            'mainUrl'=>'required'
        ]);
        $about->update($validated);
        return to_route('admin.about.index')->with('message','About Information Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
