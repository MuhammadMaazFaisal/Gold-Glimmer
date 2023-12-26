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
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card ">
                                <div class="card-header card border border-danger">
                                    <h4 class="card-title">
                                        PURCHASING
                                    </h4>
                                </div>
                                <div class="col d-flex justify-content-end me-4">
                                    <button type="button" onclick="DeletePurchasing()" class="btn btn-danger me-3" id="delete-product" disabled>Delete Invoice</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-modal">
                                        Select Invoice
                                    </button>
                                </div>
                                <div class="card-body px-4 ">
                                    <div class="row">
                                        <div class="col-lg-12 ms-lg-auto ">
                                            <div class="mt-4 mt-lg-0">


                                                <form id="form" method="POST" enctype="multipart/form-data">
                                                    <div class="row mb-4 justify-content-between">
                                                        <div class="col-sm-3">

                                                            <select id="select-manufacturer" class="vendor" name="vendor_id" placeholder="Pick a vendor..." required>
                                                                <option value="">Select a vendor...</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">

                                                            <input type="text" name="invoice" id="invoice" class="form-control" placeholder="Invoice" readonly required>
                                                        </div>


                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Detail</th>
                                                                    <th>Type</th>
                                                                    <th colspan="2">Price Per</th>
                                                                    <th scope="col">Quantity</th>
                                                                    <th scope="col">Weight</th>
                                                                    <th scope="col">Rate</th>
                                                                    <th scope="col">Total Amount</th>
                                                                    <th scope="col">Barcode</th>
                                                                    <th scope="col">Action</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody">
                                                                <tr>
                                                                    <td scope="row">1</td>
                                                                    <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                                                                    <td> <select id="type_id[]" class="type" name="type_id[]" placeholder="Type">
                                                                            <option value="">Type</option>

                                                                        </select>
                                                                        <input type="hidden" id="id" name="id" value="">
                                                                    </td>
                                                                    <td colspan="2"><select class="form-control price_per" id="price_per[]" name="price_per[]" placeholder="Price per">
                                                                            <option value="">Select price per</option>
                                                                            <option value="Qty">Qty</option>
                                                                            <option value="Tola">Tola</option>
                                                                            <option value="K">K</option>

                                                                        </select></td>
                                                                    <td> <input type="number" value="" id="quantity[]" name="quantity[]" class="form-control" placeholder="Quantity"></td>
                                                                    <td> <input type="number" step="any" value="" id="weight[]" name="weight[]" class="form-control" placeholder="Weight"></td>
                                                                    <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control" placeholder="Rate" required></td>
                                                                    <td><input type="number" step="any" value="" id="total[]" name="total[]" class="form-control" placeholder="Total" onchange="GrandTotal()" required></td>
                                                                    <td><input id="barcode[]" name="barcode[]" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly></td>
                                                                    <td><button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="GenerateBarcode(this)">B/C</button></td>
                                                                    <td><i onclick="AddProduct()" class="fa fa-plus-circle fa-1x p-3"></i></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="row mb-4 d-flex justify-content-end">
                                                            <div class="d-flex justify-content-end col-sm-2 ">

                                                                <input type="text" id="grand_total" name="grand_total" class="form-control " placeholder="Grand Total" readonly required>
                                                            </div>

                                                        </div>

                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-success me-2">Print</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
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

    <div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="product-table" class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice ID</th>
                                <th scope="col">Vendor ID</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
    function DeletePurchasing() {
        var product = document.getElementById('invoice');
        if (product.value == '') {
            alert('Please Select Invoice');
        } else {
            $.ajax({
                url: "functions.php",
                method: "POST",
                data: {
                    function: "DeletePurchasing",
                    id: product.value
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status == 'success') {
                        location.reload();
                    }
                }
            });
        }
    }

    function AddProduct() {

        let area = document.getElementById('tbody');
        let tr = document.createElement('tr');
        tr.innerHTML = `<th scope="row">1</th>
        <td class="d-none"> <input type="text"  id="id[]" name="id[]" value="" placeholder="id" class="form-control d-none"></td>
                            <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                            <td> <select id="type_id[]" class="type" name="type_id[]">
    <option value="" disabled selected>Type</option>
    <!-- Add your options here -->
    <option value="">Option 1</option>
    <option value="">Option 2</option>
    <!-- etc. -->
</select>

                                                            <input type="hidden" id="id" name="id" value=""></td>
                            <td colspan="2"><select class="form-control" id="price_per[]" name="price_per[]" placeholder="Price per">
                                    <option value="">Select price per</option>
                                    <option value="Qty">Qty</option>
                                    <option value="Tola">Tola</option>
                                    <option value="K">K</option>
                                </select></td>
                            <td> <input type="number" value="" id="quantity[]" name="quantity[]" class="form-control" placeholder="Quantity" ></td>
                            <td> <input type="number" step="any" value="" id="weight[]" name="weight[]" class="form-control" placeholder="Weight" ></td>
                            <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control" placeholder="Rate" required></td>
                            <td><input type="number" step="any" value="" id="total[]" name="total[]" class="form-control" placeholder="Total" required></td>
                            <td><input id="barcode[]" name="barcode[]" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly></td>
                            <td><button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="GenerateBarcode(this)">B/C</button></td>
                        <td><i onclick="DeleteProduct(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>`;
        area.appendChild(tr);
        type_id = tr.querySelectorAll("select[name='type_id[]']");
        select = $(type_id).selectize()[0].selectize;
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetAllTypes",
                type: "vendor"
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    var newOption = {
                        value: data[i].id,
                        text: data[i].barcode + " | " + data[i].name
                    };
                    select.addOption(newOption);
                }
                select.on('change', function(value) {
                    GetType(type_id[0]);

                });

            }
        });

        AddEventListeners();

    }

    function DeleteProduct(e) {
        e.parentNode.parentNode.remove();
    }

    function GrandTotal() {
        total = document.querySelectorAll('#total\\[\\]');
        let grand_total = 0;
        for (let i = 0; i < total.length; i++) {
            grand_total += parseInt(total[i].value);
        }
        document.getElementById('grand_total').value = grand_total;
    }

    function GenerateBarcode(btn) {
        unique = Math.floor(new Date().getTime() + Math.random());
        if (btn.parentNode.previousElementSibling.children[0].value == "") {
            btn.parentNode.previousElementSibling.children[0].value = unique;
        } else {
            btn.parentNode.previousElementSibling.children[0].value = "";
        }

    }

    function CalculateTotal(i) {
        price_per = document.querySelectorAll('#price_per\\[\\]')[i];
        qty = document.querySelectorAll('#quantity\\[\\]')[i];
        weight = document.querySelectorAll('#weight\\[\\]')[i];
        rate = document.querySelectorAll('#rate\\[\\]')[i];
        total = document.querySelectorAll('#total\\[\\]')[i];
        if (price_per.value == "K") {
            total.value = (weight.value * rate.value * 5).toFixed(0);
            GrandTotal();
        } else if (price_per.value == "Tola") {
            total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            GrandTotal();
        } else if (price_per.value == "Qty") {
            total.value = (qty.value * rate.value).toFixed(0);
            GrandTotal();
        }
    }

    function GetProductId(btn) {
        var id = btn.parentNode.parentNode.id;
        var vendor_id = btn.parentNode.parentNode.children[2].innerHTML;
        var total = btn.parentNode.parentNode.children[4].innerHTML;
        $('#product-modal').modal('hide');
        var product = document.getElementById("invoice");
        product.value = id;
        GetPurchasingDetails(id, vendor_id, total);
    }

    function GetPurchasingDetails(id, vendor_id, total) {
        var delete_btn = document.getElementById("delete-product");
        delete_btn.disabled = false;
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetPurchasingDetails",
                id: id
            },
            success: function(data) {
                var data = JSON.parse(data);
                var area = document.getElementById('tbody');
                area.innerHTML = "";
                let GrandTotal = document.getElementById('grand_total');
                GrandTotal.value = total;
                var select_manufacturer = $('#select-manufacturer')[0].selectize;
                select_manufacturer.setValue(vendor_id);
                for (i = 0; i < data.length; i++) {
                    let tr = `<tr>
                                <td scope="row">1</td>
                                <td class="d-none"> <input type="text"  id="id[]" name="id[]" value="${data[i].id}" placeholder="id" class="form-control d-none"></td>
                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details">${data[i].detail}</textarea></td>
                                <td> <select id="type_id[]" class="type" name="type_id[]" placeholder="Type">
                                                                <option value="">Type</option>

                                                            </select>
                                                            <input type="hidden" id="id" name="id" value=""></td>
                                <td colspan="2"><select class="form-control price_per" id="price_per[]" name="price_per[]" placeholder="Price per">`;
                    if (data[0].price_per == "Qty") {
                        tr += `<option value="Qty" selected>Qty</option>
                                        <option value="Tola">Tola</option>
                                        <option value="K">K</option>`;
                    } else if (data[0].price_per == "Tola") {
                        tr += `<option value="Qty">Qty</option>
                                        <option value="Tola" selected>Tola</option>
                                        <option value="K">K</option>`;
                    } else if (data[0].price_per == "K") {
                        tr += `<option value="Qty">Qty</option>
                                        <option value="Tola">Tola</option>
                                        <option value="K" selected>K</option>`;
                    }
                    tr += `</select></td>
                                <td> <input type="number"  id="quantity[]" name="quantity[]" value="${data[i].quantity}" class="form-control" placeholder="Quantity"></td>
                                <td> <input type="number" step="any"  id="weight[]" name="weight[]" value="${data[i].weight}" class="form-control" placeholder="Weight"></td>
                                <td><input type="number" step="any"  id="rate[]" name="rate[]" value="${data[i].rate}" class="form-control" placeholder="Rate" required></td>
                                <td><input type="number" step="any"  id="total[]" name="total[]" value="${data[i].total_amount}" class="form-control" placeholder="Total" onchange="GrandTotal()" required></td>
                                <td><input id="barcode[]" name="barcode[]" value="${data[i].barcode}" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly></td>
                                <td><button class="btn btn-outline-secondary" type="button" id="button-addon1" onclick="GenerateBarcode(this)">B/C</button></td>`;
                    if (i == 0) {
                        tr += `<td><i onclick="AddProduct()" class="fa fa-plus-circle fa-1x p-3"></i></td>`;
                    } else {
                        tr += `<td><i onclick="DeleteProduct(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>`
                    }
                    tr += `</tr>`;
                    area.innerHTML += tr;
                }
                AddEventListeners();
            }
        });
    }

    function AddEventListeners() {
        $('select').selectize({
            sortField: 'text'
        });
        price_per = document.querySelectorAll('#price_per\\[\\]');
        weight = document.querySelectorAll('#weight\\[\\]');
        qty = document.querySelectorAll('#quantity\\[\\]');
        rate = document.querySelectorAll('#rate\\[\\]');
        price_per.forEach((e, i) => {
            selectize = $(e).selectize()[0].selectize;
            selectize.on('change', function() {
                CalculateTotal(i);
            });
        });
        for (let i = 0; i < price_per.length; i++) {
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

    }


    $(document).ready(function() {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetModalInvoices"
            },
            success: function(data) {
                var data = JSON.parse(data);
                var tbody = document.getElementById("product-table-body");
                for (var i = 0; i < data.length; i++) {
                    var tr = document.createElement("tr");
                    var td1 = document.createElement("td");
                    var td2 = document.createElement("td");
                    var td3 = document.createElement("td");
                    var td4 = document.createElement("td");
                    var td4_1 = document.createElement("td");
                    var td5 = document.createElement("td");
                    var td6 = document.createElement("td");
                    var btn = document.createElement("button");
                    btn.innerHTML = "Select";
                    btn.className = "btn btn-primary";
                    btn.addEventListener("click", function() {
                        GetProductId(this);
                    });
                    tr.id = data[i].id;
                    td1.innerHTML = i + 1;
                    td2.innerHTML = data[i].id;
                    td3.innerHTML = data[i].vendor_id;
                    td4.innerHTML = data[i].name;
                    td4_1.innerHTML = data[i].total;
                    date = data[i].date;
                    const inputDateStr = data[i].date;
                    const inputDate = new Date(inputDateStr);
                    const day = inputDate.getDate().toString().padStart(2, '0');
                    const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
                    const year = inputDate.getFullYear();
                    const formattedDate = `${day}-${month}-${year}`;
                    td5.innerHTML = formattedDate;
                    td6.classList.add("p-1");
                    td6.appendChild(btn);
                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    tr.appendChild(td4_1);
                    tr.appendChild(td5);
                    tr.appendChild(td6);
                    tbody.appendChild(tr);
                };
            }
        });

        AddEventListeners();

        $.ajax({
            url: "functions.php",
            type: "POST",
            data: {
                function: "GetPurchasingCount"
            },
            success: function(data) {
                data = JSON.parse(data);
                document.getElementById('invoice').value = data;
            }
        });

        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetAllVendorData",
                type: "vendor"
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                var select = $('#select-manufacturer')[0].selectize;
                for (var i = 0; i < data.length; i++) {
                    var newOption = {
                        value: data[i].id,
                        text: data[i].id + " | " + data[i].name
                    };
                    select.addOption(newOption);
                }

            }

        });
        $('select').selectize({
            sortField: 'text'
        });

    });

    $("#form").submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append('function', 'AddPurchasing');
        $.ajax({
            url: "functions.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                console.log(data);
                if (data[0] == "success" && data[1] == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Purchasing Added Successfully',
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

    function GetType(element) {
        console.log("sada",element);
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetDetailType",
                id: element.value
            },
            success: function(response) {
                var data = JSON.parse(response);
                var tr = element.parentNode.parentNode;
                price_per = tr.querySelectorAll("select[name='price_per[]']");
                selectizeInstance = $(price_per).selectize()[0].selectize;
                selectizeInstance.setValue(data.price_per);
                tr.querySelectorAll("input[name='rate[]']")[0].value = data.rate;
                tr.querySelectorAll("input[name='barcode[]']")[0].value = data.barcode;
            }
        });
    }

    $(document).ready(function() {


        // $(document).on('change', '#type_id', function(e) {
        //     e.preventDefault();

        //     GetType(this);
        //     console.log("123123",this)
        // });

        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetAllTypes",
                type: "vendor"
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                type_id = document.querySelectorAll("select[name='type_id[]']");
                select = $(type_id).selectize()[0].selectize;
                for (var i = 0; i < data.length; i++) {
                    var newOption = {
                        value: data[i].id,
                        text: data[i].barcode + " | " + data[i].name
                    };
                    select.addOption(newOption);
                }
                select.on('change', function(value) {
                    GetType(type_id[0]);

                });

            }
        });

    });

    $('select').selectize({
        sortField: 'text'
    });
</script>