<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'User Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f9f9f9;
        }

        .sidebar {
            background: #2d8a4c;
            color: white;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 1rem;
        }

        .sidebar a:hover {
            background: #2d8a4c;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4 class="mb-4">EcoRide</h4>
            <p>Hello, {{ Auth::user()->name }}</p>
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
            <a href="{{ url('/carpools') }}">Join New Trip</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button class="btn btn-light w-100">Logout</button>
            </form>
        </div>

        <!-- Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>