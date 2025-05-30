@extends('layouts.apps')
@section('content')
    <div class="main-container">
        <!-- Information Side -->
        <div class="info-side animate__animated animate__fadeInLeft">
            <div class="info-content">
                <h1 class="animate__animated animate__fadeInDown">Welcome to <span class="text-warning">ShopEase</span>
                </h1>
                <p class="lead animate__animated animate__fadeIn animate__delay-1s">Where style meets comfort</p>

                <div class="mt-5">
                    <div class="feature-card animate__animated animate__fadeInLeft animate__delay-1s">
                        <i class="fas fa-tshirt"></i>
                        <h4>Trending Collections</h4>
                        <p>Discover the latest fashion trends curated by our style experts. New arrivals every week!</p>
                    </div>

                    <div class="feature-card animate__animated animate__fadeInLeft animate__delay-2s">
                        <i class="fas fa-percentage"></i>
                        <h4>Exclusive Members</h4>
                        <p>Join our loyalty program for early access to sales, special discounts, and VIP treatment.</p>
                    </div>

                    <div class="feature-card animate__animated animate__fadeInLeft animate__delay-3s">
                        <i class="fas fa-exchange-alt"></i>
                        <h4>Easy Returns</h4>
                        <p>Not happy with your purchase? We offer 30-day hassle-free returns on all items.</p>
                    </div>

                    <div class="feature-card animate__animated animate__fadeInLeft animate__delay-4s">
                        <i class="fas fa-ruler-combined"></i>
                        <h4>Perfect Fit Guarantee</h4>
                        <p>Use our virtual fitting room and size recommendation tool to find your perfect fit.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Side -->
        <div class="form-side">
            <div class="login-container">
                <div class="logo animate__animated animate__fadeIn">
                    <i class="fas fa-shopping-bag"></i>ShopNow
                </div>

                <h2 class="animate__animated animate__fadeIn animate__delay-1s">Login to your account</h2>
                <p class="text-muted mb-4 animate__animated animate__fadeIn animate__delay-1s">Enter your credentials to
                    access your dashboard</p>

                <form id="loginForm" action="{{ url('login') }}" method="POST" class="animate__animated animate__fadeIn animate__delay-2s">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email/Phone</label>
                        <input type="email" class="form-control" id="email" name="identifier" value="{{ old('identifier') }}" placeholder="Enter your email"
                            required>
                        <div class="validation-message text-danger" id="emailValidation"></div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"
                            required minlength="6">
                        <i class="fas fa-eye-slash password-toggle" id="togglePassword"></i>
                        <div class="validation-message text-danger" id="passwordValidation"></div>
                    </div>

                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login text-white mb-3" id="loginButton" disabled>
                        <span id="loginText">Login</span>
                        <span class="spinner-border spinner-border-sm d-none" id="loadingIndicator"></span>
                    </button>

                    <div class="text-center mt-3">
                        Don't have an account? <a href="{{ route('register') }}" class="text-primary fw-bold"
                            id="registerLink">Sign
                            up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
   @push('scripts')
     <script>
        $(document).ready(function() {
            // Initialize elements with animations
            $('.animate__animated').each(function(index) {
                $(this).css('animation-delay', $(this).css('animation-delay') || (index * 0.2 + 0.2) + 's');
            });

            // Toggle password visibility
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                const icon = $(this);

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }

                // Add animation
                icon.addClass('animate__animated animate__bounce');
                setTimeout(() => icon.removeClass('animate__animated animate__bounce'), 1000);
            });

            // Form validation
            function validateForm() {
                const email = $('#email').val();
                const password = $('#password').val();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                // Validate email
                if (!emailRegex.test(email)) {
                    $('#emailValidation').text('Please enter a valid email address');
                } else {
                    $('#emailValidation').text('');
                }

                // Validate password
                if (password.length < 8) {
                    $('#passwordValidation').text('Password must be at least 8 characters');
                } else {
                    $('#passwordValidation').text('');
                }

                // Enable/disable submit button
                if (emailRegex.test(email) && password.length >= 8) {
                    $('#loginButton').prop('disabled', false);
                } else {
                    $('#loginButton').prop('disabled', true);
                }
            }

            // Real-time validation
            $('#email, #password').on('input', function() {
                validateForm();

                // Add pulse animation when valid
                if ($(this).val().length > 0 && !$(this).next('.validation-message').text()) {
                    $(this).addClass('animate__animated animate__pulse');
                    setTimeout(() => $(this).removeClass('animate__animated animate__pulse'), 1000);
                }
            });

            // Forgot password modal
            const forgotPasswordModal = new bootstrap.Modal('#forgotPasswordModal');
            $('#forgotPassword').click(function(e) {
                e.preventDefault();
                forgotPasswordModal.show();

                // Add animation
                $(this).addClass('animate__animated animate__rubberBand');
                setTimeout(() => $(this).removeClass('animate__animated animate__rubberBand'), 1000);
            });


            // Register link
            $('#registerLink').click(function(e) {
                e.preventDefault();
                showToast('Redirecting to registration page...', 'info');

                // Add animation
                $(this).addClass('animate__animated animate__rubberBand');

                // Wait for animation to finish, then redirect
                setTimeout(() => {
                    $(this).removeClass('animate__animated animate__rubberBand');
                    window.location.href = $(this).attr('href');
                }, 1000);
            });



            // Form submission
            $('#loginForm').submit(function(e) {
                e.preventDefault();

                // Show loading state
                $('#loginText').hide();
                $('#loadingIndicator').removeClass('d-none');
                $('#loginButton').prop('disabled', true);

                // Simulate AJAX login
                setTimeout(() => {
                    // Hide loading state
                    $('#loginText').show();
                    $('#loadingIndicator').addClass('d-none');

                    // Show success message
                    showToast('Login successful! Redirecting...', 'success');

                    // Add celebration animation
                    $('#loginButton').addClass('animate__animated animate__heartBeat');
                    setTimeout(() => $('#loginButton').removeClass(
                        'animate__animated animate__heartBeat'), 1000);

                    // In a real app, redirect after successful login
                    // setTimeout(() => window.location.href = '/dashboard', 1500);
                }, 2000);
            });

            // Toast notification function
            function showToast(message, type) {
                const toast = $(`
                    <div class="toast align-items-center text-white bg-${type} border-0 position-fixed bottom-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="${getToastIcon(type)} me-2"></i>
                                ${message}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                `).addClass('animate__animated animate__bounceInUp');

                $('body').append(toast);
                const toastInstance = new bootstrap.Toast(toast[0]);
                toastInstance.show();

                setTimeout(() => {
                    toast.addClass('animate__animated animate__fadeOut');
                    setTimeout(() => toast.remove(), 500);
                }, 3000);
            }

            function getToastIcon(type) {
                switch (type) {
                    case 'success':
                        return 'fas fa-check-circle';
                    case 'danger':
                        return 'fas fa-exclamation-circle';
                    case 'info':
                        return 'fas fa-info-circle';
                    default:
                        return 'fas fa-bell';
                }
            }
        });
    </script>
   @endpush
</body>

</html>
