<?php

namespace App\Http\Controllers;

use App\Models\EnrolledStudent;
use Illuminate\Http\Request;

class EnrolledStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('StudentAdmission.EnrolledView');
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
