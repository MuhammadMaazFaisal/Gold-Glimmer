<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: auth-login.php");
    exit;
}
?>
<?php
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
    <title>Dashboard</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
    <style>
        /* CSS */
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-header {
            font-size: 1.5em;
            font-weight: 500;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background-color: #adb5bd;
            font-family: 'Roboto', sans-serif;
            text-align: -webkit-center;
        }

        .card-body {
            padding: 20px;
            height: 400px;
            /* Adjust the height value as needed */
            overflow-y: auto;
        }

        .table {
            width: 100% !important;
        }

        .margin{
            margin: 0px 5px 0px 5px;
        }
    </style>
</head>

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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-2">
                                <h4 class="mb-sm-0 font-size-18">DASHBOARD</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-4 p-0">
                            <div class="margin card">
                                <div class="card-header">
                                    Manufacturing Department
                                </div>
                                <div class="card-body">
                                    <table id="manufacturer-table" class="table table-striped table-bordered">
                                        <thead>
                                        </thead>
                                        <tbody id="tbody-manufacturer">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="margin card">
                                <div class="card-header">
                                    Polishing Department
                                </div>
                                <div class="card-body">
                                    <table id="polisher-table" class="table table-striped table-bordered">
                                        <thead>
                                        </thead>
                                        <tbody id="tbody-polisher">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 p-0">
                            <div class="margin card">
                                <div class="card-header">
                                    Additional Vendors
                                </div>
                                <div class="card-body">
                                    <table id="vendor-table" class="table table-striped table-bordered">
                                        <thead>
                                        </thead>
                                        <tbody id="tbody-vendor">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="m-0 p-0 col-12 card">
                            <div class="card-header">
                                Stone Setting Department
                            </div>
                            <div class="card-body">
                                <table id="product-tabless" class="table table-striped table-bordered">
                                    <thead>
                                    </thead>
                                    <tbody id="tbody-product">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- end row-->


            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->


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
    <script>
        function GetData(vendor_id) {
            if ($.fn.DataTable.isDataTable('#manufacturer-table')) {
                $('#manufacturer-table').DataTable().destroy();
            }
            $.ajax({
                url: "functions.php",
                type: "POST",
                data: {
                    function: "GetManufacturerReportData",
                    id: vendor_id
                },
                success: function(data) {
                    data = JSON.parse(data);
                    var table = $('#manufacturer-table').DataTable({
                        "lengthChange": false,
                        data: data,
                        columns: [{
                                data: 'date',
                                title: 'Date'
                            },
                            {
                                data: 'vendor_id',
                                title: 'ID'
                            },
                            {
                                data: 'name',
                                title: 'Vendor Name'
                            },
                            {
                                data: 'tValues',
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

                }
            });
        }

        function GetDataAll() {
            if ($.fn.DataTable.isDataTable('#manufacturer-table')) {
                $('#manufacturer-table').DataTable().destroy();
            }
            $.ajax({
                url: "functions.php",
                type: "POST",
                data: {
                    function: "GetManufacturerReportDataAll",
                },
                success: function(data) {

                    data = JSON.parse(data);
                    var table = $('#manufacturer-table').DataTable({
                        "lengthChange": false,
                        data: data,
                        columns: [{
                                data: 'date',
                                title: 'Date'
                            },
                            {
                                data: 'vendor_id',
                                title: 'ID'
                            },
                            {
                                data: 'name',
                                title: 'Vendor Name'
                            },
                            {
                                data: 'tValues',
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
                    // CalculateTotal();
                }
            });
        }

        $(document).ready(function() {
            GetDataAll();
            GetDataAllP();
            GetDataIssued();
            GetVendorData();

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
                    type: "manufacturer"
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
                        "lengthChange": false,
                        data: data,
                        columns: [{
                                data: 'date',
                                title: 'Date'
                            },
                            {
                                data: 'ID',
                                title: 'id'
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
                    // CalculateTotal();
                }
            });
        }

        function GetDataAllP() {
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
                        "lengthChange": false,
                        data: data,
                        columns: [{
                                data: 'date',
                                title: 'Date'
                            },
                            {
                                data: 'vendor_id',
                                title: 'Id'
                            },
                            {
                                data: 'name',
                                title: 'Vendor Name'
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
                    // CalculateTotal();
                }
            });
        }

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

        function GetDataIssued() {
            $.ajax({
                url: "functions.php",
                type: "POST",
                data: {
                    function: "GetStoneSetterIssued"
                },
                success: function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    console.log("stone",data);
                    var table = $('#product-tabless').DataTable({
                        "lengthChange": false,
                        data: data,
                        columns: [{
                                data: 'date',
                                title: 'Date'
                            },
                            {
                                data: 'product_id',
                                title: 'Product ID'
                            },
                            {
                                data: 'name',
                                title: 'Name'
                            },
                            {
                                data: 'Issued_weight',
                                title: 'Issued Weight'
                            },
                            {
                                data: 'received_weight',
                                title: 'Received Weight'
                            },
                            {
                                data: 'payable',
                                title: 'Payable'
                            },

                        ],
                        responsive: true
                    });


                }
            });
        }

        function GetVendorData(vendor_id) {
            if ($.fn.DataTable.isDataTable('#vendor-table')) {
                $('#vendor-table').DataTable().destroy();
            }
            $.ajax({
                url: "functions.php",
                type: "POST",
                data: {
                    function: "GetVendorData",
                    id: vendor_id
                },
                success: function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    var table = $('#vendor-table').DataTable({
                        "lengthChange": false,
                        data: data,
                        columns: [{
                                data: 'date',
                                title: 'Date'
                            },
                            {
                                data: 'id',
                                title: 'ID'
                            },
                            {
                                data: 'name',
                                title: 'Vendor Name'
                            },

                        ]
                    });
                    // CalculateTotal();
                }
            });
        }
    </script>

</body>

</html>