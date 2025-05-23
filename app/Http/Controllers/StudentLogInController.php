<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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
        $guard = $request->userType === 'admin' ? 'admin' : 'student';

        if (Auth::guard($guard)->attempt($credentials)) {
            // Verify the user has the correct type
            $user = Auth::guard($guard)->user();
            if ($user->userType !== $request->userType) {
                Auth::guard($guard)->logout();
                return back()->withErrors(['invalid' => 'Invalid credentials for this portal.']);
            }

            return redirect()->intended($guard . '.dashboard');
        }

        return back()->withErrors(['invalid' => 'Invalid credentials.']);
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
    public function payment(Request $request, Payment $payment)
    {
        // dd($payment->paymentID);
        // Validate the request input
        $request->validate([
            'amount' => 'required|numeric|min:1000',  // Ensure amount is a number and >= 1000
        ]);

        // Update payment with the validated amount
        $payment->amountPaid = $request->input('amount');
        $payment->paymentDate = now();  // Set the current date as payment date

        // Save the updated payment
        if ($payment->save()) {
            return redirect()->back()->with('success', 'Payment successful!');
        } else {
            return redirect()->back()->withErrors(['error' => 'Payment failed.']);
        }
    }
}
