<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eco Rides</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5fdf7;
        }

        header,
        footer {
            background-color: #e2f3e9;
        }

        .ecoride-color {
            color: #2d8a4c;
        }
    </style>
    @yield('css')
</head>

<body>

    <header class="p-4 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="ecoride-color">EcoRide</h1>
            <nav>
                <a href="{{ url('/') }}" class="mx-2">page d'accueil</a>
                <a href="{{ url('/carpool') }}" class="mx-2">covoiturages</a>
                <a href="{{ url('/login') }}" class="mx-2">Connexion</a>
                <a class="mx-2">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>


    @yield('script')

    <footer class="text-center p-4 mt-auto"></footer>
</body>

</html>