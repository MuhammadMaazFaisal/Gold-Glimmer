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
                        <div class="row mb-2">
                            <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">Vendor:</label>
                            <div class="col-sm-3">

                                <select id="select-vendor" placeholder="Pick a vendor...">
                                    <option value="">Select a vendor...</option>

                                </select>
                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header card border border-danger">
                                <h4 class="card-title">
                                    ADDITIONAL VENDOR DEPARTMENT
                                </h4>

                            </div>
                            <div class="card-body p-4 ">

                                <div class="row">

                                    <div class="col-lg-12 ms-lg-auto ">
                                        <div class="mt-4 mt-lg-0">


                                            <form id="form" method="POST" enctype="multipart/form-data">
                                                <?php

                                                $randomNumber = random_int(0000000000, 669900000000);
                                                echo "<input type='hidden' name='barcode' value='$randomNumber' class='form-control'>";
                                                ?>
                                                <div class="row mb-4">
                                                    <label for="date" class="ps-md-4 col-sm-1 col-form-label">Date:</label>
                                                    <div class="col-sm-5">

                                                        <input type="date" id="date" name="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">

                                                    <label for="name" class="ps-md-4 col-sm-1 col-form-label">Name:</label>
                                                    <div class="col-sm-5">

                                                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="Name" required>
                                                    </div>


                                                    <label for="id" class="ps-md-5 col-sm-1 col-form-label">Id:</label>

                                                    <div class="col-sm-5">


                                                        <input type="text" name="id" id="id" value="" class="form-control" placeholder="Id" readonly>

                                                    </div>
                                                </div>

                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9 d-flex justify-content-end me-4">


                                                        <button type="button" id="delete" class="btn btn-danger px-3 me-3 disabled" onclick="Delete()">Delete</button>
                                                        <button type="submit" class="btn btn-success px-4">Save</button>

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

    <script>
        function GetValue(id) {
            var delete1 = document.getElementById("delete");
            $.ajax({
                url: "functions.php",
                method: "POST",
                data: {
                    function: "GetVendor",
                    id: id
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    delete1.classList.remove("disabled");
                    document.getElementById("id").value = data[0].id;
                    document.getElementById("name").value = data[0].name;
                    document.getElementById("name").readOnly = true;
                }
            });
        }

        function Delete() {
            var id = document.getElementById("id").value;
            $.ajax({
                url: "functions.php",
                method: "POST",
                data: {
                    function: "VendorDelete",
                    id: id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data[0] == "success") {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Vendor Deleted Successfully',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "vendor.php";
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                }
            });
        }

        function getInitials() {
            var fullName = document.getElementById("name").value;
            const words = fullName.trim().split(" ");

            for (let i = 0; i < words.length; i++) {
                words[i] = words[i][0].toUpperCase() + words[i].slice(1);
            }

            // join the capitalized words back into a single string
            const capitalizedFullName = words.join(" ");
            document.getElementById("name").value = capitalizedFullName;

            var nameParts = fullName.split(" ");
            var initials = "";
            for (var i = 0; i < nameParts.length; i++) {
                if (nameParts[i]) {
                    initials += nameParts[i].charAt(0);
                }
            }
            $.ajax({
                url: "functions.php",
                method: "POST",
                data: {
                    function: "VendorCount"
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    var code = data[0];
                    document.getElementById("id").value = initials.toUpperCase() + code;

                }
            })

        }
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
            $.ajax({
                url: "functions.php",
                method: "POST",
                data: {
                    function: "GetAllVendorData",
                    type: "vendor"
                },
                success: function(response) {
                    console.log(response)
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
            })


            var date = new Date().toISOString().slice(0, 10);
            var dataInputs = document.querySelectorAll('input[type="date"]');
            for (let i = 0; i < dataInputs.length; i++) {
                dataInputs[i].value = date;
            }
        });
        $(document).on('blur', '#name', function(e) {
            e.preventDefault();
            getInitials();
        });

        $(document).on('change', '#select-vendor', function(e) {
            e.preventDefault();
            GetValue($(this).val());
        });

        var form = document.getElementById("form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var select = $('#select-vendor')[0].selectize;
            var id1 = select.getValue();
            var id = document.getElementById("id").value;
            if (id1 === id) {
                var data = new FormData(form);
                data.append("function", "UpdateVendor");
                data.append("type", "vendor");
                data.append("18k", '0');
                data.append("21k", '0');
                data.append("22k", '0');
                $.ajax({
                    url: "functions.php",
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data[0] == "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Vendor Updated Successfully',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "vendor.php";
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something Went Wrong',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                })
            } else {

                var data = new FormData(form);
                data.append("function", "AddVendor");
                data.append("type", "vendor");
                data.append("18k", '0');
                data.append("21k", '0');
                data.append("22k", '0');
                $.ajax({
                    url: "functions.php",
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response)
                        var data = JSON.parse(response);
                        if (data[0] == "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Vendor Added Successfully',
                                icon: 'success',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "vendor.php";
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Something Went Wrong',
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            })
                        }
                    }
                })
            }
        });
    </script>




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