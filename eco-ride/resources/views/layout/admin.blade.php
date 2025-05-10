<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panneau de contrôle') - EcoRide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            height: 100vh;
            background: #2d8a4c;
            color: white;
            position: fixed;
            width: 240px;
            padding-top: 1rem;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #2d8a4c;
            display: block;
        }

        .content {
            margin-left: 240px;
            padding: 2rem;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column position-fixed">
        <div class="text-center mb-4">
            <h4>EcoRide Admin</h4>
        </div>
        <nav class="nav flex-column px-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link py-2">Panneau de contrôle</a>
            <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
                @csrf
                <button class="btn btn-outline-light w-100">Déconnexion</button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Panneau de contrôle</span>
                <div class="d-flex">
                    <span class="me-3">Bienvenue, {{ Auth::user()->name }}</span>
                </div>
            </div>
        </nav>

        <div>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>