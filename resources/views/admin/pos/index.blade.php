@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header card border border-info">
                            <h4 class="card-title">
                                Point of Sale
                            </h4>
                        </div>
                        <div class="card-body p-4 ">
                            <div class="row">
                                {{-- <div class="col d-flex justify-content-end me-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-modal">
                                        Select Order
                                    </button>
                                </div> --}}
                                <div class="col-lg-12 ms-lg-auto ">
                                    <div class="mt-4 mt-lg-0">
                                        <form id="form" method="POST" enctype="multipart/form-data">
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
                                                <label for="date" class="col-sm-1 col-form-label">Date:</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        placeholder="Date">
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
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Product:</label>
                                                            <div class="col-sm-3">
                                                                <select name="product[]" required id="product[]"
                                                                    class="form-control form-select">
                                                                    <option value="">Select Product</option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->id }}">
                                                                            {{ $product->barcode }} |
                                                                            {{ $product->product->productType->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Weight
                                                                (g):</label>
                                                            <div class="col-sm-3">
                                                                <input type="number" step="any" name="weight[]"
                                                                    value="" id="weight[]" class="form-control"
                                                                    placeholder="Weight" required readonly>
                                                            </div>
                                                            <div class="col-sm-3 text-center">
                                                                <a href="#" target="_blank">
                                                                    <img src="" alt="" id="product-image"
                                                                        style="width: 60px; height: 60px;">
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <i onclick="Add(this)" class="fa fa-plus-circle p-2"></i>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="purity_text[]" value=""
                                                                    class="form-control" placeholder="Purity" required
                                                                    readonly>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Price:</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" step="any" name="price[]"
                                                                    value="" id="price[]" class="form-control"
                                                                    placeholder="Price" required readonly>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Category:</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="category[]" value=""
                                                                    id="category[]" class="form-control"
                                                                    placeholder="Category" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-12 d-flex justify-content-between mb-3">
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" name="total" value=""
                                                            id="total" class="form-control" placeholder="Total"
                                                            required readonly>
                                                    </div>
                                                    {{-- <div class="col-sm-3">
                                                        <input type="number" step="any" name="advance" value=""
                                                            id="advance" class="form-control" placeholder="Advance"
                                                            required>
                                                    </div> --}}
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary col-2">Save</button>
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
        </div>
    </div>

    <div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Order</h5>
                </div>
                <div class="modal-body">
                    <table id="product-table" class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">

                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>O-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        <a href="{{ route('pos.order.details', $order->id) }}" class="btn btn-primary">Select</a>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function PrintSlip(formData) {
            let productRows = "";
            var category = document.querySelectorAll('input[name="category[]"]');
            var purity = document.querySelectorAll('input[name="purity_text[]"]');
            var price = document.querySelectorAll('input[name="price[]"]');
            var weight = document.querySelectorAll('input[name="weight[]"]');
            var total = document.querySelector('input[name="total"]').value;
            var customer = document.querySelector('select[name="customer"]').selectedOptions[0].text;
            var date = document.querySelector('input[name="date"]').value;
            console.log(category);
            console.log(purity);
            console.log(price);
            console.log(weight);
            for (let i = 0; i < price.length; i++) {
                productRows += `
            <tr>
                <td>${category[i].value}</td>
                <td>${weight[i].value}</td>
                <td>${price[i].value}</td>
            </tr>
        `;
            }

            let printContents = `<!DOCTYPE html>
                    <html>
                    <head>
                        <style>
                            @media print {
                                @page {
                                    size: 80mm 200mm;
                                    margin: 0;
                                    margin-top: -20px;
                                }
                                body {
                                    font-family: Arial, sans-serif;
                                    font-size: 12px;
                                    padding: 10px;
                                }
                                h1 {
                                    font-size: 16px;
                                    text-align: center;
                                    margin: 10px 0;
                                    color: #333;
                                }
                                p {
                                    margin-bottom: 5px;
                                }
                                .label {
                                    font-weight: bold;
                                }
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                }
                                th {
                                    background-color: #f2f2f2;
                                    border: 1px solid #ddd;
                                    padding: 8px;
                                    text-align: left;
                                }
                                td {
                                    border: 1px solid #ddd;
                                    padding: 8px;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <h1>Point of Sale Slip</h1>
                        <p class="label">Customer:
                        <span>${customer}</span></p>
                        <p class="label">Date:
                        <span>${date}</span></p>
                        <p class="label">Products:</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Weight</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${productRows}
                            </tbody>
                        </table>
                        <p class="label">Total:</p>
                        <p>${total}</p>
                    </body>
                    </html>
                    <script>
                        window.onload = function() {
                            window.print();
                        }
                        <\/script>
                    `;

            let slipContent = printContents;
            let printWindow = window.open("", "_blank");
            printWindow.document.open();
            printWindow.document.write(slipContent);
            printWindow.document.close();

        }

        function getProductDetails(id, element) {
            url = "{{ route('pos.product.details', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var product = data;
                    let parent = element.parentElement.parentElement;
                    parent.querySelector('input[name="weight[]"]').value = product.weight;
                    parent.querySelector('input[name="price[]"]').value = product.price;
                    parent.querySelector('input[name="category[]"]').value = product.category;
                    parent.querySelector('input[name="purity_text[]"]').value = product.product.purity_text;
                    parent.querySelector('#product-image').src = "{{ asset('images/products') }}" + '/' +
                        product.image;
                    parent.querySelector('#product-image').parentElement.href =
                        "{{ asset('images/products') }}" + '/' + product.image;
                    var total = 0;
                    var prices = document.querySelectorAll('input[name="price[]"]');
                    for (let i = 0; i < prices.length; i++) {
                        console.log(prices[i].value);
                        total += parseFloat(prices[i].value);
                    }
                    document.querySelector('input[name="total"]').value = total;
                }
            });
        }
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
                url: "{{ route('pos.store') }}",
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
                            PrintSlip(formData); // Generate slip content
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
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-1 col-form-label d-flex justify-content-end">Product:</label>
                                        <div class="col-sm-3">
                                            <select name="product[]" required id="product[]"
                                                class="form-control form-select">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->barcode }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                                        <div class="col-sm-3">
                                            <input type="number" step="any" name="weight[]"
                                                value="" id="weight[]" class="form-control"
                                                placeholder="Weight" required readonly>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <a href="#" target="_blank">
                                            <img src="" alt="" id="product-image"
                                                style="width: 60px; height: 60px;">
                                            </a>
                                        </div>
                                        <div class="col-sm-1">
                                            <i onclick="Remove(this)" class="fa fa-minus-circle p-2"></i>
                                        </div>
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="purity_text[]" value=""
                                                class="form-control" placeholder="Purity" required readonly>
                                        </div>
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-1 col-form-label d-flex justify-content-end">Price:</label>
                                        <div class="col-sm-2">
                                            <input type="number" step="any" name="price[]"
                                                value="" id="price[]" class="form-control"
                                                placeholder="Price" required readonly>
                                        </div>
                                        <label for="horizontal-firstname-input"
                                            class="col-sm-1 col-form-label d-flex justify-content-end">Category:</label>
                                        <div class="col-sm-2">
                                            <input type="text"  name="category[]"
                                                value="" id="category[]" class="form-control"
                                                placeholder="Category" required readonly>
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
            var selects = document.querySelectorAll('select[name="product[]"]');
            for (let i = 0; i < selects.length; i++) {
                selects[i].addEventListener('change', function(e) {
                    getProductDetails(e.target.value, e.target);
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
