@extends('layout.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header ecoride-btn">
                        <h4 class="mb-0">Register & Complete Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/register-onboarding') }}" method="POST" class="row g-3">
                            @csrf

                            <h5>Account Information</h5>

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


                            <!-- Vehicle Info Section -->
                            <div class="vehicle-section">
                                <h5 class="mt-4">Vehicle Information</h5>
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

                                <h5 class="mt-4">Driver Preferences</h5>
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
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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