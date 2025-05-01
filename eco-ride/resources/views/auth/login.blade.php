@extends('layout.main')

@section('content')
    <h2 class="ecoride-color mb-4">Connectez-vous à EcoRide</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="email">Adresse email:</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Se connecter</button>
    </form>
    <a href="{{ url('/register') }}" class="mx-2">créer un compte</a>
@endsection