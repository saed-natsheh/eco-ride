@extends('layout.main')

@section('content')
    <h2 class="ecoride-color mb-4">Inscrivez-vous à EcoRide</h2>

    <form>

        <div class="mb-3">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email">Adresse email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Mot de passe (min 8 caractères):</label>
            <input type="password" name="password" class="form-control" required minlength="8">
        </div>
        <div class="mb-3">
            <label for="password_confirmation">Confirmez le mot de passe:</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">inscription</button>
    </form>
@endsection