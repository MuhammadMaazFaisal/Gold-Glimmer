@extends('admin.layouts.app')
@section('content')
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
                                            <div class="row mb-4">
                                                <label for="date" class="col-sm-1 col-form-label">Date:</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        placeholder="Date">
                                                </div>
                                                <label for="vendor"
                                                    class="col-sm-2 col-form-label text-end">Manufacturer:</label>
                                                <div class="col-sm-5">
                                                    <select id="vendor" name="vendor" required
                                                        class="form-control form-select">
                                                        <option value="">Select Manufacturer</option>
                                                        @foreach ($manufacturers as $manufacturer)
                                                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->id }}
                                                                | {{ $manufacturer->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <h4 class="mb-4">
                                                Customer Details
                                            </h4>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Customer:</label>
                                                <div class="col-sm-4">
                                                    <select required="" name="customer" id="customer"
                                                        class="form-control form-select" required>
                                                        <option value="">Select Customer</option>
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}">{{ $customer->id }}
                                                                | {{ $customer->name }}</option>
                                                        @endforeach
                                                    </select>
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
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Type:</label>
                                                            <div class="col-sm-3">

                                                                <select name="type[]" required id="type[]"
                                                                    class="form-control form-select">
                                                                    <option value="">Select Type</option>
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
                                                            <div class="col-sm-2">

                                                                <input type="number" value="" id="quantity][]"
                                                                    name="quantity[]" class="form-control" placeholder="QTY"
                                                                    required>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
                                                            <div class="col-sm-3">
                                                                <select required="" name="purity[]"
                                                                    id="select-manufacturer-purity[]"
                                                                    class="form-control form-select" placeholder="Purity"
                                                                    required>
                                                                    <option value="">Select Purity
                                                                    </option>
                                                                    <option value="18k">18k</option>
                                                                    <option value="21k">21k</option>
                                                                    <option value="22k">22k</option>
                                                                </select>
                                                                <input type="hidden" name="purity_text[]"
                                                                    value="">
                                                            </div>
                                                            <div class="col-sm-1">

                                                                <i onclick="Add(this)" class="fa fa-plus-circle p-2"></i>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Weight:</label>
                                                            <div class="col-sm-3">

                                                                <input type="number" step="any" name="weight[]"
                                                                    value="" id="weight[]" class="form-control"
                                                                    placeholder="Weight" required>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Dimensions:</label>
                                                            <div class="col-sm-2">

                                                                <input type="text" step="any" name="dimension[]"
                                                                    id="dimension[]" value="" class="form-control"
                                                                    placeholder="Dimensions">
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Image
                                                                Upload:</label>
                                                            <div class="col-sm-3">

                                                                <input type="file" id="image[]" name="image[]"
                                                                    required value="" class="form-control"
                                                                    accept="image/*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 d-flex justify-content-end">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary col-2">Save</button>
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
                        <input type="number" step="any" id="total_pure_weight" class="form-control"
                            placeholder="Total Pure Weight">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            GetDate();
            addEventListeners();
            $('#vendor').selectize({
                sortField: 'text'
            });
            $('#customer').selectize({
                sortField: 'text'
            });
        });

        $('#form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('order.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response["alert-type"] == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Created Successfully',
                            showConfirmButton: true,
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
                <select name="type[]" required id="type[]" class="form-control form-select">
                    <option value="">Select Type</option>
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

                <input type="number" value="" id="quantity[]" name="quantity[]" class="form-control" placeholder="QTY" required>
            </div>
            <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">
                Purity:</label>
            <div class="col-sm-3">
                <select required="" name="purity[]" id="select-manufacturer-purity[]" class="form-control form-select" placeholder="Purity" required>
                    <option value="">Select Purity
                    </option>
                    <option value="18k">18k</option>
                    <option value="21k">21k</option>
                    <option value="22k">22k</option>
                </select>
                <input type="hidden" name="purity_text[]" value="">
            </div>

            <div class="col-sm-1">

                <i onclick="Remove(this)" class="fa fa-minus-circle p-2"></i>
            </div>
        </div>
        <div class="row mb-4">
            <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight:</label>
            <div class="col-sm-3">

                <input type="number" step="any" name="weight[]" value="" id="weight[]" class="form-control" placeholder="Weight" required>
            </div>
            <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Dimensions:</label>
            <div class="col-sm-2">

                <input type="text" step="any" name="dimension[]" id="dimension[]" value="" class="form-control" placeholder="Dimensions">
            </div>
            <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Image
                Upload:</label>
            <div class="col-sm-3">

                <input type="file" id="image[]" name="image[]" required value="" class="form-control" accept="image/*">
            </div>
        </div>`;
            product_container.appendChild(product);
            addEventListeners();
        }

        function addEventListeners() {
            var selects = document.querySelectorAll('select[name="purity[]"]');
            for (let i = 0; i < selects.length; i++) {
                selects[i].addEventListener('change', function(e) {
                    var value = e.target.value;
                    e.target.nextElementSibling.value = value;
                });
            }
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
@endsection
