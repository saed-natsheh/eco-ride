@extends('layout.main')


@section('content')
    <section id="search">
        <div class="container py-5 card mb-4 mt-4">
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

    <div class="container-fluid py-5">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Filters</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET">

                            <div class="mb-3">
                                <label class="form-label">Voyage éco (voiture électrique)</label>
                                <select name="eco" class="form-select">
                                    <option value="">N'importe lequel</option>
                                    <option value="1">oui</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Prix ​​maximum (€)</label>
                                <input type="number" name="max_price" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Durée maximale du voyage (minute)</label>
                                <input type="number" name="max_duration" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Note minimale du conducteur</label>
                                <select name="min_rating" class="form-select">
                                    <option value="">N'importe lequel</option>
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}">{{ $i }}+
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div class="d-grid">
                                <button class="btn ecoride-btn" type="submit">Appliquer des filtres</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <h2 class="mb-4 text-success">Résultats de la recherche</h2>
                <div class="row row-cols-1 g-4">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/driver.png') }}" class="rounded-circle me-3" width="60"
                                        height="60">
                                    <div>
                                        <h6>Saed Alnatsheh</h6>
                                        <small class="text-muted">⭐ 5 notes</small><br>
                                        <small>2 siège restant</small>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="text-success">€12</h6>
                                    <small class="mb-0">10:00 AM → 12:30 PM</small><br>
                                    <small>orly to caen</small><br>
                                    <small class="badge bg-success mt-1">Écologique</small>
                                </div>
                                <a href="#" class="btn btn-outline-primary ecoride-btn">Détails</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/img/driver.png') }}" class="rounded-circle me-3" width="60"
                                        height="60">
                                    <div>
                                        <h6>Assad Alnatsheh</h6>
                                        <small class="text-muted">⭐ 3 notes</small><br>
                                        <small>1 siège restant</small>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="text-success">€15</h6>
                                    <small class="mb-0">10:00 AM → 12:15 PM</small><br>
                                    <small>orly to caen</small><br>
                                </div>
                                <a href="#" class="btn btn-outline-primary ecoride-btn">Détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection