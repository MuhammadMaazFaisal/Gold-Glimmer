<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: auth-login.php");
    exit;
}



// Include config file
require_once "layouts/config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include language configuration file based on selected language
$lang = "en";
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = "en";
}
require_once("../assets/lang/" . $lang . ".php");
//require_once ("./../assets/lang/" . $lang . ".php");

define('root', $_SERVER['DOCUMENT_ROOT']);

?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">


<head>
    <title><?php echo $language["Dashboard"]; ?> Production</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <link href="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
</head>
<style>
    .price_per.selectize-control {
        width: 100px;
    }

    .img-upload-btn {
        position: relative;
        overflow: hidden;
        padding-top: 95%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .img-upload-btn input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .img-upload-btn i {
        position: absolute;
        height: 16px;
        width: 16px;
        top: 50%;
        left: 50%;
        margin-top: -8px;
        margin-left: -8px;
    }

    .btn-radio {
        position: relative;
        overflow: hidden;
    }

    .btn-radio input[type=radio] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .preview {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .backhighlighter {
        background: #e5e5e5;
    }

    .deletor {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        background: #000;
    }

    .deletor:hover {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 1;
        background: #000;
        text-decoration: none;
    }
</style>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include 'layouts/vertical-menu.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        
                        <!-- End Page-content -->


                        <?php include 'layouts/footer.php'; ?>
                    </div>
                    <!-- end main content-->

                </div>
                <!-- END layout-wrapper -->

                <!-- Right Sidebar -->
                <div class="right-bar">
                    <div data-simplebar class="h-100">
                        <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                                <i class="mdi mdi-close noti-icon"></i>
                            </a>
                        </div>

                        <!-- Settings -->
                        <hr class="m-0" />

                        <div class="p-4">
                            <h6 class="mb-3">Layout</h6>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout" id="layout-vertical" value="vertical">
                                <label class="form-check-label" for="layout-vertical">Vertical</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                                <label class="form-check-label" for="layout-mode-light">Light</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                                <label class="form-check-label" for="layout-mode-dark">Dark</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                                <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                                <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                                <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                                <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                                <label class="form-check-label" for="topbar-color-light">Light</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                                <label class="form-check-label" for="topbar-color-dark">Dark</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                            <div class="form-check sidebar-setting">
                                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                                <label class="form-check-label" for="sidebar-size-default">Default</label>
                            </div>
                            <div class="form-check sidebar-setting">
                                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                                <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                            </div>
                            <div class="form-check sidebar-setting">
                                <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                                <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                            <div class="form-check sidebar-setting">
                                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                                <label class="form-check-label" for="sidebar-color-light">Light</label>
                            </div>
                            <div class="form-check sidebar-setting">
                                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                                <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                            </div>
                            <div class="form-check sidebar-setting">
                                <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                                <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                            </div>

                            <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr" value="ltr">
                                <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl" value="rtl">
                                <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                            </div>

                        </div>

                    </div> <!-- end slimscroll-menu-->
                </div>

                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>
                <!-- /Right-bar -->

                <!-- JAVASCRIPT -->
                <?php include 'layouts/vendor-scripts.php'; ?>

                <!-- apexcharts -->
                <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

                <!-- Plugins js-->
                <script src="../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
                <script src="../assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

                <!-- dashboard init -->
                <script src="../assets/js/pages/dashboard.init.js"></script>

                <!-- App js -->
                <script src="../assets/js/app.js"></script>

</body>

</html>

<script>
    function GetData() {
        $.ajax({
            url: "functions.php",
            type: "POST",
            data: {
                function: "GetStockData"
            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                var table = $('#stock-table').DataTable({
                    data: data,
                    columns: [{
                            data: 'stock_date',
                            title: 'Date',
                            render: function(data, type, row) {
                                if (type === 'display' || type === 'filter') {
                                    return data.slice(0, 10);
                                } else {
                                    return data;
                                }
                            }
                        },
                        {
                            data: 'barcode',
                            title: 'Barcode'
                        },
                        {
                            data: 'p_id',
                            title: 'P-Invoice'
                        },
                        {
                            data: 'name',
                            title: 'Vendor Name'
                        },
                        {
                            data: 'detail',
                            title: 'Detail'
                        },
                        {
                            data: 'type',
                            title: 'Type'
                        },
                        {
                            data: 'price_per',
                            title: 'Price Per'
                        },
                        {
                            data: 'total_quantity',
                            title: 'Quantity'
                        },
                        {
                            data: 'total_weight',
                            title: 'Weight'
                        },
                        {
                            data: 'rate',
                            title: 'Rate'
                        },
                        {
                            data: 'total_amount',
                            title: 'Total'
                        }
                    ],
                    responsive: true
                });
            }
        });
    }

    
    $(document).ready(function() {
        GetData();
    });
</script>