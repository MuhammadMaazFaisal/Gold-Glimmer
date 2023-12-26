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
</style>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php include 'layouts/vertical-menu.php'; ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <style>
                .hidden-row {
                    display: none;
                }
            </style>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card ">
                                <div class="card-header card border border-danger">
                                    <h4 class="card-title">
                                        Add Stock
                                    </h4>
                                </div>
                                <div class="card-body p-4 ">
                                    <div class="row">
                                        <div class="col-lg-12 ms-lg-auto ">
                                            <div class="mt-4 mt-lg-0">
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">S-Invoice:</label>
                                                    <div class="col-sm-2">
                                                        <input type="text" name="s-invoice" id="s-invoice" class="form-control" placeholder="S-Invoice" readonly>
                                                    </div>
                                                    <label for="select-type" class="col-sm-1 col-form-label d-flex justify-content-end">P-Invoice:</label>
                                                    <div class="col-sm-2">


                                                        <input type="text" name="invoice" id="invoice" class="form-control" placeholder="P-Invoice" readonly>
                                                    </div>
                                                    <label for="vendor_id" class="col-sm-1 col-form-label d-flex justify-content-end">Vendor Id:</label>
                                                    <div class="col-sm-2">

                                                        <input type="text" value="" id="vendor_id" name="vendor_id" class="form-control" placeholder="Vendor Id" readonly>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <button id="select-invoice" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#invoice-modal">
                                                            Select Invoice
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="stock" class="d-none col-lg-12 ms-lg-auto ">
                                            <div class="mt-4 mt-lg-0">
                                                <form id="stock-form" method="POST" enctype="multipart/form-data">
                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Detail</th>
                                                                    <th colspan="2">Type</th>
                                                                    <th colspan="2">Price Per</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Weight</th>
                                                                    <th scope="col">Rate</th>
                                                                    <th scope="col">Total Amount</th>
                                                                    <th scope="col">Barcode</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="e-tbody">

                                                            </tbody>
                                                        </table>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-success me-2">Print</button>
                                                            <button id="submit" type="submit" name="submit" class="btn btn-primary disabled">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card ">
                                <div class="card-header card border border-danger">
                                    <h4 class="card-title">
                                        Add Existing Stock
                                    </h4>
                                </div>
                                <div class="card-body p-4 ">
                                    <div id="existing_stock" class="col-lg-12 ms-lg-auto ">
                                        <div class="mt-4 mt-lg-0">
                                            <form id="existing-stock-form" method="POST" enctype="multipart/form-data">
                                                <div class="table-responsive">
                                                    <table class="table text-center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Detail</th>
                                                                <th colspan="2">Type</th>
                                                                <th colspan="2">Price Per</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Weight</th>
                                                                <th scope="col">Rate</th>
                                                                <th scope="col">Total Amount</th>
                                                                <th scope="col">Barcode</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="existing-tbody">
                                                            <tr>
                                                                <td scope="row">1</td>
                                                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                                                                <td colspan="2"><input type="text" class="form-control" id="type[]" name="type[]" value="" placeholder="Type"></td>
                                                                <td colspan="2"><select class="form-control price_per" id="e_price_per[]" name="price_per[]" placeholder="Price per">
                                                                        <option value="">Select price per</option>
                                                                        <option value="Qty">Qty</option>
                                                                        <option value="Tola">Tola</option>
                                                                        <option value="K">K</option>
                                                                    </select></td>
                                                                <td> <input type="number" placeholder="" id="quantity[]" name="quantity[]" class="form-control"></td>
                                                                <td> <input type="number" step="any" placeholder="" id="weight[]" name="weight[]" class="form-control"></td>
                                                                <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control"></td>
                                                                <td><input type="number" step="any" placeholder="" id="total[]" name="total[]" class="form-control"></td>
                                                                <td><input id="barcode[]" name="barcode[]" value="" type="text" class="form-control"></td>
                                                                <td><i onclick="AddStock()" class="fa fa-plus-circle fa-1x p-3"></i></td>

                                                                <td class="d-none"><input type="text " class="form-control" id="pd_id[]" name="pd_id[]" value="existing"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-success me-2">Print</button>
                                                        <button id="e-submit" type="submit" name="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </form>
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
    <!-- Modal -->
    <div class="modal fade" id="invoice-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="filter-form" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <label for="from-date" class="col-sm-1 col-form-label d-flex justify-content-end">From:</label>
                            <div class="col-sm-1">
                                <input type="date" name="from-date" id="from-date" class="form-control">
                            </div>
                            <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">To:</label>
                            <div class="col-sm-1">
                                <input type="date" name="to-date" id="to-date" class="form-control">
                            </div>
                            <label for="select-type" class="col-sm-1 col-form-label d-flex justify-content-end">Invoice:</label>
                            <div class="col-sm-2">
                                <input type="text" name="invoice" id="m-invoice" value="" class="form-control" placeholder="Invoice" readonly>
                            </div>
                            <label for="vendor_name" class="col-sm-1 col-form-label d-flex justify-content-end">Vendor:</label>
                            <div class="col-sm-2">
                                <input type="text" value="" id="vendor_name" name="vendor_name" class="form-control" placeholder="Vendor Id" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Vendor ID</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="modal-tbody">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
    function GetDate() {
        var date = new Date().toISOString().slice(0, 10);
        var dataInputs = document.querySelectorAll('input[type="date"]');
        for (let i = 0; i < dataInputs.length; i++) {
            dataInputs[i].value = date;
        }
    }

    function getFilteredData(form) {
        const fromDate = $("#from-date").val();
        const toDate = $("#to-date").val();

        if (fromDate > toDate) {
            alert("Start date cannot be greater than end date");
            return;
        }
        var formData = new FormData(form);
        formData.append("function", "GetFilterData");
        $.ajax({
            url: "get_data.php",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {}
        });
    }

    function GetInvoices() {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetInvoices"
            },
            success: function(response) {
                data = JSON.parse(response);
                tbody = document.getElementById("modal-tbody");
                for (i = 0; i < data.length; i++) {
                    date = data[i].date;
                    const inputDateStr = data[i].date;
                    const inputDate = new Date(inputDateStr);
                    const day = inputDate.getDate().toString().padStart(2, '0');
                    const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
                    const year = inputDate.getFullYear();
                    const formattedDate = `${day}-${month}-${year}`;
                    value = `<tr id="${data[i].id}">
                            <th scope="row">${i+1}</th>
                            <td>${data[i].id}</td>
                            <td>${data[i].vendor_id}</td>
                            <td>${data[i].name}</td>
                            <td>Rs ${data[i].total}</td>
                            <td>${formattedDate}</td>
                            <td>
                                <button type="button" onclick="SelectInvoice(this)" class="btn btn-primary" >
                                    Select
                            </td>
                        </tr>`
                    tbody.innerHTML += value;
                }
            }
        });
    }

    function SelectInvoice(btn) {
        invoice = btn.parentNode.parentNode.id;
        vendor_id = btn.parentNode.parentNode.children[2].innerHTML;
        $("#invoice-modal").modal("hide");
        document.getElementById("invoice").value = invoice;
        document.getElementById("vendor_id").value = vendor_id;
        document.getElementById("stock").classList.remove("d-none");
        GetProductDetails(invoice);

    }

    function GetProductDetails(invoice) {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetStockCount"
            },
            success: function(response) {
                response = JSON.parse(response);
                document.getElementById("s-invoice").value = response;
            }
        });

        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetProductDetails",
                id: invoice
            },
            success: function(response) {
                data = JSON.parse(response);
                tbody = document.getElementById("e-tbody");
                tbody.innerHTML = "";
                for (i = 0; i < data.length; i++) {
                    value = `<tr>
                                <td scope="row">1</td>
                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details">${data[i].detail}</textarea></td>
                                <td colspan="2"><input type="text" class="form-control" id="type[]" name="type[]" value="${data[i].type}" placeholder="Type" readonly></td>
                                <td colspan="2"><input type="text" class="form-control" id="price_per[]" name="price_per[]" value="${data[i].price_per}" readonly></td>
                                <td> <input type="number" placeholder="${data[i].remaining_quantity}" id="quantity[]" name="quantity[]" class="form-control"></td>
                                <td> <input type="number" step="any" placeholder="${data[i].remaining_weight}" id="weight[]" name="weight[]" class="form-control"></td>
                                <td><input type="number" step="any" value="${data[i].rate}" id="rate[]" name="rate[]" class="form-control" readonly></td>
                                <td><input type="number" step="any" placeholder="${data[i].remaining_total_amount}" id="total[]" name="total[]" class="form-control"></td>
                                <td><input id="barcode[]" name="stock_barcode[]" value="${data[i].barcode}" type="text" class="form-control" readonly></td>
                                <td><div class="pt-2 form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox[]">
                                </div></td>
                                
                                <td class="d-none"><input type="number" class="form-control" id="pd_id[]" name="pd_id[]" value="${data[i].id}" readonly></td>
                            </tr>`
                    tbody.innerHTML += value;
                }
                const checkbox = document.querySelectorAll('input[id="checkbox[]"]');
                for (let i = 0; i < checkbox.length; i++) {
                    checkbox[i].addEventListener("change", function() {
                        if (this.checked) {
                            GenerateBarcode(this);
                        }
                    });
                }
                AddEventListeners();

            }
        });
    }

    function GenerateBarcode(btn) {
        unique = Math.floor(new Date().getTime() + Math.random());
        if (btn.parentNode.parentNode.previousElementSibling.children[0].value === "") {
            btn.parentNode.parentNode.previousElementSibling.children[0].value = unique;
        }
        document.getElementById("submit").classList.remove("disabled");
    }

    function CalculateTotal(i) {
        price_per = document.querySelectorAll('#price_per\\[\\]')[i];
        e_price_per = document.querySelectorAll('#e_price_per\\[\\]')[i];
        qty = document.querySelectorAll('#quantity\\[\\]')[i];
        weight = document.querySelectorAll('#weight\\[\\]')[i];
        rate = document.querySelectorAll('#rate\\[\\]')[i];
        total = document.querySelectorAll('#total\\[\\]')[i];
        if (e_price_per != undefined) {
            if (e_price_per.value == "K") {
                total.value = (weight.value * rate.value * 5).toFixed(0);
            } else if (e_price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (e_price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }
        if (price_per != undefined) {
            if (price_per.value == "K") {
                total.value = (weight.value * rate.value * 5).toFixed(0);
            } else if (price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }
        s_invoice = document.getElementById("s-invoice").value;
        if (s_invoice != "") {
            if (price_per.value == "K") {
                total.value = (qty.value * rate.value * 5).toFixed(0);
            } else if (price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }

    }

    function AddEventListeners() {
        $('select').selectize({
            sortField: 'text'
        });
        price_per = document.querySelectorAll('#price_per\\[\\]');
        e_price_per = document.querySelectorAll('#e_price_per\\[\\]');
        weight = document.querySelectorAll('#weight\\[\\]');
        qty = document.querySelectorAll('#quantity\\[\\]');
        rate = document.querySelectorAll('#rate\\[\\]');
        for (let i = 0; i < price_per.length; i++) {
            price_per[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
            weight[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
            qty[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
            rate[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
        }
        for (let i = 0; i < e_price_per.length; i++) {
            $(document).on('change', e_price_per[i], function() {
                CalculateTotal(i);
            });
        }
    }

    function AddStock() {
        let area = document.getElementById('existing-tbody');
        let tr = document.createElement('tr');
        tr.innerHTML = `<tr>
                            <td scope="row">1</td>
                            <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                            <td colspan="2"><input type="text" class="form-control" id="type[]" name="type[]" value="" placeholder="Type"></td>
                            <td colspan="2"><select class="form-control price_per" id="e_price_per[]" name="price_per[]" placeholder="Price per">
                                    <option value="">Select price per</option>
                                    <option value="Qty">Qty</option>
                                    <option value="Tola">Tola</option>
                                    <option value="K">K</option>
                                </select></td>
                            <td> <input type="number" placeholder="" id="quantity[]" name="quantity[]" class="form-control"></td>
                            <td> <input type="number" step="any" placeholder="" id="weight[]" name="weight[]" class="form-control"></td>
                            <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control"></td>
                            <td><input type="number" step="any" placeholder="" id="total[]" name="total[]" class="form-control"></td>
                            <td><input id="barcode[]" name="barcode[]" value="${Math.floor(new Date().getTime() + Math.random())}" type="text" class="form-control"></td>
                            <td><i onclick="DeleteStock(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>

                            <td class="d-none"><input type="text" class="form-control" id="pd_id[]" name="pd_id[]" value="existing"></td>
                        </tr>`;
        area.appendChild(tr);
        AddEventListeners();
    }

    function DeleteStock(btn) {
        btn.parentNode.parentNode.remove();
    }

    $(document).ready(function() {
        GetDate();
        AddEventListeners();

        document.getElementById("barcode[]").value = Math.floor(new Date().getTime() + Math.random());

        $('select').selectize({
            sortField: 'text'
        });

        $("#from-date").change(function() {
            const fromDate = $(this).val();
            $("#to-date").attr("min", fromDate);
        });

        $(".clickable-row").click(function() {
            $(this).next(".hidden-row").toggle();
        });

        $("#select-invoice").click(GetInvoices());

    });

    $(document).on("submit", "#stock-form", function(e) {
        e.preventDefault();
        checkbox = document.querySelectorAll('input[id="checkbox[]"]');
        checkbox_values = [];
        for (let i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                checkbox_values.push(i);
            }
        }
        s_invoice = document.getElementById("s-invoice").value;
        p_id = document.getElementById("invoice").value;
        var formData = new FormData(this);
        formData.append("function", "AddStock");
        formData.append("checkbox_values", JSON.stringify(checkbox_values));
        formData.append("s_invoice", s_invoice);
        formData.append("p_id", p_id);
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                data = JSON.parse(response);
                if (data[0] == "success" && data[0] == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Stock Added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        });
    });

    $(document).on("submit", "#existing-stock-form", function(e) {
        e.preventDefault();
        form = new FormData(this);
        form.append("function", "AddExistingStock");
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: form,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                data = JSON.parse(response);
                if (data[0] == "success" && data[0] == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Stock Added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })

                }
            }
        });
    });
</script>