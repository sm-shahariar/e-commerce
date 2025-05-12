<!-- Creating a responsive navigation bar with horizontal menu items and dropdowns -->
<nav id="navigation" class="bg-dark py-3 shadow-sm">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav d-flex flex-row flex-nowrap">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link text-white active" href="{{ url('/home') }}">Home</a>
                </li>
                <!-- Hot Deals Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="hotDealsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hot Deals
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="hotDealsDropdown">
                        <li><a class="dropdown-item" href="#">Flash Sales</a></li>
                        <li><a class="dropdown-item" href="#">Clearance</a></li>
                        <li><a class="dropdown-item" href="#">Seasonal Offers</a></li>
                    </ul>
                </li>
                <!-- Category Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        <li><a class="dropdown-item" href="#">Electronics</a></li>
                        <li><a class="dropdown-item" href="#">Fashion</a></li>
                        <li><a class="dropdown-item" href="#">Home & Furniture</a></li>
                        <li><a class="dropdown-item" href="#">Books</a></li>
                    </ul>
                </li>
                <!-- Mens Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="mensDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mens
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mensDropdown">
                        <li><a class="dropdown-item" href="#">Shirts</a></li>
                        <li><a class="dropdown-item" href="#">Pants</a></li>
                        <li><a class="dropdown-item" href="#">Jackets</a></li>
                        <li><a class="dropdown-item" href="#">Accessories</a></li>
                    </ul>
                </li>
                <!-- Womens Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="womensDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Womens
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="womensDropdown">
                        <li><a class="dropdown-item" href="#">Dresses</a></li>
                        <li><a class="dropdown-item" href="#">Tops</a></li>
                        <li><a class="dropdown-item" href="#">Skirts</a></li>
                        <li><a class="dropdown-item" href="#">Jewelry</a></li>
                    </ul>
                </li>
                <!-- Kids Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="kidsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kids
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kidsDropdown">
                        <li><a class="dropdown-item" href="#">T-Shirts</a></li>
                        <li><a class="dropdown-item" href="#">Shorts</a></li>
                        <li><a class="dropdown-item" href="#">Shoes</a></li>
                        <li><a class="dropdown-item" href="#">Toys</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>