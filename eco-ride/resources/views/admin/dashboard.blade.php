@extends('layout.admin')

@section('title', 'Panneau de contrôle')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Panneau de contrôle admin</h2>

        <hr>
        <div class="mb-4">
            <h4>Créer un compte employé</h4>
            <form action="{{ url('/admin/create-employee') }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-md-3"><input name="name" class="form-control" placeholder="Nom" required></div>
                    <div class="col-md-4"><input name="email" type="email" class="form-control" placeholder="Email"
                            required></div>
                    <div class="col-md-3"><input name="password" type="password" class="form-control" placeholder="Password"
                            required></div>
                    <div class="col-md-2"><button class="btn btn-dark w-100">Créer</button></div>
                </div>
            </form>


            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <hr>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h4>All Users</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->suspended ? 'Suspended' : 'Active' }}</td>
                        <td>
                            <form action="{{ url('/admin/suspend/' . $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-sm {{ $user->suspended ? 'btn-success' : 'btn-danger' }}">
                                    {{ $user->suspended ? 'Annuler la suspension' : 'Suspendre' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection