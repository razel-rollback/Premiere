<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Register;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Home.register');
    }

    public function guardian()
    {
        return view('Home.register-guardian');
    }

    // public function store(Request $request)
    // {
    //     // Your logic to handle the form submission
    //     // For example, validate and store data:
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:guardians',
    //     ]);

    //     // Save the guardian to the database (example)
    //     Register::create($validatedData);

    //     // Redirect or return response
    //     return redirect()->route('some.route'); // Change as needed
    // }
}
