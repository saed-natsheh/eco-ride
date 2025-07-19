@extends('layout.main')

@section('title', 'Driver Login')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Connexion du conducteur</h4>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('driver.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label>Mot de passe</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button class="btn btn-success w-100">Se connecter</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ url('/register-onboarding') }}">Vous n'avez pas de compte ? Inscrivez-vous comme
                                chauffeur.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection