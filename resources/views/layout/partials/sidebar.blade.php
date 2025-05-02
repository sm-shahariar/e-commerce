<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                {{-- Quick Actions --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Quick Actions</h6>
                        <ul>
                                <li><a href="#"><i data-feather="plus"></i><span>Add
                                            Product</span></a></li>

                                <li><a href="#"><i data-feather="shopping-cart"></i><span>Add
                                            Category</span></a></li>

                        </ul>
                    </li>

                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                </li>

                {{-- Calendar --}}

                {{-- Sales & Services --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Sales & Services</h6>
                        <ul>
                                <li class=""><a
                                        href="#"><i
                                            data-feather="shopping-cart"></i><span>Sale</span></a></li>

                                <li class=""><a
                                        href="#"><i
                                            data-feather="truck"></i><span>Services</span></a></li>
                        </ul>
                    </li>

                {{-- Services --}}

                {{-- Purchases --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Purchases</h6>
                        <ul>
                            <li class=""><a
                                    href="#"><i
                                        data-feather="shopping-bag"></i><span>Purchases</span></a></li>
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
                                            data-feather="tag"></i><span>Sub Category</span></a></li>

                                <li class="{{ Request::is('attributes') ? 'active' : '' }}"><a
                                        href="{{ route('admin.attributes.index') }}"><i
                                            data-feather="layers"></i><span>Attributes</span></a></li>

                                <li class="{{ Request::is('attribute-values') ? 'active' : '' }}"><a
                                        href="{{ route('admin.attribute-values.index') }}"><i
                                            data-feather="hard-drive"></i><span>Attribute Values</span></a></li>

                                <li class=""><a
                                        href="#"><i
                                            data-feather="bar-chart"></i><span>Service Charts</span></a></li>
                        </ul>
                    </li>


                {{-- Customers --}}

                {{-- Accounts & Finance --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Accounts & Finance</h6>
                        <ul>
                            <li class=""><a
                                    href="#"><i
                                        data-feather="credit-card"></i><span>Accounts</span></a></li>
                        </ul>
                    </li>


                {{-- Report --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Report</h6>
                        <ul>
                            <li class=""><a
                                    href="#"><i
                                        data-feather="bar-chart-2"></i><span>Vehicle Report</span></a></li>
                        </ul>
                    </li>

                {{-- Peoples --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">Peoples</h6>
                        <ul>
                                <li class=""><a
                                        href="#"><i
                                            data-feather="users"></i><span>Suppliers</span></a></li>
                        </ul>
                    </li>

                {{-- Settings --}}

                {{-- User Management --}}
                    <li class="submenu-open">
                        <h6 class="submenu-hdr">User Management</h6>
                        <ul>
                                <li class=""><a href="#"><i
                                            data-feather="user-check"></i><span>Users</span></a></li>

                                <li class=""><a href="#"><i
                                            data-feather="shield"></i><span>Roles & Permissions</span></a></li>
                        </ul>
                    </li>

                {{-- Settings --}}

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
