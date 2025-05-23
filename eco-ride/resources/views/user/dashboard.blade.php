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
                    <th>Rate</th>
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

                        @if($trip->status === 'completed' && !in_array($trip->id, $feedbackTripIds))
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#feedbackModal{{ $trip->id }}">
                                    Leave Feedback
                                </button>
                                <div class="modal fade" id="feedbackModal{{ $trip->id }}" tabindex="-1"
                                    aria-labelledby="feedbackModalLabel{{ $trip->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ url('/trip/' . $trip->id . '/feedback') }}">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedbackModalLabel{{ $trip->id }}">
                                                        Feedback for {{ $trip->departure }} → {{ $trip->arrival }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="rating" class="form-label">Rating (1–5)</label>
                                                        <select name="rating" class="form-select" required>
                                                            <option value="">-- Select --</option>
                                                            @for ($i = 5; $i >= 1; $i--)
                                                                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment" class="form-label">Comment</label>
                                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Submit Feedback</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        @elseif($trip->status === 'completed')
                            <td><span class="badge bg-success">Feedback Sent</span></td>
                        @else
                            <td><span class="text-muted">In Progress</span></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">You haven’t joined any trips yet.</p>
    @endif
@endsection