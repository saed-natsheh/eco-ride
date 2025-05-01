@extends('layout.main')


@section('content')
    <h2 class="ecoride-color mb-4">trouver du covoiturage</h2>

    <form class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="from" class="form-control" placeholder="Ville de départ" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="to" class="form-control" placeholder="Ville d'arrivée" required>
        </div>
        <div class="col-md-4">
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Recherche</button>
        </div>
    </form>
@endsection
