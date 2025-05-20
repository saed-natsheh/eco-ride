<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class TripViewController extends Controller
{
    public function show($id)
    {
        $trip = Trip::with(['user', 'vehicle'])->findOrFail($id);
        $joined = Auth::check() ? $trip->participants()->where('user_id', Auth::id())->exists() : false;

        return view('carpool.show', compact('trip', 'joined'));
    }

    public function join(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $user = Auth::user();

        if ($user->credits < $trip->price) {
            return back()->with('error', 'You need more credits to join this trip.');
        }

        if ($trip->available_seats <= 0) {
            return back()->with('error', 'No seats left on this trip.');
        }

        if ($trip->participants()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'You already joined this trip.');
        }

        $trip->participants()->attach($user->id);
        $trip->available_seats -= 1;
        $trip->save();

        $user->credits -= $trip->price;
        $user->save();

        return back()->with('success', 'You have successfully joined the trip!');
    }
}
