@extends('layout.main')

@section('content')
    <section id="company">
        <div id="ecoridecarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/banner.png" height="500px" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="ecoride-color">Roulons ensemble, respirons mieux</h5>

                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <section>
        <div class="container">
            <div class="row pb-5 justify-content-md-center">
                <div class="col-sm mb-5">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/card1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ville de départ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-5">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/card2.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ville d'arrivée</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-5">
                    <div class="card" style="width: 18rem;">
                        <img src="assets/img/card3.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Date de départ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

    <script>
        var myCarousel = document.querySelector('#ecoridecarousel');
        var carousel = new bootstrap.Carousel(myCarousel);
    </script>

@endsection