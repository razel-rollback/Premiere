<?php

namespace App\Http\Controllers;

use App\Models\StudentAdmission;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('StudentAdmission.StudentAdmissionView');
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
}
