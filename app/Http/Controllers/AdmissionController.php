<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('camp.admission.index');
    }

    public function fees_collection()
    {
        return view('camp.fees.index');
    }

    public function create_fees_collection()
    {
        return view('camp.fees.create');
    }

    public function fees_collection_history()
    {
        return view('camp.fees.fee_collection_history');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camp.admission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
