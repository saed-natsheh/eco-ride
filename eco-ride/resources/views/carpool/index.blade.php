@extends('layout.main')


@section('content')
    <section id="search">
        <div class="container py-5">
            <h2 class="mb-4 text-center ecoride-color">trouver du covoiturage</h2>
            <form class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <label for="startCity" class="form-label ">Ville de départ</label>
                    <input type="text" class="form-control" id="startCity" placeholder="Ex: Paris">
                </div>
                <div class="col-md-4">
                    <label for="endCity" class="form-label">Ville d'arrivée</label>
                    <input type="text" class="form-control" id="endCity" placeholder="Ex: Lyon">
                </div>
                <div class="col-md-4">
                    <label for="travelDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="travelDate">
                </div>
                <div class="col-12 text-center pt-3">
                    <button type="submit" class="btn btn-success px-4">Rechercher</button>
                </div>
            </form>
        </div>
    </section>
@endsection