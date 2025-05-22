<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">ShopEase</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('products') }}">Shop</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"></a></li>
                        
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">View All</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <!-- Search Form (initially hidden) -->
                <form id="searchForm" class="me-2" style="display: none;" action="{{ route('search.live') }}">
                    @csrf
                    <div class="input-group" style="min-width: 300px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search products or categories..." autocomplete="off">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button id="closeSearch" class="btn btn-outline-light" type="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div id="searchResults" class="position-absolute mt-1 rounded shadow" style="display: none; width: 400px; z-index: 1000; background: white; max-height: 500px; overflow-y: auto;"></div>
                </form>

                <!-- search toggle button -->
                <a href="#" class="btn btn-outline-light me-2" id="toggleSearch">
                    <i class="fas fa-search"></i>
                </a>
                
                <!-- User Dropdown -->
                <div class="dropdown me-2">
                    <a href="#" class="btn btn-outline-light dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        @auth
                            <li><h6 class="dropdown-header text-white">Welcome, {{ Auth::user()->name }}</h6></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i>Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                </form>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}"><i class="fas fa-user-plus me-2"></i>Register</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- wishlist button -->
                <a href="{{ route('wishlist.index') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-heart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="wishlist-count">
                    </span>
                </a>
                
                <!-- Cart Button -->
                <a href="{{ route('cart.index') }}" class="btn btn-outline-light position-relative">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">
                        {{ \App\Services\CartService::getCount() }}
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>

@push('scripts')

<script>
    $(document).ready(function() {
        // Toggle search form
        $('#toggleSearch').on('click', function(e) {
            e.preventDefault();
            $('#searchForm').show();
            $('#searchInput').focus();
            $(this).hide();
        });
        
        // Close search form
        $('#closeSearch').on('click', function(e) {
            e.preventDefault();
            $('#searchForm').hide();
            $('#searchResults').hide();
            $('#toggleSearch').show();
            $('#searchInput').val('');
        });
        
        // Live search functionality
        $('#searchInput').on('input', function() {
            const query = $(this).val().trim();
            
            if (query.length > 2) {
                $.ajax({
                    url: $('#searchForm').attr('action'),
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        let html = '';
                        let resultCount = response.results ? response.results.length : 0;
                        
                        if (resultCount > 0) {
                            html = `<div class="search-results-container p-3">`;
                            
                            let currentGroup = null;
                            let hasDirectMatches = false;
                            let hasCategoryProducts = false;
                            
                            // First pass to determine what we have
                            response.results.forEach(item => {
                                if (item.from_category) {
                                    hasCategoryProducts = true;
                                } else if (item.type === 'product') {
                                    hasDirectMatches = true;
                                }
                            });
                            
                            // Direct matches section
                            if (hasDirectMatches) {
                                html += `
                                    <div class="search-section mb-3">
                                        <h6 class="search-section-header text-primary mb-2">
                                            <i class="fas fa-search me-2"></i>
                                            Products matching "${query}"
                                        </h6>
                                        <div class="row g-2">`;
                                
                                response.results.forEach(item => {
                                    if (item.type === 'product' && !item.from_category) {
                                        html += `
                                            <div class="col-12">
                                                <a href="/product/show/${item.slug}" class="text-decoration-none">
                                                    <div class="search-item p-2 rounded hover-bg">
                                                        <div class="d-flex align-items-center">
                                                            <img src="${item.image_url || '/images/placeholder-product.png'}" 
                                                                alt="${item.name}" class="me-3 rounded" 
                                                                style="width: 40px; height: 40px; object-fit: cover;">
                                                            <div class="flex-grow-1">
                                                                <div class="product-name text-dark fw-medium">${item.name}</div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <small class="text-success fw-bold">$${item.price || '0.00'}</small>
                                                                    <span class="badge bg-light text-dark">In Stock</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>`;
                                    }
                                });
                                
                                html += `</div></div>`;
                            }
                            
                            // Category products section
                            if (hasCategoryProducts) {
                                let categoriesProcessed = [];
                                
                                html += `<div class="search-section">`;
                                
                                response.results.forEach(item => {
                                    if (item.from_category && !categoriesProcessed.includes(item.category_name)) {
                                        categoriesProcessed.push(item.category_name);
                                        
                                        html += `
                                            <h6 class="search-section-header text-primary mt-3 mb-2">
                                                <i class="fas fa-folder-open me-2"></i>
                                                Products in "${item.category_name}"
                                            </h6>
                                            <div class="row g-2">`;
                                        
                                        response.results.forEach(prod => {
                                            if (prod.from_category && prod.category_name === item.category_name) {
                                                html += `
                                                    <div class="col-12">
                                                        <a href="/products/${prod.id}" class="text-decoration-none">
                                                            <div class="search-item p-2 rounded hover-bg">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="${prod.image_url || '/images/placeholder-product.png'}" 
                                                                        alt="${prod.name}" class="me-3 rounded" 
                                                                        style="width: 40px; height: 40px; object-fit: cover;">
                                                                    <div class="flex-grow-1">
                                                                        <div class="product-name text-dark fw-medium">${prod.name}</div>
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <small class="text-success fw-bold">$${prod.price || '0.00'}</small>
                                                                            <span class="badge bg-light text-dark">In Stock</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>`;
                                            }
                                        });
                                        
                                        html += `</div>`;
                                    }
                                });
                                
                                html += `</div>`;
                            }
                            
                            html += '</div>';
                        } else {
                            html = `
                                <div class="p-4 text-center">
                                    <i class="fas fa-search fa-2x text-muted mb-3"></i>
                                    <h6 class="text-muted">No results found for "${query}"</h6>
                                    <p class="small text-muted">Try different keywords or check spelling</p>
                                </div>`;
                        }
                        
                        // Calculate and set dynamic height
                        const $searchResults = $('#searchResults');
                        $searchResults.html(html).show();
                        
                        // Set height based on result count
                        if (resultCount === 0) {
                            $searchResults.css({
                                'height': 'auto',
                                'max-height': '200px'
                            });
                        } else if (resultCount <= 3) {
                            $searchResults.css({
                                'height': 'auto',
                                'max-height': '300px'
                            });
                        } else if (resultCount <= 6) {
                            $searchResults.css({
                                'height': 'auto',
                                'max-height': '400px'
                            });
                        } else {
                            $searchResults.css({
                                'height': 'auto',
                                'max-height': '500px'
                            });
                        }
                    },
                    error: function(xhr) {
                        $('#searchResults').html(`
                            <div class="p-3 text-center text-danger">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                Error fetching results. Please try again.
                            </div>
                        `).css({
                            'height': 'auto',
                            'max-height': '150px'
                        }).show();
                    }
                });
            } else {
                $('#searchResults').hide();
            }
        });
        
        // Hide results when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#searchForm').length) {
                $('#searchResults').hide();
            }
        });
        
        // Prevent form submission
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            const query = $('#searchInput').val().trim();
            if (query.length > 0) {
                window.location.href = '/search?q=' + encodeURIComponent(query);
            }
        });
    });
</script>
    
@endpush