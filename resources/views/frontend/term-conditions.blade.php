@extends('layouts.apps')
@section('content')
<!-- Terms and Conditions page with enhanced design -->
<section id="terms-section" class="py-5 position-relative overflow-hidden">
    <div class="container">
        <!-- Radial Gradient Overlay -->
        <div class="profile-bg-overlay"></div>

        <!-- Hero Section -->
        <div class="text-center mb-5 animate__animated animate__fadeIn">
            <h2 class="product-title mb-3">Terms and Conditions</h2>
            <p class="product-details lead text-muted">
                Understand the rules and guidelines for using {{ config('app.name', 'MyShop') }}'s services.
                Last updated: {{ date('F d, Y') }}
            </p>
            <a href="#terms-content" class="btn btn-primary glow-btn btn-lg mt-3">Explore Terms</a>
        </div>

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="mb-4 animate__animated animate__fadeIn">
            <ol class="breadcrumb bg-transparent p-0 justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="card shadow-sm animate__animated animate__fadeInUp" id="terms-content">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h4 class="card-title mb-0 text-white">Our Terms and Conditions</h4>
                    </div>
                    <div class="card-body">
                        <!-- Accordion for Terms -->
                        <div class="accordion" id="termsAccordion">
                            <!-- Introduction -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1. Introduction
                                    </button>
                                </h5>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        Welcome to {{ config('app.name', 'MyShop') }}. These Terms and Conditions govern your use of our website and services. By accessing or using our website, you agree to be bound by these terms. If you do not agree, please do not use our website.
                                    </div>
                                </div>
                            </div>

                            <!-- Acceptance of Terms -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. Acceptance of Terms
                                    </button>
                                </h5>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        By placing an order, creating an account, or otherwise interacting with our website, you confirm that you are at least 18 years old or have parental consent, and you agree to comply with these Terms and Conditions.
                                    </div>
                                </div>
                            </div>

                            <!-- Use of Website -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        3. Use of Website
                                    </button>
                                </h5>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        <ul>
                                            <li>You may use our website for lawful purposes only.</li>
                                            <li>You must not use our website to engage in fraudulent, abusive, or illegal activities.</li>
                                            <li>We reserve the right to suspend or terminate your access if you violate these terms.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Purchasing and Orders -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        4. Purchasing and Orders
                                    </button>
                                </h5>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        All orders are subject to availability and confirmation. We reserve the right to refuse or cancel any order for reasons including but not limited to product availability, errors in pricing, or suspected fraud.
                                        <ul>
                                            <li>Prices are subject to change without notice.</li>
                                            <li>Payment must be made in full at the time of purchase.</li>
                                            <li>Once an order is placed, you will receive a confirmation email with details.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping and Delivery -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        5. Shipping and Delivery
                                    </button>
                                </h5>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        We aim to deliver your order within the estimated timeframe provided at checkout. However, delays may occur due to unforeseen circumstances. Shipping costs are calculated based on your location and selected delivery method.
                                    </div>
                                </div>
                            </div>

                            <!-- Returns and Refunds -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        6. Returns and Refunds
                                    </button>
                                </h5>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        If you are not satisfied with your purchase, you may return it within 30 days of receipt, provided the item is unused and in its original condition. Refunds will be processed within 7-10 business days after we receive the returned item.
                                        <ul>
                                            <li>Return shipping costs are the responsibility of the customer unless the item is defective.</li>
                                            <li>Custom or personalized items are non-returnable.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Intellectual Property -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        7. Intellectual Property
                                    </button>
                                </h5>
                                <div id="collapseSeven" under the accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        All content on our website, including text, images, logos, and designs, is the property of {{ config('app.name', 'MyShop') }} or its licensors. You may not reproduce, distribute, or use any content without our prior written consent.
                                    </div>
                                </div>
                            </div>

                            <!-- Limitation of Liability -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        8. Limitation of Liability
                                    </button>
                                </h5>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        To the fullest extent permitted by law, {{ config('app.name', 'MyShop') }} shall not be liable for any indirect, incidental, or consequential damages arising from your use of our website or services.
                                    </div>
                                </div>
                            </div>

                            <!-- Changes to Terms -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingNine">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        9. Changes to Terms
                                    </button>
                                </h5>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        We may update these Terms and Conditions from time to time. Any changes will be posted on this page, and the updated terms will take effect immediately upon posting. Your continued use of the website constitutes acceptance of the revised terms.
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="headingTen">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        10. Contact Information
                                    </button>
                                </h5>
                                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#termsAccordion">
                                    <div class="accordion-body product-details">
                                        If you have any questions about these Terms and Conditions, please contact us at:
                                        <ul>
                                            <li><i class="fas fa-envelope me-2"></i>support@{{ config('app.name', 'myshop') }}.com</li>
                                            <li><i class="fas fa-phone me-2"></i>+123-456-7890</li>
                                            <li><i class="fas fa-map-marker-alt me-2"></i>1234 Street Name, City, Country</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-outline-secondary btn-sm me-2" target="_blank">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </a>
                        <a href="{{ url('home') }}" class="btn btn-primary glow-btn btn-lg">Back to Home</a>
                    </div>
                </div>
            </div>

            <!-- Sticky Sidebar -->
            <div class="col-lg-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-gradient-primary text-white">
                        <h5 class="card-title mb-0 text-white">Quick Navigation</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="#collapseOne" class="text-decoration-none text-primary">1. Introduction</a></li>
                            <li><a href="#collapseTwo" class="text-decoration-none text-primary">2. Acceptance of Terms</a></li>
                            <li><a href="#collapseThree" class="text-decoration-none text-primary">3. Use of Website</a></li>
                            <li><a href="#collapseFour" class="text-decoration-none text-primary">4. Purchasing and Orders</a></li>
                            <li><a href="#collapseFive" class="text-decoration-none text-primary">5. Shipping and Delivery</a></li>
                            <li><a href="#collapseSix" class="text-decoration-none text-primary">6. Returns and Refunds</a></li>
                            <li><a href="#collapseSeven" class="text-decoration-none text-primary">7. Intellectual Property</a></li>
                            <li><a href="#collapseEight" class="text-decoration-none text-primary">8. Limitation of Liability</a></li>
                            <li><a href="#collapseNine" class="text-decoration-none text-primary">9. Changes to Terms</a></li>
                            <li><a href="#collapseTen" class="text-decoration-none text-primary">10. Contact Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    #terms-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        min-height: 100vh;
    }

    #terms-section .product-title {
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: -0.02em;
        color: #343a40;
    }

    .product-details {
        font-size: 1.1rem;
        color: #495057;
        line-height: 1.6;
    }

    .product-details ul {
        list-style: none;
        padding-left: 0;
    }

    .product-details li {
        margin-bottom: 0.75rem;
        position: relative;
        padding-left: 25px;
    }

    .product-details li::before {
        content: '\f058'; /* Font Awesome circle-check icon */
        font-family: 'FontAwesome';
        position: absolute;
        left: 0;
        color: #007bff;
    }

    .accordion-button {
        font-size: 1.25rem;
        font-weight: 600;
        color: #343a40;
        background-color: #f8f9fa;
        border: none;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) {
        background-color: #007bff;
        color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: #007bff;
    }

    .accordion-item {
        border: none;
        border-radius: 8px;
        margin-bottom: 1rem;
        background-color: #ffffff;
    }

    .accordion-body {
        font-size: 1.1rem;
        color: #495057;
        padding: 1.5rem;
    }

    .sticky-top {
        transition: all 0.3s ease;
    }

    .card-footer .btn {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-footer .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
    }

    @media (max-width: 768px) {
        #terms-section .product-title {
            font-size: 2rem;
        }

        .product-details,
        .product-details li {
            font-size: 1rem;
        }

        .accordion-button {
            font-size: 1.1rem;
        }

        .accordion-body {
            font-size: 1rem;
        }

        .sticky-top {
            position: static;
        }
    }

    @media (max-width: 576px) {
        #terms-section .product-title {
            font-size: 1.75rem;
        }

        .product-details,
        .product-details li {
            font-size: 0.9rem;
        }

        .accordion-button {
            font-size: 1rem;
        }

        .accordion-body {
            font-size: 0.9rem;
            padding: 1rem;
        }

        .btn-lg {
            font-size: 1rem;
            padding: 0.5rem 1.5rem;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity=" sticks256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize Toastr options
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000
        };

        // Smooth scroll for sidebar navigation
        $('.card-body a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            const target = $(this.hash);
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
                // Trigger accordion open
                target.collapse('show');
            }
        });

        // Notify on PDF download click
        $('.btn-outline-secondary').on('click', function () {
            toastr.success('Downloading Terms and Conditions PDF...');
        });
    });
</script>
@endpush
