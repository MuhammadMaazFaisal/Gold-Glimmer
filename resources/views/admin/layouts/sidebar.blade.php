<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class=" ">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('finished.product') }}" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Products</span>
                    </a>
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
                        <i data-feather="file-text"></i>
                        <span data-key="t-bank">Stock Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('stock.create') }}"data-key="t-register">Add Stock</a></li>
                        <li><a href="{{ route('stock.index') }}" data-key="t-register">Current Stock</a></li>
                        <li><a href="{{ route('purchasing.create') }}" data-key="t-register">Purchasing</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('product.index') }}" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Manufacturer Panel</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.create') }}" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Customer Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('order.index') }}" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Order Management</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Point of Sale (POS)</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('pos.index') }}" data-key="t-register">Create POS Order</a></li>
                        <li><a href="{{ route('pos.order.list') }}" data-key="t-register">POS Order List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Metal Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('issue.metal') }}" data-key="t-register">Issue Metal</a></li>
                        <li><a href="{{ route('receive.metal') }}" data-key="t-register">Receive Metal</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-bank">Cash Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('issue.cash') }}" data-key="t-register">Issue cash</a></li>
                        <li><a href="{{ route('receive.cash') }}" data-key="t-register">Receive cash</a></li>
                    </ul>
                </li>
                {{-- <li>
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
                </li> --}}
                {{-- <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="settings"></i>
                        <span data-key="t-authentication">Settings</span>
                    </a>
                    <!-- <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-register">System Settings</a></li>
                    </ul> -->
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
