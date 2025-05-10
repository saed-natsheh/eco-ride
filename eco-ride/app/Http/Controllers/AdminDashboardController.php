<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $employees = User::where('role', 'employee')->get();

        return view('admin.dashboard', compact('users', 'employees'));
    }

    public function createEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employee'
        ]);

        return back()->with('success', 'Compte employé créé.');
    }

    public function Suspend($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'Vous ne pouvez pas suspendre un autre administrateur.');
        }

        $user->suspended = !$user->suspended;
        $user->save();

        return back()->with('success', $user->suspended
            ? "L'utilisateur a été suspendu."
            : "L'utilisateur a été réactivé.");
    }
}
