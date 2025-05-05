@extends('layout.main')


@section('content')
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="row g-4">

                    <div class="col-md-4 text-center">
                        <img src="{{ asset('assets/img/driver.png') }}" class="rounded-circle mb-3" width="120" height="120"
                            alt="Driver photo">
                        <h4>Saed Alnatsheh</h4>
                        <p class="text-muted">⭐ 5/5</p>

                        <div class="mt-3">
                            <h6 class="text-muted">Préférences</h6>
                            <span class="badge bg-secondary">Animaux acceptés</span>
                            <span class="badge bg-secondary">Fumeur</span>
                            <span class="badge bg-secondary">Musique</span>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="text-success mb-3">orly to caen</h3>
                        <ul class="list-group mb-3">
                            <li class="list-group-item"><strong>Date:</strong> 25:5:2025</li>
                            <li class="list-group-item"><strong>Temps:</strong>10:00 AM → 12:30 PM</li>
                            <li class="list-group-item"><strong>Sièges disponibles:</strong> 3</li>
                            <li class="list-group-item"><strong>Prix:</strong> €12</li>
                            <li class="list-group-item text-success"><strong>Voyage écologique 🌱</strong></li>
                        </ul>
                        <h5>Informations sur le véhicule</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Marque:</strong> BMW</li>
                            <li class="list-group-item"><strong>Modèle:</strong> M2</li>
                            <li class="list-group-item"><strong>Type d'énergie:</strong> essence</li>
                            <li class="list-group-item"><strong>plaque d'immatriculation:</strong> PD-512-WA</li>
                            <li class="list-group-item"><strong>Couleur:</strong> Rouge</li>
                            <li class="list-group-item"><strong>Capacité:</strong> 5 personnes</li>
                        </ul>
                        <a href="#" class="btn ecoride-btn mt-4">Réservez ce voyage</a>
                    </div>
                </div>
                <hr class="my-5">
                <h4>Avis des conducteurs</h4>
                <div class="border rounded p-3 mb-3">
                    <strong>David Axza</strong>
                    <span class="text-muted small"> – 14/5/2025</span>
                    <p class="mb-1">⭐ 5/5</p>
                    <p>Conducteur parfait</p>
                </div>

            </div>
        </div>
    </div>
@endsection
