@extends('layout.main')

@section('content')
    <section id="company">
        <h2 class="ecoride-color mb-4">Bienvenue chez EcoRide</h2>
        <p>EcoRide contribue à réduire l’impact environnemental en favorisant le covoiturage en véhicules électriques.</p>
    </section>

    <section id="search">
        <form class="my-4">
            <div class="row g-2">
                <div class="col-md-4">
                    <input type="text" name="from" class="form-control" placeholder="Ville de départ" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="to" class="form-control" placeholder="Ville d'arrivée" required>
                </div>
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Recherche</button>
        </form>
    </section>

@endsection
