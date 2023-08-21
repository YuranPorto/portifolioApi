<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepersonalInfoRequest;
use App\Http\Requests\UpdatepersonalInfoRequest;
use App\Models\personalInfo;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepersonalInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(personalInfo $personalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepersonalInfoRequest $request, personalInfo $personalInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(personalInfo $personalInfo)
    {
        //
    }
}
