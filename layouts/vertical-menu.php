<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <!-- <img src="assets/images/logo.png" alt="" height="24">-->
                    </span>
                    <span class="logo-lg">
                        <!--<img src="assets/images/logo.png" alt="" height="24">-->
                    </span>
                </a>
                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <!--  <img src="assets/images/logo.png" alt="" height="24">-->
                    </span>
                    <span class="logo-lg">
                        <!--<img src="assets/images/logo.png" alt="" height="24">-->
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo $language["Search"]; ?>" aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-2.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION['username']; ?>.</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" onclick="Logout()"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> <?php echo $language["Logout"]; ?></a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->

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
                        <span data-key="t-authentication">Products</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="semi_finish.php" data-key="t-register">Semi-Finished</a></li>
                    <li><a href="add_product.php" data-key="t-register">Add Product</a></li>
                        
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Vendor Management</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="manufacturer.php" data-key="t-register">Manufacturer</a></li>
                        <li><a href="polisher.php" data-key="t-register">Polisher</a></li>
                        <li><a href="stone-setter.php" data-key="t-register">Stone Setter</a></li>
                        <li><a href="vendor.php" data-key="t-register">Vendor</a></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Metal</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="issue_metal.php" data-key="t-register">Issue Metal</a></li>
                        <li><a href="recieve_metal.php" data-key="t-register">Receive Metal</a></li>
                    </ul>

                </li>
               <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-bank">Cash</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="issue_cash.php" data-key="t-register">Issue Cash</a></li>
                        <li><a href="recieve_cash.php" data-key="t-register">Receive Cash</a></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="file-text"></i>
                        <span data-key="t-bank">Manage Stock</span>

                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="add_type.php" data-key="t-register">Add Type</a></li>
                        <li><a href="stock.php" data-key="t-register">Stock</a></li>
                        <li><a href="purchasing.php" data-key="t-register">Purchasing</a></li>
                        <li><a href="add_stock.php" data-key="t-register">Add Stock</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="manufacturing_report.php" data-key="t-register">Manufecturing Report</a></li>
                        <li><a href="polishing_report.php" data-key="t-register">Polishing Report</a></li>
                        <li><a href="stone_setter_report.php" data-key="t-register">Stone Setting Report</a></li>
                        <li><a href="additional_report.php" data-key="t-register">Additional Accounts Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class=" ">
                        <i data-feather="settings"></i>
                        <span data-key="t-authentication">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" data-key="t-register">System Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->