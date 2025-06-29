<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.employee-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:employee,owner',
        ]);

        $credentials = $request->only('email', 'password');
        $selectedRole = $request->input('role');

        if (Auth::guard('employee')->attempt($credentials)) {
            $user = Auth::guard('employee')->user();
            if ($user->role === $selectedRole) {
                if ($selectedRole === 'employee') {
                    return redirect()->route('home'); // Redirect employees to the home page
                } else {
                    return redirect()->route('owner.dashboard'); // Redirect owners to their dashboard
                }
            }
            Auth::guard('employee')->logout();
            return back()->withErrors(['email' => 'The selected role does not match your account.']);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect('/employee/login');
    }

    public function showHome()
    {
        return view('home'); // Returns the home view (Pharmacy Management System page)
    }
}