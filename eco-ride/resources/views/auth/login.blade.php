@extends('layout.main')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-4 shadow p-4 rounded ecocard">
            <h2 class="text-center mb-4">Connexion</h2>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@ecoride.fr"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">Se connecter</button>
                </div>
            </form>
            <div class="text-center pt-2">
                <a href="{{ url('/register') }}" class="mx-2">créer un compte</a>
            </div>
        </div>

    </div>

@endsection
