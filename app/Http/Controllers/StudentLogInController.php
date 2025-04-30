<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLogInController extends Controller
{
    public function login()
    {
        return view('StudentUI.studentlogin');
    }
}
