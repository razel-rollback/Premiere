<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use Illuminate\Http\Request;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Strand.StrandView');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Strand $strand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Strand $strand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Strand $strand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Strand $strand)
    {
        //
    }
}
