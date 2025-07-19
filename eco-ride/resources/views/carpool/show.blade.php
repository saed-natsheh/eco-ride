@extends('layout.main')


@section('content')
    <div class="container py-5">
        <h2>{{ $trip->departure }} → {{ $trip->arrival }}</h2>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div> @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div> @endif

        <div class="row g-4 mt-3">
            <div class="col-md-4">
                <h5>Informations sur le conducteur</h5>
                <p><strong>{{ $trip->user->name }}</strong></p>
                <p>Email: {{ $trip->user->email }}</p>
                <p>Notation: ⭐ 4.5</p>
            </div>

            <div class="col-md-4">
                <h5>Informations sur le voyage</h5>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Date:</strong> {{ $trip->date }}</li>
                    <li class="list-group-item"><strong>Temps:</strong> {{ $trip->departure_time }} →
                        {{ $trip->arrival_time }}
                    </li>
                    <li class="list-group-item"><strong>Sièges restants:</strong> {{ $trip->available_seats }}</li>
                    <li class="list-group-item"><strong>Prix:</strong> €{{ $trip->price }}</li>
                    <li class="list-group-item">
                        <strong>Eco:</strong> {!! $trip->is_eco ? '<span class="badge bg-success">Yes</span>' : 'No' !!}
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>Informations sur le véhicule</h5>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Modèle:</strong> {{ $trip->vehicle->brand }}
                        {{ $trip->vehicle->model }}
                    </li>
                    <li class="list-group-item"><strong>Plaque:</strong> {{ $trip->vehicle->license_plate }}</li>
                    <li class="list-group-item"><strong>Couleur:</strong> {{ $trip->vehicle->color }}</li>
                    <li class="list-group-item"><strong>Énergie:</strong> {{ ucfirst($trip->vehicle->energy_type) }}</li>
                    <li class="list-group-item"><strong>Capacité:</strong> {{ $trip->vehicle->capacity }}</li>
                </ul>
            </div>
        </div>

        <hr class="my-4">

        @auth
            @if($joined)
                <div class="alert alert-info">Vous avez déjà rejoint ce voyage.</div>
            @else
                <form action="{{ route('trip.join', $trip->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Rejoignez ce voyage ({{ $trip->price }} Crédit)</button>
                </form>
            @endif
        @else
            <div class="alert alert-warning">Please <a href="{{ route('login') }}">se connecter</a> pour participer à ce voyage.</div>
        @endauth
    </div>
    
@endsection
