<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- Quick Actions --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Quick Actions</h6>
                        <ul>
                                <li><a href="{{ route('admin.products.create') }}"><i data-feather="plus"></i><span>Add
                                            Product</span></a></li>

                                <li><a href="{{ route('admin.categories.create') }}"><i data-feather="codepen"></i><span>Add
                                            Category</span></a></li>

                                <li><a href="{{ route('admin.product-variants.create') }}"><i data-feather="grid"></i><span>
                                            Add Product Variant</span></a></li>


                        </ul>
                    </li>

                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                </li>

                {{-- Calendar --}}


                {{-- Purchases --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Product Variant</h6>
                        <ul>
                            <li class="{{ Request::is('product-variants') ? 'active' : '' }}"><a
                                    href="{{ route('admin.product-variants.index') }}"><i
                                        data-feather="grid"></i><span>Product Variant</span></a></li>

                            <li class="{{ Request::is('orders') ? 'active' : '' }}"><a
                                    href="{{ route('admin.orders.index') }}"><i
                                        data-feather="clipboard"></i><span>Order</span></a></li>
                        </ul>
                    </li>

                {{-- Inventory --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Inventory</h6>
                        <ul>
                                <li class="{{ Request::is('products') ? 'active' : '' }}"><a
                                        href="{{ route('admin.products.index') }}"><i
                                            data-feather="box"></i><span>Products</span></a></li>

                                <li class="{{ Request::is('categories') ? 'active' : '' }}"><a
                                        href="{{ route('admin.categories.index') }}"><i
                                            data-feather="codepen"></i><span>Category</span></a></li>

                                <li class="{{ Request::is('sub-categories') ? 'active' : '' }}"><a
                                        href="{{ route('admin.sub-categories.index') }}"><i
                                            data-feather="list"></i><span>Sub Category</span></a></li>

                                <li class="{{ Request::is('attributes') ? 'active' : '' }}"><a
                                        href="{{ route('admin.attributes.index') }}"><i
                                            data-feather="layers"></i><span>Attributes</span></a></li>

                        </ul>
                    </li>


                {{-- Settings & Logout --}}
                <li class="submenu-open">
                    <ul>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="{{ Request::is('signin') ? 'active' : '' }}">
                                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"><i
                                        data-feather="log-out"></i><span>Logout</span></a>
                            </li>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
