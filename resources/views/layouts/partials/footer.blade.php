<!-- Creating a responsive footer with multiple sections -->
<footer id="footer" class="bg-dark text-white py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- About Us -->
            <div class="col">
                <h5 class="mb-3">About Us</h5>
                <p class="text-light">
                    {{ config('app.name', 'MyShop') }} is your one-stop destination for the latest in fashion, electronics, and more. Shop with confidence and discover amazing deals every day.
                </p>
            </div>
            <!-- Quick Links -->
            <div class="col">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Shop</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Categories</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                    <li><a href="#" class="text-light text-decoration-none">FAQ</a></li>
                </ul>
            </div>
            <!-- Contact Info -->
            <div class="col">
                <h5 class="mb-3">Contact Info</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fa fa-map-marker me-2"></i> 1234 Street Name, City, Country
                    </li>
                    <li class="mb-2">
                        <i class="fa fa-phone me-2"></i> +123-456-7890
                    </li>
                    <li class="mb-2">
                        <i class="fa fa-envelope me-2"></i> support@{{ config('app.name', 'myshop') }}.com
                    </li>
                </ul>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-3" title="Facebook">
                        <i class="fa fa-facebook fa-lg"></i>
                    </a>
                    <a href="#" class="text-white me-3" title="Twitter">
                        <i class="fa fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-white me-3" title="Instagram">
                        <i class="fa fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div>
            <!-- Newsletter -->
            <div class="col">
                <h5 class="mb-3">Newsletter</h5>
                <p class="text-light">Subscribe to get the latest updates and exclusive offers.</p>
                <form action="#" method="POST" class="d-flex">
                    <input type="email" class="form-control rounded-start" placeholder="Your email" aria-label="Email">
                    <button type="submit" class="btn btn-primary rounded-end">
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Copyright -->
        <div class="text-center mt-5 pt-3 border-top border-secondary">
            <p class="text-light mb-0">&copy; {{ date('Y') }} Shahariar. All rights reserved.</p>
        </div>
    </div>
</footer>