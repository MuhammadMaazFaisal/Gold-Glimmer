@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-2">
            <label for="horizontal-firstname-input"
                class="col-sm-1 col-form-label d-flex justify-content-end">Product:</label>
            <div class="col-sm-2">
                <input type="text" name="code" id="code" value="" class="form-control code"
                    placeholder="Product ID" readonly>
            </div>
            <div class="col d-flex justify-content-end me-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-modal">
                    Select Product
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
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
                                            <form id="stepone" method="POST" enctype="multipart/form-data">
                                                <?php
                                                $randomNumber = random_int(0000000000, 669900000000);
                                                echo "<input type='hidden' name='barcode' value='$randomNumber' class='form-control'>";
                                                ?>
                                                <div id="manufacturer-div">
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Name:</label>
                                                        <div class="col-sm-5">
                                                            <select id="select-manufacturer" name="vendor_id"
                                                                placeholder="Pick a manufacturer..." required>
                                                                <option value="">Select a manufacturer...
                                                                </option>
                                                                @foreach ($manufacturers as $vendor)
                                                                    <option value="{{ $vendor->id }}">
                                                                        {{ $vendor->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Date:</label>
                                                        <div class="col-sm-5">
                                                            <input type="date" name="date" id="date"
                                                                class="form-control">
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Image
                                                            Upload:</label>
                                                        <div class="col-sm-5">
                                                            <input type="file" id="image" name="image"
                                                                value="" class="form-control" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Details:</label>
                                                        <div class="col-sm-11">
                                                            <textarea type="text" id="details" name="details" value="" class="form-control" style="height: 107px;"
                                                                placeholder="Details"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Type:</label>
                                                        <div class="col-sm-3">
                                                            <select required="" name="type" id="type"
                                                                class="form-control form-select">
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
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                                        <div class="col-sm-3">
                                                            <input type="number" value="" id="quantity"
                                                                name="quantity" class="form-control" placeholder="QTY"
                                                                required>
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
                                                        <div class="col-sm-3">
                                                            <select required="" name="purity"
                                                                id="select-manufacturer-purity"
                                                                class="form-control form-select" placeholder="Purity"
                                                                required>
                                                                <option value="">Please Select Purity
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="dimension"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Dimensions:</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dimension" id="dimension"
                                                                value="" class="form-control"
                                                                placeholder="Dimensions">
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Unpolish
                                                            Weight:</label>
                                                        <div class="col-sm-3">
                                                            <input type="number" step="any" name="unpolish_weight"
                                                                value="" id="unpolish_weight" class="form-control"
                                                                placeholder="Unpolish Weight" required>
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Rate:</label>
                                                        <div class="col-sm-3">
                                                            <input type="number" step="any" name="rate"
                                                                id="manufacturer-rate" value=""
                                                                class="form-control" placeholder="Rate" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Wastage:</label>
                                                        <div class="col-sm-3">
                                                            <input type="number" step="any" name="wastage"
                                                                id="wastage" value="" class="form-control"
                                                                placeholder="Wastage" readonly>
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">24K:</label>
                                                        <div class="col-sm-3">
                                                            <input type="number" step="any" name="tValues"
                                                                id="tValues" value="" class="form-control"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9">
                                                        <div>
                                                            <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                                                            <button type="button"
                                                                class="btn btn-success waves-effect waves-light"
                                                                onclick="PrintManufacturer()">Print</button>
                                                            <button type="submit" class="btn btn-primary btn1"
                                                                id="m_save" value="Save">Save</button>
                                                        </div>
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
                <!-- End Form Layout -->
                <!-- end card -->
            </div>
            <!-- end col -->
            <!--2 -->
            {{-- <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header card border border-success">
                                <h4 class="card-title">
                                    POLISHER
                                </h4>
                            </div>
                            <div class="card-body p-4 ">
                                <div class="row">
                                    <div class="col-lg-12 ms-lg-auto ">
                                        <div class="mt-4 mt-lg-0">
                                            <form id="steptwo" method="POST" enctype="multipart/form-data">
                                                <?php
                                                $randompolisher = random_int(0000000000, 999900000000);
                                                echo "<input type='hidden' name='polisherbarcode' value='$randompolisher' class='form-control'>";
                                                ?>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Name:</label>
                                                    <div class="col-sm-5">
                                                        <select id="select-polisher" name="vendor_id"
                                                            placeholder="Pick a polisher..." required>
                                                            <option value="">Select a polisher...</option>
                                                            @foreach ($polishers as $vendor)
                                                                <option value="{{ $vendor->id }}">
                                                                    {{ $vendor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <label for="horizontal-firstname-input"
                                                        class="bar-code col-sm-1 col-form-label d-flex justify-content-end">Bar
                                                        Code:</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="product_id" value=""
                                                            class="form-control code" placeholder="code" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Date:</label>
                                                    <div class="col-sm-5">
                                                        <input type="date" name="date" id="p_date"
                                                            class="form-control" placeholder="Date">
                                                    </div>
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Image
                                                        Upload:</label>
                                                    <div class="col-sm-5">
                                                        <input type="file" id="image" name="image"
                                                            value="" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Details:</label>
                                                    <div class="col-sm-11">
                                                        <textarea type="text" name="detail" id="p_details" class="form-control" style="height: 107px;"
                                                            placeholder="Details"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="polish_type"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Polish Type:</label>
                                                    <div class="col-sm-3">
                                                        <select required="" name="polish_type" id="polish_type"
                                                            class="form-control form-select">
                                                            <option value="">Select Type</option>
                                                            <option value="High Shine Polish">High Shine Polish</option>
                                                            <option value="Mirror Finish">Mirror Finish</option>
                                                            <option value="Satin Polish">Satin Polish</option>
                                                            <option value="Brushed Finish">Brushed Finish</option>
                                                            <option value="Matte Polish">Matte Polish</option>
                                                            <option value="Antique Finish">Antique Finish</option>
                                                            <option value="Hammered Texture">Hammered Texture</option>
                                                            <option value="Florentine Finish">Florentine Finish</option>
                                                            <option value="Diamond-Cut Polish">Diamond-Cut Polish</option>
                                                            <option value="Sandblasted Finish">Sandblasted Finish</option>
                                                        </select>
                                                    </div>
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Polish
                                                        Weight:</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" name="polish_weight"
                                                            id="polish_weight" value="" class="form-control"
                                                            placeholder="polish Weight" required>
                                                    </div>
                                                    <label for="horizontal-firstname-input" for="p_rate"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Rate:</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" value=""
                                                            id="p_rate" name="p_rate" class="form-control"
                                                            placeholder="Rate" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="horizontal-firstname-input" for="difference"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Difference:</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" value=""
                                                            id="difference" name="difference" readonly
                                                            class="form-control" placeholder="Difference">
                                                    </div>
                                                    <label for="horizontal-firstname-input" for="poWas"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Wastage:</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" value=""
                                                            id="poWas" name="poWas" class="form-control"
                                                            placeholder="Wastage" readonly>
                                                    </div>
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">=</label>
                                                    <div class="col-sm-2">
                                                        <input type="number" step="any" value=""
                                                            id="payable" name="payable" readonly
                                                            class="form-control card bg-dark border-dark text-light"
                                                            placeholder="Payable / Receivable">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9">
                                                        <div>
                                                            <button type="button" id="polisher_print_btn"
                                                                class="btn btn-success waves-effect waves-light"
                                                                onclick="PrintPolisher()">Print</button>
                                                            <button type="submit" id="polisher_save_btn"
                                                                class="btn btn-primary btn1" value="Save">Save</button>
                                                        </div>
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
                <!-- End Form Layout -->
            </div>
            <!--2 end-->
            <!--3-->
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header card border border-warning">
                                <h4 class="card-title">
                                    STONE SETTER
                                </h4>
                            </div>
                            <div class="card-body p-4 ">
                                <div class="col-lg-12 ms-lg-auto ">
                                    <div class="mb-2 d-flex justify-content-end" style="margin-top: -30px;">
                                        <button type="button" class="btn btn-primary btn1" onclick="AddStoneSetter()">
                                            Add Stone Setter
                                        </button>
                                    </div>
                                    <div id="stone-setter-area" class="mt-4 mt-lg-0">
                                        <form id="stepthree" method="POST" enctype="multipart/form-data">
                                            <?php
                                            $randomstone = random_int(0000000000, 779900000000);
                                            echo "<input type='hidden' name='stonebarcode' value='$randomstone' class='form-control'>";
                                            ?>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Name:</label>
                                                <div class="col-sm-5">
                                                    <select id="select-stone_setter[]" name="vendor[]"
                                                        placeholder="Pick a stone setter..." required>
                                                        <option value="">Select a stone setter...</option>
                                                        @foreach ($stoneSetters as $vendor)
                                                            <option value="{{ $vendor->id }}">
                                                                {{ $vendor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="bar-code col-sm-1 col-form-label d-flex justify-content-end">Bar
                                                    Code:</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="code[]" value=""
                                                        class="form-control code" placeholder="code" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Date:</label>
                                                <div class="col-sm-5">
                                                    <input type="date" name="date[]" id="s_date"
                                                        class="form-control" placeholder="Date">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Image
                                                    Upload:</label>
                                                <div class="col-sm-5">
                                                    <input type="file" id="image[]" name="image[]" value=""
                                                        class="form-control" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Details:</label>
                                                <div class="col-sm-11">
                                                    <textarea type="text" name="detail[]" id="s_details[]" class="form-control" style="height: 107px;"
                                                        placeholder="Details"></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Total
                                                    Weight:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="s_total_weight[]"
                                                        id="s_total_weight[]" class="form-control"
                                                        placeholder="Total Weight" readonly>
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">-
                                                    Retained Weight:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="retained_weight[]"
                                                        id="retained_weight[]" class="form-control"
                                                        placeholder="Retained Weight">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">=
                                                    Issued Weight:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="Issued_weight[]"
                                                        id="stepIssueweight[]" class="form-control"
                                                        placeholder="Issued Weight" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <h5>Zircon:</h6>
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label  d-flex justify-content-end">Code:</label>
                                                    <div class="col-sm-1">
                                                        <select name="zircon_code[]" id="zircon_code[]" value=""
                                                            class="form-control" placeholder="Zircon">
                                                            <option value="">Select a zircon...</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2 p-0">
                                                        <input type="text" name="zircon_detail[]" id="zircon_detail[]"
                                                            value="" class="form-control"
                                                            placeholder="Zircon Detail">
                                                    </div>
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label  d-flex justify-content-end">Weight:</label>
                                                    <div class="col-sm-2">
                                                        <input type="number" step="any" name="zircon_weight[]"
                                                            id="zircon_weight[]" value="" class="form-control"
                                                            placeholder="Zircon">
                                                    </div>
                                                    <label for="horizontal-firstname-input"
                                                        class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                                    <div class="col-sm-2">
                                                        <input type="number" name="zircon_quantity[]"
                                                            id="zircon_quantity[]" value="" class="form-control"
                                                            placeholder="Zircon">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <i onclick="Add(this)" class="fa fa-plus-circle p-2"></i>
                                                    </div>
                                            </div>
                                            <div id="area">
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Total
                                                    Weight:</label>
                                                <div class="col-sm-2">
                                                    <input type="number" step="any" name="zircon_total_weight[]"
                                                        value="" id="zircon_total_weight[]"
                                                        class="form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Total
                                                    Quantity:</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="zircon_total_quantity[]" value="0"
                                                        id="zircon_total_quantity[]"
                                                        class="form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-none">Total
                                                    Price:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="zircon_total[]"
                                                        value="" id="zircon_total[]"
                                                        class="d-none form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <h5>Stone:</h5>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Code:</label>
                                                <div class="col-sm-1">
                                                    <select name="stone_code[]" id="stone_code[]" value=""
                                                        class="form-control" placeholder="Stone Code">
                                                        <option value="">Select a stone...</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 p-0">
                                                    <input type="text" name="stone_detail[]" id="stone_detail[]"
                                                        value="" class="form-control" placeholder="Stone Detail">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Weight:</label>
                                                <div class="col-sm-2">
                                                    <input type="number" step="any" name="stone_weight[]"
                                                        id="stone_weight[]" value="" class="form-control"
                                                        placeholder="Stone Weight">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="stone_quantity[]" id="stone_quantity[]"
                                                        value="" class="form-control" placeholder="Stone Quantity">
                                                </div>
                                                <div class="col-sm-2">
                                                    <i onclick="AddStone(this)" class="fa fa-plus-circle p-2"></i>
                                                </div>
                                            </div>
                                            <div id="area2">
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Total
                                                    Weight:</label>
                                                <div class="col-sm-2">
                                                    <input type="number" step="any" name="stone_total_weight[]"
                                                        value="" id="stone_total_weight[]"
                                                        class="form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Total
                                                    Quantity:</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="stone_total_quantity[]" value=""
                                                        id="stone_total_quantity[]"
                                                        class="form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-none">Total
                                                    Price:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="stone_total[]"
                                                        value="" id="stone_total[]"
                                                        class="d-none form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label ">Grand Total
                                                    Weight:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="grand_total_weight[]"
                                                        value="" id="grand_total_weight[]"
                                                        class=" form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <h5 class="d-none">Grand Total:</h5>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-none">Total
                                                    Price:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="grand_total[]"
                                                        value="" id="grand_total[]"
                                                        class="d-none form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row justify-content-end mb-3">
                                                <div class="col-sm-9">
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-success waves-effect waves-light"
                                                            onclick="PrintSetter(this)">Print</button>
                                                        <button type="submit" class="btn btn-primary btn1"
                                                            id="s_save">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form id="r_stepthree" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <label for="received_weight">Recieved Weight:</label>
                                                <div class="col-sm-4 mb-4">
                                                    <input type="number" step="any" name="received_weight"
                                                        value="" id="received_weight" class="form-control"
                                                        placeholder="Received weight">
                                                </div>
                                                <div id="returned-area[]" class="row">
                                                    <h5>Zircon/Stone Return:</h5>
                                                    <div class="row mb-4"><label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Detail:</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="r_code[]" id="r_code[]"
                                                                value="" class="form-control" placeholder="Detail">
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Weight:</label>
                                                        <div class="col-sm-2">
                                                            <input type="number" step="any" name="r_weight[]"
                                                                id="r_weight[]" value="" class="form-control"
                                                                placeholder="Weight">
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                                        <div class="col-sm-2">
                                                            <input type="number" name="r_quantity[]" id="r_quantity[]"
                                                                value="" class="form-control"
                                                                placeholder="Quantity">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <i class="fa fa-plus-circle p-2"
                                                                onclick="AddReturned(this)"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Stone
                                                    Weight:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="r_stone_weight"
                                                        value="" id="r_stone_weight"
                                                        class="form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Stone
                                                    Quantity:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" name="r_stone_quantity" value=""
                                                        id="r_stone_quantity"
                                                        class="form-control form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Total
                                                    Weight Return:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="r_total_weight"
                                                        value="" id="r_total_weight" class="form-control"
                                                        placeholder="Total">
                                                </div>
                                                <label for="horizontal-firstname-input" for="r_rate"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Rate:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" value="" id="r_rate"
                                                        name="r_rate" class="form-control" placeholder="Rate" required>
                                                </div>
                                                <label for="horizontal-firstname-input" for="sh_qty"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">S-Quantity:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" value="" id="sh_qty"
                                                        name="sh_qty" class="form-control"
                                                        placeholder="Shruded Quantity">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" for="r_wastage"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Wastage:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" value="" id="r_wastage"
                                                        name="r_wastage" class="form-control" placeholder="Wastage"
                                                        readonly>
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Grand
                                                    Weight:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="r_grand_weight"
                                                        value="" id="r_grand_weight"
                                                        class="form-control card bg-dark border-dark text-light"
                                                        placeholder="Total">
                                                </div>
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Payable:</label>
                                                <div class="col-sm-3">
                                                    <input type="number" step="any" name="r_payable" value=""
                                                        id="r_payable" class="form-control" placeholder="Total">
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-success waves-effect waves-light"
                                                            onclick="PrintReturned(this)">Print</button>
                                                        <button type="submit" class="btn btn-primary btn1"
                                                            id="r_save">Save</button>
                                                    </div>
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
            <!-- end card -->
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header card border border-primary">
                                <h4 class="card-title"> ADDITIONAL MANUFACTURING</h4>
                            </div>
                            <div class="card-body p-4 ">
                                <div class="row">
                                    <div class="col-lg-12 ms-lg-auto ">
                                        <div class="mt-4 mt-lg-0">
                                            <form id="stepfour" method="POST" enctype="multipart/form-data">
                                                <?php
                                                $randomadditional = random_int(0000000000, 819900000000);
                                                echo "<input type='hidden' name='additionalbarcode' value='$randomadditional' class='form-control'>";
                                                ?>
                                                <div class="row mb-4">
                                                    <table class="table table-bordered" id="additionalTable">
                                                        <tr>
                                                            <th>Date:</th>
                                                            <th>Name:</th>
                                                            <th>Type:</th>
                                                            <th>Amount:</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="date" id="a_date[]" name="date[]"
                                                                    class="form-control" placeholder="Date">
                                                            </td>
                                                            <td>
                                                                <select id="select-vendor[]" name="vendor_id[]"
                                                                    placeholder="Pick a vendor...">
                                                                    <option value="">Select a vendor...</option>
                                                                    @foreach ($vendors as $vendor)
                                                                        <option value="{{ $vendor->id }}">
                                                                            {{ $vendor->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select required="" id="a_type[]" name="type[]"
                                                                    class="form-control form-select">
                                                                    <option value="">Select Type</option>
                                                                    <option value="Stone ">Stone</option>
                                                                    <option value="Dull">Dull</option>
                                                                    <option value="Meena">Meena</option>
                                                                    <option value="Ruby">Ruby</option>
                                                                    <option value="Green">Green</option>
                                                                    <option value="Sapphire">Sapphire</option>
                                                                    <option value="Topas">Topas</option>
                                                                    <option value="Turmaline">Turmaline</option>
                                                                    <option value="Lekar">Lekar</option>
                                                                    <option value="Cubic Baquets">Cubic Baquets
                                                                    </option>
                                                                    <option value="Korean Baquets">Korean Baquets
                                                                    </option>
                                                                    <option value="Color Stones">Color Stones
                                                                    </option>
                                                                    <option value="Blue">Blue</option>
                                                                    <option value="Pearl">Pearl</option>
                                                                    <option value="Packet">Packet</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="number" step="any" id="amount[]"
                                                                    name="amount[]" class="form-control"
                                                                    placeholder="Amount">
                                                            </td>
                                                            <td><i class="fa fa-plus-circle p-2"
                                                                    onclick="AddAdditional(this)"></i>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-3">
                                                        <div>
                                                            <button type="submit" id="a_save"
                                                                class="btn btn-primary btn1">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type='submit' class="btn btn-danger btn1 px-3"
                                        onclick="SemiFinish()">Lock</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
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
                                <th scope="col">Product ID</th>
                                <th scope="col">Vendor ID</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">

                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->vendor_id }}</td>
                                    <td>{{ $product->vendor->name }}</td>
                                    <td>{{ $product->date }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-primary">Select</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('admin.product.scripts')
@endsection
