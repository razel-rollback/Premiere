<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogInController extends Controller
{

    // Show the admin login form
    public function login()
    {
        return view('Admin.adminlogin');
    }

    // Handle the authentication request
    // AdminLogInController.php
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        $credentials['userType'] = 'admin';

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('route.dashboard'));
        }

        return back()->withErrors(['invalid' => 'Invalid admin credentials.']);
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        // Log the admin out
        Auth::guard('admin')->logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Redirect to the login page
        return redirect()->route('home.index');
    }
}
