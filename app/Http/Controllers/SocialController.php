<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresocialRequest;
use App\Http\Requests\UpdatesocialRequest;
use App\Models\social;

class SocialController extends Controller
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
    public function store(StoresocialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(social $social)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesocialRequest $request, social $social)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(social $social)
    {
        //
    }
}
