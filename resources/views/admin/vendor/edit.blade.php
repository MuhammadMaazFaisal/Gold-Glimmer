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
                        MANUFACTURING DEPARTMENT
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
                                            <input type="text" name="name" id="name" value=""
                                                class="form-control" placeholder="Name" required>
                                        </div>
                                        <label for="id" class="ps-md-5 col-sm-1 col-form-label">Id:</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="id" id="id" value=""
                                                class="form-control" placeholder="Id" readonly>
                                        </div>
                                    </div>
                                    <h6>By Default</h6>
                                    <div class="ms-md-5">
                                        <div class="row mb-4 ms-md-3">
                                            <label for="18k" class="ps-md-5 col-sm-1 col-form-label">18k:</label>
                                            <div class="col-sm-5">
                                                <input type="number" name="18k" id="18k" step="any"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4 ms-md-3">
                                            <label for="21k" class="ps-md-5 col-sm-1 col-form-label">21k:</label>
                                            <div class="col-sm-5">
                                                <input type="number" name="21k" id="21k" step="any"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mb-4 ms-md-3">
                                            <label for="22k" class="ps-md-5 col-sm-1 col-form-label">22k:</label>
                                            <div class="col-sm-5">
                                                <input type="number" name="22k" id="22k" step="any"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9 d-flex justify-content-end me-4">
                                            <button type="button" id="delete"
                                                class="btn btn-danger px-3 me-3 disabled"
                                                onclick="Delete()">Delete</button>
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
