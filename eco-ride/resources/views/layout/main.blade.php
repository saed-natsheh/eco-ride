<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="eco ride">
    <title>Eco Rides</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5fdf7;
        }

        header,
        footer {
            background-color: #e2f3e9;
        }

        .ecoride-btn {
            background-color: #2d8a4c;
            color: #ffffff;
        }

        .ecoride-color {
            color: #2d8a4c;
        }

        header {
            background: linear-gradient(to right, #e6f4ea, #c6f0d6);
            padding: 1rem 0;
        }

        .ecocard {
            background: linear-gradient(to right, #e6f4ea, #c6f0d6);
        }

        .navbar-brand {
            font-weight: bold;
            color: #2d8a4c !important;
        }
    </style>
    @yield('css')
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">EcoRide</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link mx-2">Page d'accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/carpools') }}" class="nav-link mx-2">Covoiturages</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link mx-2">
                                    Bonjour, {{ auth()->user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link mx-2">Se déconnecter</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/login') }}" class="nav-link mx-2">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/register-onboarding') }}" class="nav-link mx-2">immatriculation du
                                    conducteur</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    @yield('script')

    <footer class="text-center p-4 mt-auto">
        <p>EcoRide 2025</p>
    </footer>
</body>

</html>