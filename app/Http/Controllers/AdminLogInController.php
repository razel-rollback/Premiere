<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogInController extends Controller
{
    public function login()
    {
        return view('Admin.adminlogin');
    }
}
