@ -0,0 +1,1530 @@
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
                <input type="text" name="code" id="code" class="form-control code" value=""
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
                                                <div id="manufacturer-div">
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Name:</label>
                                                        <div class="col-sm-5">
                                                            <select id="select-manufacturer" name="vendor_id"
                                                                placeholder="Pick a manufacturer..." required>
                                                                <option value="">Select a manufacturer...
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Date:</label>
                                                        <div class="col-sm-5">
                                                            <input type="date" name="date" id="date"
                                                                value="" class="form-control">
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
                                                                <option value="Set">
                                                                    Set</option>
                                                                <option value="Tops">
                                                                    Tops</option>
                                                                <option value="Ring">
                                                                    Ring</option>
                                                                <option value="Braclet">
                                                                    Braclet</option>
                                                                <option value="Safety Chain">
                                                                    Safety Chain</option>
                                                                </option>
                                                                <option value="Clip">
                                                                    Clip</option>
                                                                <option value="Kariyan">
                                                                    Kariyan</option>
                                                                <option value="Locket">
                                                                    Locket</option>
                                                                <option value="Locket Set">
                                                                    Locket Set</option>
                                                                </option>
                                                                <option value="Bangles">
                                                                    Bangles</option>
                                                                <option value="Kara">
                                                                    Kara</option>
                                                                <option value="Bindia">
                                                                    Bindia</option>
                                                                <option value="Kara + Locket set">
                                                                    Kara + Locket set</option>
                                                                Locket set</option>
                                                                <option value="Latkan">
                                                                    Latkan</option>
                                                                <option value="Bangles Set">
                                                                    Bangles Set</option>
                                                                </option>
                                                                <option value="Set+ring">
                                                                    Set+ring</option>
                                                                <option value="Repairing">
                                                                    Repairing</option>
                                                                </option>
                                                                <option value="Natt">
                                                                    Natt</option>
                                                                <option value="Cap">
                                                                    Cap</option>
                                                                <option value="Polish paid">
                                                                    Polish paid</option>
                                                                </option>
                                                                <option value="Jhumar">
                                                                    Jhumar</option>
                                                            </select>
                                                        </div>
                                                        <label for="horizontal-firstname-input"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                                        <div class="col-sm-3">
                                                            <input type="number"id="quantity" value=""
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
                                                                <option value="">
                                                                    18k</option>
                                                                <option value="">
                                                                    21k</option>
                                                                <option value="">
                                                                    22k</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="dimension"
                                                            class="col-sm-1 col-form-label d-flex justify-content-end">Dimensions:</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" name="dimension" id="dimension"
                                                                class="form-control" value=""
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
                                                                id="wastage"class="form-control" value=""
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
                                                            <button type="button"
                                                                class="btn btn-success waves-effect waves-light  d-none"
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
            <!--2 end-->
            <!--3-->

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
                                <th scope="col">Order ID</th>
                                <th scope="col">Product ID</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            @foreach ($orders->orderDetails as $order)
                            @if ($order->product->status == 0)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>O-{{ str_pad($orders->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ str_pad($order->p_id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td>@if ($order->vendor) {{ $order->vendor->name }} @endif</td>
                                    <td>{{ $orders->customer->name }}</td>
                                    <td>{{ $orders->date }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $order->p_id) }}" class="btn btn-primary">Select</a>
                                    </td>
                                </tr>
                                @endif
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
    <script>
        $(document).ready(function() {
            var unpolish_weight = document.getElementById('unpolish_weight');
            const event = new Event("change", {
                bubbles: true
            });
            unpolish_weight.dispatchEvent(event);
        });
    </script>
@endsection
