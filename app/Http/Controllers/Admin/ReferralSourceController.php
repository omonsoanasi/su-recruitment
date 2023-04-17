<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReferralSource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReferralSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referralsources = ReferralSource::all();
        return view('admin.referralsource.index', compact('referralsources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.referralsource.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        ReferralSource::create($validated);

        return to_route('admin.referralsource.index')->with('message', 'Source Successfully Saved');
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
    public function edit(ReferralSource $referralsource)
    {
        return view('admin.referralsource.edit', compact('referralsource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReferralSource $referralsource): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'max:255|min:3',
        ]);

        $referralsource->update($validated);

        return to_route('admin.referralsource.index')->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReferralSource $referralsource)
    {
        $referralsource->delete();

        return to_route('admin.referralsource.index')->with('message','Source removed');
    }
}
