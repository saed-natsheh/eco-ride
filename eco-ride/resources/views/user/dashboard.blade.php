@extends('layout.user')

@section('title', 'User Dashboard')

@section('content')
    <h2 class="mb-4">Your Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <h5>Your Info:</h5>
        <ul>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Credits:</strong> {{ $user->credits }}</li>
            <li><strong>Role:</strong> {{ ucfirst($user->role) }}</li>
        </ul>
    </div>

    <hr>

    <h5>Your Joined Trips:</h5>
    @if($joinedTrips->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Driver</th>
                    <th>Vehicle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($joinedTrips as $trip)
                    <tr>
                        <td>{{ $trip->departure }}</td>
                        <td>{{ $trip->arrival }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->departure_time }} → {{ $trip->arrival_time }}</td>
                        <td>{{ $trip->user->name }}</td>
                        <td>{{ $trip->vehicle->brand }} {{ $trip->vehicle->model }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">You haven’t joined any trips yet.</p>
    @endif
@endsection