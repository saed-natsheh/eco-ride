<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\DriverPreference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function registerWithOnboarding()
    {
        return view('driver.onboarding');
    }

    public function storeWithOnboarding(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:driver,passenger,both',
            'license_plate' => 'required_if:role,driver,both|unique:vehicles,license_plate',
            'brand' => 'required_if:role,driver,both',
            'model' => 'required_if:role,driver,both',
            'color' => 'required_if:role,driver,both',
            'energy_type' => 'required_if:role,driver,both',
            'capacity' => 'required_if:role,driver,both|integer|min:1',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'credits' => 20,
        ]);

        // Optional login after register
        Auth::login($user);

        if (in_array($request->role, ['driver', 'both'])) {
            $vehicle = new Vehicle($request->only([
                'license_plate',
                'brand',
                'model',
                'color',
                'energy_type',
                'capacity'
            ]));
            $vehicle->user_id = $user->id;
            $vehicle->save();

            $prefs = new DriverPreference([
                'smoking' => $request->boolean('smoking'),
                'pets' => $request->boolean('pets'),
                'custom' => $request->input('custom'),
            ]);
            $prefs->user_id = $user->id;
            $prefs->save();
        }

        return redirect('/dashboard')->with('success', 'Account created successfully!');
    }


}
