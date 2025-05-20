<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default role
            'credits' => 20, // US 7: new users receive 20 credits
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Account created successfully!');
    }
}
