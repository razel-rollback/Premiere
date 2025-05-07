<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\StudentAdmission;
use Illuminate\Http\Request;

class StudentAdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch only student admissions with status "Pending"
        $register = Register::where('registerStatus', 'Pending')
            ->orderBy('created_at', 'desc')
            ->get();

        // foreach ($register as $reg) {
        //     dd($reg->student); // This will output the first student's related data
        // }


        return view('StudentAdmission.StudentAdmissionView', compact('register'));
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
