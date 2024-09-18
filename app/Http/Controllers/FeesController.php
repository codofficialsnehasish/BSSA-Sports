<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('members.fees.fees_collection.index');
    }

    public function due_list()
    {
        return view('members.fees.fee_due_list');
    }

    public function collection_history()
    {
        return view('members.fees.fee_collection_history');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.fees.fees_collection.create');
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
