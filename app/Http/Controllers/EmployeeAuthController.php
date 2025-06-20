<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.employee-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $employee = Employee::where('login', $credentials['login'])->first();

        if ($employee && Hash::check($credentials['password'], $employee->password)) {
            Session::put('employee_id', $employee->id);
            return redirect()->route('home')->with('success', 'Logged in!');
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Session::forget('employee_id');
        return redirect()->route('employee.login')->with('success', 'Logged out!');
    }
}
