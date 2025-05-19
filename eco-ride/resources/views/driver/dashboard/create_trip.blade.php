@extends('layout.driver')

@section('content')
    <div class="container py-5">
        <h2>Create New Trip</h2>

        <form action="{{ url('/driver/trips') }}" method="POST" class="row g-3 mt-4">
            @csrf

            <div class="col-md-6">
                <label>Departure</label>
                <input type="text" name="departure" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Arrival</label>
                <input type="text" name="arrival" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Departure Time</label>
                <input type="time" name="departure_time" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Arrival Time</label>
                <input type="time" name="arrival_time" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Price (€)</label>
                <input type="number" name="price" class="form-control" min="0" step="0.01" required>
            </div>

            <div class="col-md-8">
                <label>Select Vehicle</label>
                <select name="vehicle_id" class="form-select" required>
                    @foreach($vehicles as $v)
                        <option value="{{ $v->id }}">{{ $v->brand }} {{ $v->model }} ({{ $v->license_plate }})</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-success">Publish Trip</button>
            </div>
        </form>
    </div>
@endsection