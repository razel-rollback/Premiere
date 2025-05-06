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
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('student.profile');
        }

        return redirect()->back()->withErrors([
            'invalid' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }

    public function showProfile()
    {
        $role = Auth::guard('student')->user();
        return view('StudentUI.studentui', compact('role'));
    }
}
