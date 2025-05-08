@extends('layouts.apps')

@section('content')
<!-- User profile page with tabbed interface -->
<section id="profile-section" class="py-5 position-relative overflow-hidden">
    <div class="container">
        <!-- Radial Gradient Overlay -->
        <div class="profile-bg-overlay"></div>

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4 animate__animated animate__fadeIn">
            <ol class="breadcrumb bg-white p-3 rounded shadow-sm">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <!-- Profile Header -->
        <div class="text-center mb-5 animate__animated animate__fadeIn">
            <div class="profile-avatar mx-auto mb-3">
            
                    <img src="#" alt="Profile Picture" class="rounded-circle">
              
            </div>
        <h2 class="text-dark">Welcome, Shahariar</h2>
        </div>

        <!-- Tabbed Interface -->
        <div class="row justify-content-center animate__animated animate__fadeIn animate__delay-1s">
            <div class="col-lg-8">
                <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                            <i class="fas fa-user me-2"></i>Personal Info
                        </button>
                    </li> 
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="update-tab" data-bs-toggle="tab" data-bs-target="#update" type="button" role="tab" aria-controls="update" aria-selected="false">
                            <i class="fas fa-edit me-2"></i>Update Profile
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">
                            <i class="fas fa-lock me-2"></i>Change Password
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="profileTabsContent">
                    <!-- Personal Information Tab -->
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="card shadow-sm">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h4 class="mb-0">Personal Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold"><i class="fas fa-user me-2"></i>Name:</label>
                                        <p>Shahariar</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold"><i class="fas fa-envelope me-2"></i>Email:</label>
                                        <p>shahariar.test@test.com</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold"><i class="fas fa-phone me-2"></i>Phone:</label>
                                        <p>01947116736</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold"><i class="fas fa-map-marker-alt me-2"></i>Address:</label>
                                        <p>Dhanmondi, Dhaka</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Profile Tab -->
                    <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
                        <div class="card shadow-sm">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h4 class="mb-0">Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <form id="update-profile-form" action="$" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label"><i class="fas fa-user me-2"></i>Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label"><i class="fas fa-envelope me-2"></i>Email (Cannot be changed)</label>
                                            <input type="email" class="form-control" id="email" value="" disabled>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label"><i class="fas fa-phone me-2"></i>Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label"><i class="fas fa-map-marker-alt me-2"></i>Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary glow-btn">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password Tab -->
                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <div class="card shadow-sm">
                            <div class="card-header bg-gradient-primary text-white text-center">
                                <h4 class="mb-0">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form id="update-password-form" action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="current_password" class="form-label"><i class="fas fa-lock me-2"></i>Current Password</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="new_password" class="form-label"><i class="fas fa-key me-2"></i>New Password</label>
                                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="new_password_confirmation" class="form-label"><i class="fas fa-key me-2"></i>Confirm New Password</label>
                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary glow-btn">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
    $(document).ready(function () {
        // Initialize Toastr options
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000,
            success: { backgroundColor: '#007bff' },
            error: { backgroundColor: '#dc3545' }
        };

        // Clear invalid feedback on input change
        $('input').on('input', function () {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').text('');
        });

        // Handle Profile Update Form
        $('#update-profile-form').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let submitBtn = form.find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(response.message);
                    }
                    submitBtn.prop('disabled', false);
                },
                error: function (xhr) {
                    submitBtn.prop('disabled', false);
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function (key, value) {
                            $('#' + key).addClass('is-invalid').next('.invalid-feedback').text(value[0]);
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                }
            });
        });

        // Handle Password Update Form
        $('#update-password-form').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let submitBtn = form.find('button[type="submit"]');
            submitBtn.prop('disabled', true);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        form[0].reset();
                        $('input').removeClass('is-invalid').next('.invalid-feedback').text('');
                    } else {
                        toastr.error(response.message);
                    }
                    submitBtn.prop('disabled', false);
                },
                error: function (xhr) {
                    submitBtn.prop('disabled', false);
                    let errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function (key, value) {
                            $('#' + key).addClass('is-invalid').next('.invalid-feedback').text(value[0]);
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
@endpush
@endsection