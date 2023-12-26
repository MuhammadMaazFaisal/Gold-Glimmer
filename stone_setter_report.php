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
                                        Stone Setter Report
                                    </h4>

                                </div>
                                <div class="card-body px-4 ">

                                    <div class="row">

                                        <div class="col-lg-12 ms-lg-auto ">
                                            <div class="mt-4 mt-lg-0 table-responsive">

                                                <table id="product-table1" class="table table-hover">
                                                    <thead class="table-dark">
                                                    </thead>
                                                    <tbody id="tbody1">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- <div class="row">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-success waves-effect waves-light mt-3" onclick="PrintAdditional()">Print</button>
                                        </div>
                                    </div> -->
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
    // function PrintAdditional() {

    //  			$.ajax({
    //  				url: "functions.php",
    //  				type: "POST",
    //  				data: {
    //  					function: "PrintAdditional",
    //  				},
    //  				success: function(data) {
    //                     console.log(data);
    //  					data = JSON.parse(data);
    //  					console.log(data);
    //  					let printWindow = window.open("", "_blank");


    //  					// Generate slip content
    //  					let slipContent = `
    //                 <!DOCTYPE html>
    //                 <html>
    //                 <head>
    //                 <style>
    //                     @media print {
    //                         @page {
    //                             size: 80mm 200mm;
    //                             margin: 0;
    // 							margin-top:-20px;
    //                         }

    //                         body {
    //                             font-family: Arial, sans-serif;
    //                             font-size: 12px;
    //                             padding: 10px;
    //                         }

    //                         h1 {
    //                             font-size: 16px;
    //                             text-align: center;
    //                             margin: 10px 0;
    //                             color: #333;
    //                         }

    //                         p {
    //                             margin-bottom: 5px;
    //                         }

    //                         .label {
    //                             font-weight: bold;
    //                         }
    //                     }
    //                 </style>
    //                 </head>
    //                 <body>
    //                 <p><span class="label" style="margin-right:6px;">Date:</span><span>${data[0].date_created}</span></p>
    //                 <p><span class="label" style="margin-right:6px;">Barcode</span><span>:${data[0].product_id}</span></p>
    //                 <p><span class="label" style="margin-right:6px;">Name:</span><span>${data[0].vendor_id} | ${data[0].vendor_name}</span></p>
    //                 <p><span class="label" style="margin-right:6px;">Weight</span><span>:${data[0].Issued_weight}</span></p>
    // 				<svg id="barcode"></svg>
    // 				<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.js" integrity="sha512-wkHtSbhQMx77jh9oKL0AlLBd15fOMoJUowEpAzmSG5q5Pg9oF+XoMLCitFmi7AOhIVhR6T6BsaHJr6ChuXaM/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"><\/script>
    // 				<script>
    //             // Function to render barcode
    //             function renderBarcode() {
    //                 const barcodeElement = document.getElementById("barcode");
    //                 if (barcodeElement) {
    //                     JsBarcode(barcodeElement, "${data[0].product_id}", {
    //                         format: "CODE128",
    //                         width: 2,
    //                         height: 50,
    //                     });
    //                     window.print();
    //                 } else {
    //                     // Barcode element not found, retry after a short delay
    //                     setTimeout(renderBarcode, 100);
    //                 }
    //             }

    //             // Start rendering barcode
    //             renderBarcode();
    //         <\/script>
    //     </body>
    //     </html>
    //             `;

    //  					// Write slip content to the new tab
    //  					printWindow.document.open();
    //  					printWindow.document.write(slipContent);
    //  					printWindow.print();
    //  					printWindow.document.close();


    //  				}
    //  			});
    //  		}

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
                console.log(data);
                var table = $('#product-table1').DataTable({
                    data: data,
                    columns: [{
                            data: 'product_id',
                            title: 'Product ID'
                        },
                        {
                            data: 'name',
                            title: 'Name'
                        },
                        // {
                        //     data: 'type',
                        //     title: 'Type'
                        // },
                        {
                            data: 'z_total_weight',
                            title: 'Total Zircon Weight'
                        },
                        {
                            data: 's_total_weight',
                            title: 'Total Stone Weight'
                        },
                        {
                            data: 'grand_weight',
                            title: 'Grand Total Weight'
                        },
                        {
                            data: 'received_weight',
                            title: 'Returned Weight'
                        },
                        {
                            data: 'rate',
                            title: 'Rate'
                        },
                        {
                            data: 'stone_quantity',
                            title: 'Stone Quantity'
                        },
                        {
                            data: 'wastage',
                            title: 'Wastage'
                        },
                        {
                            data: 'grand_weight',
                            title: 'Grand Total'
                        },
                        {
                            data: 'payable',
                            title: 'Payable'
                        },
                        {
                            data: 'date',
                            title: 'Date'
                        },



                    ],
                    responsive: true
                });


            }
        });
    }

    // function GetDataReceived() {
    //     $.ajax({
    //         url: "functions.php",
    //         type: "POST",
    //         data: {
    //             function: "GetStoneSetterReceived"
    //         },
    //         success: function(data) {
    //             console.log(data);
    //             data = JSON.parse(data);
    //             console.log(data);
    //             var table = $('#product-table1').DataTable({
    //                 data: data,
    //                 columns: [{
    //                         data: 'product_id',
    //                         title: 'Product ID'
    //                     },
    //                     // {
    //                     //     data: 'name',
    //                     //     title: 'Name'
    //                     // },

    //                     {
    //                         data: 'received_weight',
    //                         title: 'Returned Weight'
    //                     },
    //                     {
    //                         data: 'rate',
    //                         title: 'Rate'
    //                     },
    //                     {
    //                         data: 'stone_quantity',
    //                         title: 'Stone Quantity'
    //                     },
    //                     {
    //                         data: 'wastage',
    //                         title: 'Wastage'
    //                     },
    //                     {
    //                         data: 'grand_weight',
    //                         title: 'Grand Total'
    //                     },
    //                     {
    //                         data: 'payable',
    //                         title: 'Payable'
    //                     },
    //                     {
    //                         data: 'date',
    //                         title: 'Date'
    //                     },



    //                 ],
    //                 responsive: true
    //             });


    //         }
    //     });
    // }

    $(document).ready(function() {
        GetDataIssued();
        // GetDataReceived();
    });
</script>