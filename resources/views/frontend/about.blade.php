<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Your E-Commerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://via.placeholder.com/1920x600');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 5px solid #f8f9fa;
        }

        .value-card {
            transition: transform 0.3s;
            height: 100%;
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .stats-item {
            padding: 30px;
            text-align: center;
        }

        .stats-item i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ShopEase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold">About ShopEase</h1>
            <p class="lead">Your trusted online shopping destination since 2015</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="container mb-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p class="lead">Founded in 2015, ShopEase began as a small startup with a big vision - to make online shopping effortless and enjoyable for everyone.</p>
                <p>What started as a humble operation in a garage has now grown into one of the most trusted e-commerce platforms, serving millions of customers worldwide. Our journey has been marked by innovation, customer-centric values, and a commitment to quality.</p>
                <p>Today, we're proud to offer a curated selection of products across multiple categories, all while maintaining the personal touch that made us successful in the first place.</p>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400" alt="Our story" class="img-fluid rounded shadow">
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="bg-light py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">Our Mission & Values</h2>
                    <p class="lead">Guiding principles that drive everything we do</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card value-card p-4 shadow-sm">
                        <div class="text-center mb-3">
                            <i class="fas fa-heart fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-center">Customer First</h4>
                        <p class="text-center">We put our customers at the heart of every decision we make, ensuring their satisfaction is our top priority.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card value-card p-4 shadow-sm">
                        <div class="text-center mb-3">
                            <i class="fas fa-leaf fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-center">Sustainability</h4>
                        <p class="text-center">We're committed to eco-friendly practices and reducing our environmental footprint at every step.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card value-card p-4 shadow-sm">
                        <div class="text-center mb-3">
                            <i class="fas fa-lightbulb fa-3x text-primary"></i>
                        </div>
                        <h4 class="text-center">Innovation</h4>
                        <p class="text-center">We continuously evolve our platform to bring you the latest technologies and shopping experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="container mb-5">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <i class="fas fa-users"></i>
                    <h3 class="fw-bold">1M+</h3>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <i class="fas fa-box-open"></i>
                    <h3 class="fw-bold">50K+</h3>
                    <p>Products Available</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <i class="fas fa-globe"></i>
                    <h3 class="fw-bold">15+</h3>
                    <p>Countries Served</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stats-item">
                    <i class="fas fa-truck"></i>
                    <h3 class="fw-bold">24/7</h3>
                    <p>Fast Delivery</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="container mb-5">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">Meet Our Team</h2>
                <p class="lead">The passionate people behind ShopEase</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-member text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="img-fluid">
                    <h4>Sarah Johnson</h4>
                    <p class="text-muted">CEO & Founder</p>
                    <div class="social-links">
                        <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary mx-2"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-member text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="img-fluid">
                    <h4>Michael Chen</h4>
                    <p class="text-muted">CTO</p>
                    <div class="social-links">
                        <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary mx-2"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-member text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="img-fluid">
                    <h4>Emma Rodriguez</h4>
                    <p class="text-muted">Marketing Director</p>
                    <div class="social-links">
                        <a href="#" class="text-primary mx-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-primary mx-2"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-member text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="img-fluid">
                    <h4>David Kim</h4>
                    <p class="text-muted">Customer Experience</p>
                    <div class="social-links">
                        <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-primary mx-2"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-light py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">What Our Customers Say</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p>"ShopEase has completely transformed my shopping experience. The selection is amazing and delivery is always prompt!"</p>
                        <div class="d-flex align-items-center mt-auto">
                            <img src="https://via.placeholder.com/50" alt="Customer" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Jessica Thompson</h6>
                                <small class="text-muted">Loyal Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p>"The customer service is outstanding. They went above and beyond to resolve my issue quickly and professionally."</p>
                        <div class="d-flex align-items-center mt-auto">
                            <img src="https://via.placeholder.com/50" alt="Customer" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Robert Williams</h6>
                                <small class="text-muted">Verified Buyer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <div class="mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                        </div>
                        <p>"I love the quality of products I receive every time. It's my go-to platform for all my shopping needs."</p>
                        <div class="d-flex align-items-center mt-auto">
                            <img src="https://via.placeholder.com/50" alt="Customer" class="rounded-circle me-3">
                            <div>
                                <h6 class="mb-0">Maria Garcia</h6>
                                <small class="text-muted">Frequent Shopper</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Ready to Experience the Difference?</h2>
            <p class="lead mb-4">Join thousands of satisfied customers who shop with confidence</p>
            <a href="products.html" class="btn btn-light btn-lg px-4">Shop Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3">ShopEase</h5>
                    <p>Your trusted online shopping destination offering quality products and exceptional service since 2015.</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.html" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="products.html" class="text-white text-decoration-none">Products</a></li>
                        <li class="mb-2"><a href="about.html" class="text-white text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="contact.html" class="text-white text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Customer Service</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Shipping Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Returns & Refunds</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="fw-bold mb-3">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Commerce St, Tech City</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@shopease.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 ShopEase. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed with <i class="fas fa-heart text-danger"></i> by ShopEase Team</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
