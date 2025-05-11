<header class="header bg-dark py-3 shadow-sm">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side: Logo and Name -->
            <div class="col-3 col-md-2 d-flex align-items-center">
                <a href="{{ url('home') }}">
                    <img src="{{ asset('build/images/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 50px;">
                </a>
                <span class="ms-2 fw-bold d-none d-md-block text-light">{{ config('app.name', 'Shahariar') }}</span>
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
                    <a href="{{ route('wishlist.index') }}" class="text-light me-4" title="Wishlist">
                        <i class="fa fa-heart fa-lg"></i>
                    </a>

                    <!-- Cart Icon -->
                    <a href="{{ url('cart') }}" class="text-light me-4" title="Cart">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                    </a>

                    <!-- User Icon with Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="text-light mx-2 dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Profile">
                            <i class="fa fa-user fa-lg"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                           
                                <li class="dropdown-item disabled text-white">
                                    Shahariar
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('profiles') }}">
                                        <i class="fa fa-user-circle me-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <form action="#" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-sign-in-alt me-2"></i> Login
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="fa fa-user-plus me-2"></i> Register
                                    </a>
                                </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


