<?php

namespace App\Http\Controllers;

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
}
