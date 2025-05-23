<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\DB;
class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $joinedTrips = $user->joinedTrips()->with('user', 'vehicle')->get();

        $feedbackTripIds = DB::table('trip_ratings')
            ->where('user_id', $user->id)
            ->pluck('trip_id')
            ->toArray();

        return view('user.dashboard', compact('user', 'joinedTrips', 'feedbackTripIds'));
    }

}
