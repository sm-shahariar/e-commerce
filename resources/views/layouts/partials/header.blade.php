<!-- Creating a responsive header with logo, search bar, and icons -->
<header class="header bg-dark py-3 shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Logo and Name -->
            <div class="col-3 col-md-2 d-flex align-items-center">
                <a href="#">
                    <img src="build/images/logo.png" alt="Logo" class="img-fluid" style="max-height: 50px;">
                </a>
                <span class="ms-2 fw-bold d-none d-md-block text-light">Shahariar</span>
            </div>

            <!-- Center: Search Bar -->
            <div class="col-6 col-md-6">
                <form action="#" method="GET" class="d-flex">
                    <input type="text" name="query" class="form-control rounded-start" placeholder="Search products..." aria-label="Search">
                    <button type="submit" class="btn btn-primary rounded-end">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Right Side: Icons -->
            <div class="col-3 col-md-4 text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <!-- Wishlist Icon -->
                    <a href="#" class="text-light me-4" title="Wishlist">
                        <i class="fa fa-heart fa-lg"></i>
                    </a>

                    <!-- Cart Icon -->
                    <a href="#" class="text-light me-4" title="Cart">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                    </a>

                    <!-- User Icon -->
                    <a href="#" class="text-light mx-2" title="Profile">
                        <i class="fa fa-user fa-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Adding custom CSS for header styling -->
