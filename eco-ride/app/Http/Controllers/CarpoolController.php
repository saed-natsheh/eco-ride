<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class CarpoolController extends Controller
{
    public function index(Request $request)
    {
        $query = Trip::with('user')
            ->where('available_seats', '>', 0);

        // Search
        if ($request->filled('from')) {
            $query->where('departure', 'LIKE', "%{$request->from}%");
        }

        if ($request->filled('to')) {
            $query->where('arrival', 'LIKE', "%{$request->to}%");
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        // Filters
        if ($request->eco == 1) {
            $query->where('is_eco', true);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('max_duration')) {
            // Assume you add duration later
        }

        if ($request->filled('min_rating')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('rating', '>=', $request->min_rating); // or custom logic
            });
        }

        $trips = $query->latest()->get();

        return view('carpool.index', [
            'trips' => $trips,
            'filters' => $request->all()
        ]);
    }
}
