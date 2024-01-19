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

					<div class="col-xl-12">


						<div class="row">
							<div class="col-lg-12">

								<div class="card ">
									<div class="card-header card border border-info">

										<h4 class="card-title">
											Create Order


										</h4>

									</div>
									<!-- <div class="col d-flex justify-content-end me-4">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="SelectMetal()" data-bs-target="#product-modal">
											Show History
										</button>
									</div> -->
									<div class="card-body p-4 ">


										<div class="row">

											<div class="col-lg-12 ms-lg-auto ">

												<div class="mt-4 mt-lg-0">


													<form id="form" method="POST" enctype="multipart/form-data">
														<?php
														$randomgold = random_int(0000000000, 929900000000);
														echo "<input type='hidden' name='goldbarcode' value='$randomgold' class='form-control'>";
														?>
														<input style="display: none;" type="number" step="any" name="product_id" id="product_id" class="form-control">
														<div class="row mb-4">
															<label for="date" class="col-sm-1 col-form-label">Date:</label>
															<div class="col-sm-4">
																<input type="date" name="date" id="date" class="form-control" placeholder="Date">
															</div>
															<label for="vendor" class="col-sm-2 col-form-label text-end">Manufacturer:</label>
															<div class="col-sm-5">
																<select id="vendor" name="vendor" required class="form-control form-select"></select>
															</div>
														</div>
														<h4 class="mb-4">
															Gold Details
														</h4>
														<div class="row mb-4">
															<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Participent:</label>
															<div class="col-sm-4">
																<select required="" name="participent" id="participent" class="form-control form-select" placeholder="Participent" required>
																	<option value="">Please Select Participent
																	</option>
																</select>
															</div>
															<label for="horizontal-firstname-input" class="col-sm-2 col-form-label d-flex justify-content-end">Total Weight:</label>
															<div class="col-sm-5">

																<input type="number" step="any" name="total_weight" id="total_weight" class="form-control" placeholder="Total Weight" required>
															</div>
															<h4 class="my-4">
																Product Details
															</h4>
															<div class="product-container">
																<div class="product">
																	<h6>
																		Product 1
																	</h6>
																	<div class="row mb-4">
																		<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Type:</label>
																		<div class="col-sm-3">

																			<select required="" name="type[]" id="type" class="form-control form-select">
																				<option>Select Type</option>
																				<option value="Set">Set</option>
																				<option value="Tops">Tops</option>
																				<option value="Ring">Ring</option>
																				<option value="Braclet">Braclet</option>
																				<option value="Safety Chain">Safety Chain
																				</option>
																				<option value="Clip">Clip</option>
																				<option value="Kariyan">Kariyan</option>
																				<option value="Locket">Locket</option>
																				<option value="Locket Set">Locket Set
																				</option>
																				<option value="Bangles">Bangles</option>
																				<option value="Kara">Kara</option>
																				<option value="Bindia">Bindia</option>
																				<option value="Kara + Locket set">Kara +
																					Locket set</option>
																				<option value="Order">Order</option>
																				<option value="Latkan">Latkan</option>
																				<option value="Bangles Set">Bangles Set
																				</option>
																				<option value="Set+ring">Set+ring</option>
																				<option value="Repairing">Repairing
																				</option>
																				<option value="Natt">Natt</option>
																				<option value="Cap">Cap</option>
																				<option value="Polish paid">Polish paid
																				</option>
																				<option value="Jhumar">Jhumar</option>
																			</select>
																		</div>
																		<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
																		<div class="col-sm-2">

																			<input type="number" value="" id="quantity" name="quantity[]" class="form-control" placeholder="QTY" required>
																		</div>
																		<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
																		<div class="col-sm-3">
																			<select required="" name="purity" id="select-manufacturer-purity" class="form-control form-select" placeholder="Purity" required>
																				<option value="">Please Select Purity
																				</option>
																				<option value="18k">18k</option>
																				<option value="21k">21k</option>
																				<option value="22k">22k</option>
																			</select>
																		</div>
																		<div class="col-sm-1">

																			<i onclick="Add(this)" class="fa fa-plus-circle p-2"></i>
																		</div>
																	</div>
																	<div class="row mb-4">
																		<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight:</label>
																		<div class="col-sm-3">

																			<input type="number" step="any" name="weight[]" value="" id="weight" class="form-control" placeholder="Weight" required>
																		</div>
																		<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Dimensions:</label>
																		<div class="col-sm-2">

																			<input type="text" step="any" name="dimensions[]" id="dimensions" value="" class="form-control" placeholder="Dimensions" required>
																		</div>
																		<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Image
																			Upload:</label>
																		<div class="col-sm-3">

																			<input type="file" id="image[]" name="image[]" value="" class="form-control" accept="image/*">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="row mb-4 d-flex justify-content-end">
															<button type="submit" name="submit" class="btn btn-primary col-2">Save</button>
														</div>
													</form>


												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
						<!-- end card -->

					</div>
				</div>
				<!-- End Page-content -->






				<?php include 'layouts/footer.php'; ?>
				<!-- Modal -->
				<div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">History</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="col-4">
									<select name="modal-select" id="modal-select"></select>
								</div>

								<table id="product-table" class="table table-hover ">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Product ID</th>
											<th scope="col">Vendor ID</th>
											<th scope="col">Vendor Name</th>
											<th scope="col">Issued Weight</th>
											<th scope="col">Purity</th>
											<th scope="col">Pure Weight</th>
											<th scope="col">Date</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody id="product-table-body">

									</tbody>
								</table>
							</div>
							<div id="input-div" class="row d-none">
								<div class="col-3">
									<label for="total_issued_weight" class="form-label">Total Pure Weight:</label>
								</div>
								<div class="col-3">
									<input type="number" step="any" id="total_pure_weight" class="form-control" placeholder="Total Pure Weight">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
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
			$(document).ready(function() {
				GetDate();
				$('#vendor').selectize({
					sortField: 'text'
				});
				$('#participent').selectize({
					sortField: 'text'
				});
				$.ajax({
					url: "functions.php",
					method: "POST",
					data: {
						function: "GetAllVendorData",
						type: "manufacturer"
					},
					success: function(response) {
						var data = JSON.parse(response);
						console.log(data);

						var select = $('#vendor')[0].selectize;
						for (var i = 0; i < data.length; i++) {
							var newOption = {
								value: data[i].id,
								text: data[i].id + " | " + data[i].name
							};
							select.addOption(newOption);
						}
						select.close();

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
						var data = JSON.parse(response);
						console.log(data);

						var p_select = $('#participent')[0].selectize;
						for (var i = 0; i < data.length; i++) {
							var newOption = {
								value: data[i].id,
								text: data[i].id + " | " + data[i].name
							};
							p_select.addOption(newOption);
						}
						p_select.close();

					}
				});
			});

			$('#form').submit(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				formData.append('function', 'CreateOrder');
				$.ajax({
					url: "functions.php",
					method: "POST",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						console.log(response);
						if (response == "success") {
							Swal.fire({
								icon: 'success',
								title: 'Order Created Successfully',
								showConfirmButton: false,
								timer: 1500
							}).then((result) => {
								location.reload();
							})
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

			function Add(e) {
				var product_container = document.querySelector('.product-container');
				var product = document.createElement('div');
				product.classList.add('product');
				product.innerHTML = `<h6>Product ${product_container.children.length+1}</h6>
				<div class="row mb-4">
					<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Type:</label>
					<div class="col-sm-3">
						<select required="" name="type[]" id="type" class="form-control form-select">
							<option>Select Type</option>
							<option value="Set">Set</option>
							<option value="Tops">Tops</option>
							<option value="Ring">Ring</option>
							<option value="Braclet">Braclet</option>
							<option value="Safety Chain">Safety Chain
							</option>
							<option value="Clip">Clip</option>
							<option value="Kariyan">Kariyan</option>
							<option value="Locket">Locket</option>
							<option value="Locket Set">Locket Set
							</option>
							<option value="Bangles">Bangles</option>
							<option value="Kara">Kara</option>
							<option value="Bindia">Bindia</option>
							<option value="Kara + Locket set">Kara +
								Locket set</option>
							<option value="Order">Order</option>
							<option value="Latkan">Latkan</option>
							<option value="Bangles Set">Bangles Set
							</option>
							<option value="Set+ring">Set+ring</option>
							<option value="Repairing">Repairing
							</option>
							<option value="Natt">Natt</option>
							<option value="Cap">Cap</option>
							<option value="Polish paid">Polish paid
							</option>
							<option value="Jhumar">Jhumar</option>
						</select>
					</div>
					<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
					<div class="col-sm-2">

						<input type="number" value="" id="quantity" name="quantity[]" class="form-control" placeholder="QTY" required>
					</div>
					<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">
						Purity:</label>
					<div class="col-sm-3">
						<select required="" name="purity" id="select-manufacturer-purity" class="form-control form-select" placeholder="Purity" required>
							<option value="">Please Select Purity
							</option>
							<option value="18k">18k</option>
							<option value="21k">21k</option>
							<option value="22k">22k</option>
						</select>
					</div>

					<div class="col-sm-1">

						<i onclick="Remove(this)" class="fa fa-minus-circle p-2"></i>
					</div>
				</div>
				<div class="row mb-4">
					<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight:</label>
					<div class="col-sm-3">

						<input type="number" step="any" name="weight[]" value="" id="weight" class="form-control" placeholder="Weight" required>
					</div>
					<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Dimensions:</label>
					<div class="col-sm-2">

						<input type="text" step="any" name="dimensions[]" id="dimensions" value="" class="form-control" placeholder="Dimensions" required>
					</div>
					<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Image
						Upload:</label>
					<div class="col-sm-3">

						<input type="file" id="image[]" name="image[]" value="" class="form-control" accept="image/*">
					</div>
				</div>`;
				product_container.appendChild(product);
			}

			function Remove(e) {
				var product_container = document.querySelector('.product-container');
				product_container.removeChild(e.parentNode.parentNode.parentNode);
				Rename();
			}

			function Rename() {
				var product_container = document.querySelector('.product-container');
				var products = product_container.querySelectorAll('.product');
				for (let i = 0; i < products.length; i++) {
					products[i].querySelector('h6').innerHTML = `Product ${i+1}`;
				}
			}

			function GetDate() {
				var date = new Date().toISOString().slice(0, 10);
				var dataInputs = document.querySelectorAll('input[type="date"]');
				for (let i = 0; i < dataInputs.length; i++) {
					if (dataInputs[i].id !== 'from-date' && dataInputs[i].id !== 'to-date') {
						dataInputs[i].value = date;
					}
				}
			}
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