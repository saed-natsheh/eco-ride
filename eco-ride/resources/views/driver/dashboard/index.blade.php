@extends('layout.driver')

@section('content')
    <div class="container py-5">
        <h2>Driver Dashboard</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ url('driver/trips/create') }}" class="btn btn-primary my-3">+ Add New Trip</a>

        <h4 class="mb-3">My Trips</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Seats</th>
                    <th>Eco</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trips as $trip)
                    <tr>
                        <td>{{ $trip->departure }}</td>
                        <td>{{ $trip->arrival }}</td>
                        <td>{{ $trip->date }}</td>
                        <td>{{ $trip->departure_time }} → {{ $trip->arrival_time }}</td>
                        <td>€{{ $trip->price }}</td>
                        <td>{{ $trip->available_seats }}</td>
                        <td>{{ $trip->is_eco ? 'Yes' : 'No' }}</td>
                        <td>
                            {{ ucfirst($trip->status) }}
                            @if($trip->status === 'pending')
                                <form method="POST" action="{{ route('trips.start', $trip->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-warning mt-1">Start Trip</button>
                                </form>
                            @elseif($trip->status === 'started')
                                <form method="POST" action="{{ route('trips.end', $trip->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-danger mt-1">End Trip</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No trips created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection