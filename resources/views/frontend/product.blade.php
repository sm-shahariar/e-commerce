@extends('layouts.apps')
@section('content')

    <!-- Product Listing Section -->
    <section class="py-5">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Products</li>
                </ol>
            </nav>
            
            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-md-3">
                    <div class="card filter-card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Filters</h5>
                            <hr>
                            
                            <h6>Categories</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="electronics" checked>
                                <label class="form-check-label" for="electronics">Electronics</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fashion" checked>
                                <label class="form-check-label" for="fashion">Fashion</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="home" checked>
                                <label class="form-check-label" for="home">Home & Garden</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="beauty" checked>
                                <label class="form-check-label" for="beauty">Beauty</label>
                            </div>
                            
                            <hr>
                            
                            <h6>Price Range</h6>
                            <div class="d-flex justify-content-between mb-2">
                                <span>$10</span>
                                <span>$500</span>
                            </div>
                            <input type="range" class="form-range" min="10" max="500" step="10" id="priceRange">
                            <div class="d-flex justify-content-between">
                                <input type="number" class="form-control form-control-sm w-45" placeholder="Min" value="10">
                                <input type="number" class="form-control form-control-sm w-45" placeholder="Max" value="500">
                            </div>
                            
                            <hr>
                            
                            <h6>Sort By</h6>
                            <select class="form-select form-select-sm">
                                <option selected>Featured</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Newest Arrivals</option>
                                <option>Best Selling</option>
                            </select>
                            
                            <hr>
                            
                            <button class="btn btn-primary w-100">Apply Filters</button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Grid -->
                <div class="col-md-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>All Products</h4>
                        <div>
                            <span class="me-2">View:</span>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-secondary active"><i class="fas fa-th"></i></button>
                                <button type="button" class="btn btn-outline-secondary"><i class="fas fa-list"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Product 1 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <span class="badge bg-danger discount-badge">-20%</span>
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80" class="card-img-top product-img" alt="Product 1">
                                <div class="card-body">
                                    <h5 class="card-title">Wireless Headphones</h5>
                                    <p class="card-text text-muted">Premium sound quality with noise cancellation</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="text-danger">$79.99</span>
                                            <span class="text-decoration-line-through text-muted ms-2">$99.99</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 2 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1099&q=80" class="card-img-top product-img" alt="Product 2">
                                <div class="card-body">
                                    <h5 class="card-title">Smart Watch</h5>
                                    <p class="card-text text-muted">Track your fitness and stay connected</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>$149.99</span>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 3 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <span class="badge bg-success discount-badge">New</span>
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top product-img" alt="Product 3">
                                <div class="card-body">
                                    <h5 class="card-title">Bluetooth Speaker</h5>
                                    <p class="card-text text-muted">Portable speaker with 20h battery life</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>$59.99</span>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 4 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <span class="badge bg-danger discount-badge">-15%</span>
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top product-img" alt="Product 4">
                                <div class="card-body">
                                    <h5 class="card-title">Running Shoes</h5>
                                    <p class="card-text text-muted">Lightweight and comfortable for all-day wear</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="text-danger">$84.99</span>
                                            <span class="text-decoration-line-through text-muted ms-2">$99.99</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 5 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top product-img" alt="Product 5">
                                <div class="card-body">
                                    <h5 class="card-title">Vintage Camera</h5>
                                    <p class="card-text text-muted">Classic design with modern features</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>$199.99</span>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 6 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <span class="badge bg-warning text-dark discount-badge">Sale</span>
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1585386959984-a4155224a1ad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" class="card-img-top product-img" alt="Product 6">
                                <div class="card-body">
                                    <h5 class="card-title">Men's Perfume</h5>
                                    <p class="card-text text-muted">Elegant fragrance for all occasions</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="text-danger">$49.99</span>
                                            <span class="text-decoration-line-through text-muted ms-2">$69.99</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 7 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1572635196237-14b3f281503f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80" class="card-img-top product-img" alt="Product 7">
                                <div class="card-body">
                                    <h5 class="card-title">Sunglasses</h5>
                                    <p class="card-text text-muted">UV protection with stylish design</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>$39.99</span>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 8 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <span class="badge bg-success discount-badge">New</span>
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80" class="card-img-top product-img" alt="Product 8">
                                <div class="card-body">
                                    <h5 class="card-title">Salad Bowl</h5>
                                    <p class="card-text text-muted">Eco-friendly and durable</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>$24.99</span>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product 9 -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="action-icons">
                                    <a href="#" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    <a href="#" title="Quick View"><i class="fas fa-eye"></i></a>
                                </div>
                                <img src="https://images.unsplash.com/photo-1520390138845-fd2d229dd553?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1092&q=80" class="card-img-top product-img" alt="Product 9">
                                <div class="card-body">
                                    <h5 class="card-title">Laptop Backpack</h5>
                                    <p class="card-text text-muted">Water-resistant with USB charging port</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>$45.99</span>
                                        <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

   @endsection