@extends('layout.main')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-5 shadow p-4 rounded ecocard">
            <h2 class="text-success text-center mb-4">Inscrivez-vous à EcoRide</h2>
            <form>
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe (min 8 caractères):</label>
                    <input type="password" id="password" name="password" class="form-control" required minlength="8">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmez le mot de passe:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Inscription</button>
                </div>
            </form>
        </div>
    </div>
@endsection