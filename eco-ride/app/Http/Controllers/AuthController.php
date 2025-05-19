<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showDriverLogin()
    {
        return view('driver.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/driver/login')->with('success', 'You have been logged out.');
    }

    public function driverLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (in_array($user->role, ['driver', 'both'])) {
                return redirect('/driver/dashboard');
            }

            Auth::logout();
            return back()->with('error', 'Access restricted to drivers only.');
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
