<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Your E-Commerce Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .contact-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://via.placeholder.com/1920x600');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }

        .contact-info-card {
            transition: all 0.3s;
            height: 100%;
            border: none;
            border-radius: 10px;
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .contact-info-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #0d6efd;
        }

        .contact-form {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .map-container {
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }

        .btn-submit {
            background-color: #0d6efd;
            color: white;
            padding: 10px 25px;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
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
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="contact-hero text-center">
        <div class="container">
            <h1 class="display-3 fw-bold">Contact Us</h1>
            <p class="lead">We'd love to hear from you! Get in touch with our team.</p>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="container mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card contact-info-card p-4 text-center h-100">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>Our Location</h4>
                    <p>123 Commerce Street<br>Tech City, TC 12345<br>United States</p>
                    <a href="#map" class="btn btn-outline-primary mt-auto">View on Map</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-info-card p-4 text-center h-100">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Phone Numbers</h4>
                    <p>Customer Service: <br><strong>(123) 456-7890</strong></p>
                    <p>Sales Inquiries: <br><strong>(123) 456-7891</strong></p>
                    <a href="tel:+11234567890" class="btn btn-outline-primary mt-auto">Call Us</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-info-card p-4 text-center h-100">
                    <i class="fas fa-envelope"></i>
                    <h4>Email Addresses</h4>
                    <p>General Inquiries: <br><strong>info@shopease.com</strong></p>
                    <p>Support: <br><strong>support@shopease.com</strong></p>
                    <a href="mailto:info@shopease.com" class="btn btn-outline-primary mt-auto">Email Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map Section -->
    <section class="container mb-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Send Us a Message</h2>
                <p class="mb-4">Have questions, feedback, or special requests? Fill out the form below and our team will get back to you within 24 hours.</p>

                <div class="contact-form">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="john@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number (Optional)</label>
                            <input type="tel" class="form-control" id="phone" placeholder="(123) 456-7890">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-select" id="subject" required>
                                <option value="" selected disabled>Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="order">Order Status</option>
                                <option value="return">Returns & Refunds</option>
                                <option value="wholesale">Wholesale Inquiry</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Type your message here..." required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-submit btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Location</h2>
                <div class="map-container" id="map">
                    <!-- Embedded Google Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215373510518!2d-73.9878449241647!3d40.74844047138971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689876810923!5m2!1sen!2sus"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="mt-4">
                    <h4 class="fw-bold">Business Hours</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Monday-Friday:</strong> 9:00 AM - 6:00 PM</li>
                        <li class="mb-2"><strong>Saturday:</strong> 10:00 AM - 4:00 PM</li>
                        <li><strong>Sunday:</strong> Closed</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-light py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold">Frequently Asked Questions</h2>
                    <p class="lead">Find quick answers to common questions</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    How long does shipping take?
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Standard shipping typically takes 3-5 business days within the continental US. For expedited shipping options, please check out our shipping policy page or contact our customer service team.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                    What is your return policy?
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>We offer a 30-day return policy for most items. Items must be unused and in their original packaging with all tags attached. Some exclusions apply for special order items. Please see our full return policy for details.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                    Do you offer international shipping?
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Yes, we ship to over 50 countries worldwide. Shipping costs and delivery times vary by destination. During checkout, you'll see the available shipping options and costs for your location.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3 border-0 shadow-sm">
                            <h3 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                    How can I track my order?
                                </button>
                            </h3>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>Once your order ships, you'll receive a confirmation email with a tracking number and link. You can also track your order by logging into your account on our website.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="faq.html" class="btn btn-primary">View All FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Stay Updated</h2>
            <p class="lead mb-4">Subscribe to our newsletter for the latest products, deals, and news</p>
            <form class="row g-2 justify-content-center">
                <div class="col-md-6 col-12">
                    <input type="email" class="form-control form-control-lg" placeholder="Your email address">
                </div>
                <div class="col-md-2 col-12">
                    <button type="submit" class="btn btn-light btn-lg w-100">Subscribe</button>
                </div>
            </form>
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
