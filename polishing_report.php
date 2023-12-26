<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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
require_once("./assets/lang/" . $lang . ".php");
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
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
</head>
<style>
    .price_per.selectize-control {
        width: 100px;
    }

    .column-border {
        border-left: 2px solid black;
    }
</style>

 <body>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">


        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header card border border-danger">
                                <h4 class="card-title">
                                    Polisher Report
                                </h4>

                            </div>
                            <div class="card-body px-4 ">

                                <div class="row">
                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Name:</label>
                                    <div class="col-sm-5">

                                        <select id="select-vendor" name="vendor_id" placeholder="Pick a manufacturer..." required>
                                            <option value="">Select a polisher...</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-12 ms-lg-auto ">
                                        <div class="mt-4 mt-lg-0 table-responsive">

                                            <table id="polisher-table" class="table table-hover">
                                                <thead class="table-dark">
                                                </thead>
                                                <tbody id="tbody">
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="row my-4 justify-content-end">
                                            <div class="col-sm-2">

                                                <input type="number" step="any" name="total_metal_issued" value="" id="total_metal_issued" class="form-control form-control card d-none" placeholder="Total Metal">
                                            </div>
                                            <div class="col-sm-2">

                                                <input type="number" name="total_metal_recieved" value="" id="total_metal_recieved" class="form-control form-control card d-none" placeholder="Total Jewellery">
                                            </div>
                                            <div class="col-sm-2">

                                                <input type="number" name="payable" value="" id="payable" class="form-control form-control card bg-dark border-dark text-light d-none" placeholder="payable">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>

<script>
    function CalculateTotal() {
        jewellery = document.getElementsByClassName('jewellery');
        metal = document.getElementsByClassName('metal');
        var total_jewellery = 0;
        var total_metal = 0;
        for (var i = 1; i < jewellery.length; i++) {
            if (jewellery[i].innerHTML != "") {
                total_jewellery += parseFloat(jewellery[i].innerHTML);
            }

        }
        for (var i = 1; i < metal.length; i++) {
            if (metal[i].innerHTML != "") {
                total_metal += parseFloat(metal[i].innerHTML);
            }
        }
        total_metal1 = document.getElementById('total_metal_issued');
        total_metal1.value = total_metal;
        total_jewellery1 = document.getElementById('total_metal_recieved');
        total_jewellery1.value = total_jewellery;
        payable = document.getElementById('payable');
        payable.value = total_jewellery - total_metal;
        total_metal1.classList.remove('d-none');
        total_jewellery1.classList.remove('d-none');
        payable.classList.remove('d-none');


    }

    function GetData(vendor_id) {
        if ($.fn.DataTable.isDataTable('#polisher-table')) {
            $('#polisher-table').DataTable().destroy();
        }
        $.ajax({
            url: "functions.php",
            type: "POST",
            data: {
                function: "GetPolisherReportData",
                id: vendor_id
            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                var table = $('#polisher-table').DataTable({
                    data: data,
                    columns: [{
                            data: 'date',
                            title: 'Date'
                        },
                        {
                            data: 'image',
                            title: 'Pic',
                            render: function(data, type, row, meta) {
                                return '<img src="' + data + '" width="50" height="50"/>';
                            }
                        },
                        {
                            data: 'polisherbarcode',
                            title: 'Barcode'
                        },
                        {
                            data: 'name',
                            title: 'Vendor Name'
                        },
                        {
                            data: 'm_details',
                            title: 'Detail'
                        },
                        {
                            data: 'm_type',
                            title: 'type'
                        },
                        {
                            data: 'm_quantity',
                            title: 'quantity'
                        },
                        {
                            data: 'difference',
                            title: 'Difference'
                        },
                        {
                            data: 'm_purity',
                            title: 'purity'
                        },
                        {
                            data: 'rate',
                            title: 'Rate'
                        },
                        {
                            data: 'Payable',
                            title: '24k',
                            className: 'metal',
                        },
                        {
                            data: 'metal_pure_weight',
                            title: '24K',
                            className: 'jewellery column-border',
                            render: function(data, type, row, meta) {
                                if (row.metal_type === 'issued') {
                                    return (data);
                                } else {
                                    return (-data);
                                }
                            }
                        }
                    ]
                });
                CalculateTotal();
            }
        });
    }

    function GetDataAll() {
        if ($.fn.DataTable.isDataTable('#polisher-table')) {
            $('#polisher-table').DataTable().destroy();
        }
        $.ajax({
            url: "functions.php",
            type: "POST",
            data: {
                function: "GetPolisherReportDataAll",
            },
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                var table = $('#polisher-table').DataTable({
                    data: data,
                    columns: [{
                            data: 'date',
                            title: 'Date'
                        },
                        {
                            data: 'image',
                            title: 'Pic',
                            render: function(data, type, row, meta) {
                                return '<img src="' + data + '" width="50" height="50"/>';
                            }
                        },
                        {
                            data: 'polisherbarcode',
                            title: 'Barcode'
                        },
                        {
                            data: 'name',
                            title: 'Vendor Name'
                        },
                        {
                            data: 'm_details',
                            title: 'Detail'
                        },
                        {
                            data: 'm_type',
                            title: 'type'
                        },
                        {
                            data: 'm_quantity',
                            title: 'quantity'
                        },
                        {
                            data: 'difference',
                            title: 'Difference'
                        },
                        {
                            data: 'm_purity',
                            title: 'purity'
                        },
                        {
                            data: 'rate',
                            title: 'Rate'
                        },
                        {
                            data: 'Payable',
                            title: '24k',
                            className: 'metal',
                        },
                        {
                            data: 'metal_pure_weight',
                            title: '24K',
                            className: 'jewellery column-border',
                            render: function(data, type, row, meta) {
                                if (row.metal_type === 'issued') {
                                    return (data);
                                } else {
                                    return (-data);
                                }
                            }
                        }
                    ]
                });
                CalculateTotal();
            }
        });
    }

    $(document).ready(function() {
        GetDataAll();

    });

    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        })

        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetAllVendorData",
                type: "polisher"
            },
            success: function(response) {
                var data = JSON.parse(response);
                var select = $('#select-vendor')[0].selectize;
                for (var i = 0; i < data.length; i++) {
                    var newOption = {
                        value: data[i].id,
                        text: data[i].id + " | " + data[i].name
                    };
                    select.addOption(newOption);
                }

            }
        });
    });

    $(document).on('change', '#select-vendor', function(e) {
        e.preventDefault();
        var select1 = $(this).val();
        GetData(select1);
    });
</script>