<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="index.php" class=" ">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Manufacturer Panel</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="production_page.php" data-key="t-register">Add Production</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Orders</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="create_order.php" data-key="t-register">Create Order</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-register">Semi-Finished</a></li>
                        <!-- <li><a href="add_product.php" data-key="t-register">Add Product</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Vendor Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('manufacturer') }}" data-key="t-register">Manufacturer</a></li>
                        <li><a href="{{ route('polisher') }}" data-key="t-register">Polisher</a></li>
                        <li><a href="{{ route('stone-setter') }}" data-key="t-register">Stone Setter</a></li>
                        <li><a href="{{ route('vendor') }}" data-key="t-register">Vendor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Metal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('issue.metal') }}" data-key="t-register">Issue Metal</a></li>
                        <li><a href="{{ route('receive.metal') }}" data-key="t-register">Receive Metal</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-bank">Cash</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('issue.cash') }}" data-key="t-register">Issue cash</a></li>
                        <li><a href="{{ route('receive.cash') }}" data-key="t-register">Receive cash</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-bank">Manage Stock</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('stock.index') }}" data-key="t-register">Stock</a></li>
                        <li><a href="{{ route('purchasing.create') }}" data-key="t-register">Purchasing</a></li>
                        <li><a href="{{ route('stock.create') }}"data-key="t-register">Add Stock</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="manufacturing_report.php" data-key="t-register">Manufecturing Report</a></li>
                        <!-- <li><a href="polishing_report.php" data-key="t-register">Polishing Report</a></li>
                        <li><a href="stone_setter_report.php" data-key="t-register">Stone Setting Report</a></li>
                        <li><a href="additional_report.php" data-key="t-register">Additional Accounts Report</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="settings"></i>
                        <span data-key="t-authentication">Settings</span>
                    </a>
                    <!-- <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-register">System Settings</a></li>
                    </ul> -->
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
