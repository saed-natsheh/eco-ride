<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Trip;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $joinedTrips = $user->joinedTrips()->with('vehicle', 'user')->latest()->get();

        return view('user.dashboard', compact('user', 'joinedTrips'));
    }
}
