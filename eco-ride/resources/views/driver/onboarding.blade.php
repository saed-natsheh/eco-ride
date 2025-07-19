@extends('layout.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header ecoride-btn">
                        <h4 class="mb-0">Inscrivez-vous et complétez votre profil</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/register-onboarding') }}" method="POST" class="row g-3">
                            @csrf

                            <h5>Informations sur le compte</h5>

                            <div class="col-md-4">
                                <label for="name">Nom et prénom</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>


                            <!-- Vehicle Info Section -->
                            <div class="vehicle-section">
                                <h5 class="mt-4">Informations sur le véhicule</h5>
                                <div class="col-md-4">
                                    <label>plaque d'immatriculation</label>
                                    <input type="text" name="license_plate" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Marque</label>
                                    <input type="text" name="brand" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Modèle</label>
                                    <input type="text" name="model" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Couleur</label>
                                    <input type="text" name="color" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Type d'énergie</label>
                                    <select name="energy_type" class="form-select">
                                        <option value="electric">Électrique</option>
                                        <option value="fuel">Carburant</option>
                                        <option value="hybrid">Hybride</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Capacité</label>
                                    <input type="number" name="capacity" class="form-control" min="1">
                                </div>

                                <h5 class="mt-4">Préférences du conducteur</h5>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="smoking" id="smoking">
                                        <label class="form-check-label" for="smoking">Autoriser de fumer</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="pets" id="pets">
                                        <label class="form-check-label" for="pets">Animaux autorisés</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Autres préférences</label>
                                    <textarea name="custom" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-success">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const vehicleSection = document.querySelector('.vehicle-section');
        roleSelect.addEventListener('change', () => {
            if (roleSelect.value === 'driver' || roleSelect.value === 'both') {
                vehicleSection.classList.remove('d-none');
            } else {
                vehicleSection.classList.add('d-none');
            }
        });
    </script>
@endsection