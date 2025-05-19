@extends('layout.main')

@section('content')
    <div class="container py-5">
        <h2>Complete Your Profile</h2>

        <form action="{{ url('/register-onboarding') }}" method="POST" class="row g-3 mt-4">
            @csrf

            <h4 class="mt-3">Account Information</h4>

            <div class="col-md-4">
                <label for="name">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required minlength="6">
            </div>

            <div class="col-md-4">
                <label for="role" class="form-label">Select Role</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="">-- Select --</option>
                    <option value="driver">Driver</option>
                    <option value="passenger">Passenger</option>
                    <option value="both">Both</option>
                </select>
            </div>

            <!-- Vehicle Info -->
            <div class="vehicle-section d-none">
                <h4 class="mt-4">Vehicle Information</h4>
                <div class="col-md-4">
                    <label>License Plate</label>
                    <input type="text" name="license_plate" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Model</label>
                    <input type="text" name="model" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Energy Type</label>
                    <select name="energy_type" class="form-select">
                        <option value="electric">Electric</option>
                        <option value="fuel">Fuel</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Capacity</label>
                    <input type="number" name="capacity" class="form-control" min="1">
                </div>

                <!-- Preferences -->
                <h4 class="mt-4">Driver Preferences</h4>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="smoking" id="smoking">
                        <label class="form-check-label" for="smoking">Allow Smoking</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pets" id="pets">
                        <label class="form-check-label" for="pets">Allow Pets</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Other Preferences</label>
                    <textarea name="custom" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-12 mt-3">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const vehicleSection = document.querySelector('.vehicle-section');

        roleSelect.addEventListener('change', () => {
            if (roleSelect.value === 'driver' || roleSelect.value === 'both') {
                vehicleSection.classList.remove('d-none');
            } else {
                vehicleSection.classList.add('d-none');
            }
        });
    </script>
@endsection