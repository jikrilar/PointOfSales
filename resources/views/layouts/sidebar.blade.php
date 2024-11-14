<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="Bonia Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">tmosfer</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jikril Aryanda</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('transaction.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inventory.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-warehouse"></i>
                        <p>
                            Inventory
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales-order.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-wallet"></i>
                        <p>
                            Sales Order
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transfer-order.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-truck-ramp-box"></i>
                        <p>
                            Stock In
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transfer-order.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-truck-front"></i>
                        <p>
                            Stock Out
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transfer-order.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-truck-fast"></i>
                        <p>
                            Transfer Order
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('transfer-order.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-rotate-right"></i>
                                <p>
                                    History
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transfer-order.create') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-plus"></i>
                                <p>
                                    Create
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-money-bill"></i>
                        <p>
                            Payment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inventory.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-file-invoice"></i>
                        <p>
                            Invoice
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales-history.index') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-dollar"></i>
                        <p>
                            Sales Histories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa-solid fa-database"></i>
                        <p>
                            Data Master
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Customer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cashier.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Cashier
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-copyright"></i>
                                <p>
                                    Brand
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-department.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-layer-group"></i>
                                <p>
                                    Product Department
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-class.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-layer-group"></i>
                                <p>
                                    Product Class
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product-subclass.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-layer-group"></i>
                                <p>
                                    Product Subclass
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-bag-shopping"></i>
                                <p>
                                    Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-building"></i>
                                <p>
                                    Company
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-shop"></i>
                                <p>
                                    Branch
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vendor.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-building-circle-arrow-right"></i>
                                <p>
                                    Vendor
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="" method="POST">
                        @csrf
                        <button class="nav-link btn btn-transparent">
                            <i class="nav-icon fa-solid fa-sign-out-alt"></i>
                            <p>
                                Sign Out
                            </p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
