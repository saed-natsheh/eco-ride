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
}
