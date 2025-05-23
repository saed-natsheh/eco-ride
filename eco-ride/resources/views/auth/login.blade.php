@extends('layout.main')

@section('content')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header ecoride-btn">
                        <h4>Connexion</h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="/login">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>


                            <button class="btn ecoride-btn w-100">Se connecter</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ url('/register') }}" class="mx-2">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
