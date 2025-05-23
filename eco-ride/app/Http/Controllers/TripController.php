<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        return view('carpool.index');
    }

    public function show()
    {
        return view('carpool.show');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $trips = $user->trips()->with('vehicle')->latest()->get();
        return view('driver.dashboard.index', compact('trips'));
    }

    public function create()
    {
        $vehicles = Auth::user()->vehicles;
        return view('driver.dashboard.create_trip', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departure' => 'required',
            'arrival' => 'required',
            'date' => 'required|date',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|numeric|min:0',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $vehicle = Auth::user()->vehicles()->findOrFail($request->vehicle_id);

        Trip::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $vehicle->id,
            'departure' => $request->departure,
            'arrival' => $request->arrival,
            'date' => $request->date,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'price' => $request->price,
            'available_seats' => $vehicle->capacity,
            'is_eco' => $vehicle->energy_type === 'electric',
        ]);

        return redirect('driver/dashboard')->with('success', 'Trip created successfully!');
    }


    public function startTrip($id)
    {
        $trip = Trip::where('user_id', auth()->id())->findOrFail($id);

        if ($trip->status !== 'pending') {
            return back()->with('error', 'Trip already started or completed.');
        }

        $trip->status = 'started';
        $trip->save();

        return back()->with('success', 'Trip started.');
    }

    public function endTrip($id)
    {
        $trip = Trip::where('user_id', auth()->id())->findOrFail($id);

        if ($trip->status !== 'started') {
            return back()->with('error', 'Trip must be started before it can be completed.');
        }

        $trip->status = 'completed';
        $trip->save();

        return back()->with('success', 'Trip marked as completed. Waiting for participant feedback.');
    }
}
