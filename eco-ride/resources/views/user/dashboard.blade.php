@extends('layout.user')

@section('title', 'User Dashboard')

@section('content')
    <h2 class="mb-4">Your Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-4">
        <h5>Vos informations:</h5>
        <ul>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Crédits:</strong> {{ $user->credits }}</li>
            <li><strong>Rôle:</strong> {{ ucfirst($user->role) }}</li>
        </ul>
    </div>

    <hr>

    <h5>Vos voyages joints :</h5>
    @if($joinedTrips->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Depuis</th>
                    <th>À</th>
                    <th>Date</th>
                    <th>Temps</th>
                    <th>Conductrice</th>
                    <th>Véhicule</th>
                    <th>Taux</th>
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
                                    Laisser les commentaires
                                </button>
                                <div class="modal fade" id="feedbackModal{{ $trip->id }}" tabindex="-1"
                                    aria-labelledby="feedbackModalLabel{{ $trip->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ url('/trip/' . $trip->id . '/feedback') }}">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedbackModalLabel{{ $trip->id }}">
                                                        Commentaires pour {{ $trip->departure }} → {{ $trip->arrival }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="rating" class="form-label">Notation (1–5)</label>
                                                        <select name="rating" class="form-select" required>
                                                            <option value="">-- Sélectionner --</option>
                                                            @for ($i = 5; $i >= 1; $i--)
                                                                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="comment" class="form-label">Commentaire</label>
                                                        <textarea name="comment" class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Soumettre des commentaires</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        @elseif($trip->status === 'completed')
                            <td><span class="badge bg-success">Commentaires envoyés</span></td>
                        @else
                            <td><span class="text-muted">En cours</span></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">Vous n’avez pas encore rejoint de voyages.</p>
    @endif
@endsection