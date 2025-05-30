 <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h5>ShopEase</h5>
                    <p>Your one-stop online shop for all your needs.</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-white text-decoration-none">Shop</a></li>
                        <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                        <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Customer Service</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.dashboard') }}" class="text-white text-decoration-none">My Account</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Order Tracking</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Returns & Refunds</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Shipping Info</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contact Us</h5>
                    <address>
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Main St, City, Country</p>
                        <p><i class="fas fa-phone me-2"></i>01947116736</p>
                        <p><i class="fas fa-envelope me-2"></i> info@shopease.com</p>
                    </address>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-12 text-center text-md-center">
                    <p>&copy; {{ date('Y') }} ShopEase. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
