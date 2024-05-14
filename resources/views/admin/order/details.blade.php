@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header card border border-info">
                            <h4 class="card-title">
                                Order Details
                            </h4>
                        </div>
                        <div class="card-body p-4 ">
                            <div class="row">
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
                                                    <input type="text" name="customer" id="customer" class="form-control" value="{{ $order->customer->name }}"
                                                        placeholder="Customer" required readonly>
                                                </div>
                                                <label for="date" class="col-sm-1 col-form-label">Date:</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="date" id="date" class="form-control" value="{{ $order->created_at->toDateString() }}"
                                                        placeholder="Date">
                                                </div>
                                                <h4 class="my-4">
                                                    Product Details
                                                </h4>
                                                <div class="product-container">
                                                    @foreach($order->orderDetails as $detail)
                                                    
                                                    <div class="product">
                                                        <h6>
                                                            Product {{ $loop->iteration }}
                                                        </h6>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Product:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="product[]" value="{{ $detail->product->id }}"
                                                                    id="product[]" class="form-control"
                                                                    placeholder="Product" required readonly>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Category:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" step="any" name="category[]"
                                                                    value="{{ $detail->product->productType->name }}"
                                                                     id="category[]" class="form-control"
                                                                    placeholder="category" required readonly>
                                                            </div>
                                                            <div class="col-sm-3 text-center">
                                                                <a href="#" target="_blank">
                                                                    <img src="{{ asset('images/products') . '/' . $detail->product->image }}"
                                                                        alt="" id="product-image"
                                                                        style="width: 60px; height: 60px;">
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                @if ($detail->product->status == 1)
                                                                    <span class="badge badge-success bg-success">Completed</span>
                                                                @else
                                                                    <span class="badge badge-warning bg-warning">Pending</span>
                                                                @endif
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="purity_text[]" value="{{ $detail->product->purity_text }}"
                                                                    class="form-control" placeholder="Purity" required
                                                                    readonly>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="quantity[]" value="{{ $detail->product->quantity }}"
                                                                    id="quantity[]" class="form-control"
                                                                    placeholder="quantity" required readonly>
                                                            </div>
                                                            <label for="horizontal-firstname-input"
                                                                class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                                                            <div class="col-sm-2">
                                                                <input type="number" step="any" name="weight[]"
                                                                    value="{{ $detail->product->unpolished_weight }}"
                                                                     id="weight[]" class="form-control"
                                                                    placeholder="Weight" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 d-flex justify-content-between mb-3  d-none">
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" name="total" value=""
                                                            id="total" class="form-control" placeholder="Total"
                                                            required readonly>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary col-2">Print</button>
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
@endsection
@section('scripts')
    <script>
        function PrintSlip(formData) {
            let productRows = "";
            var product = document.querySelectorAll('input[name="product[]"]');
            var purity = document.querySelectorAll('input[name="purity_text[]"]');
            var quantity = document.querySelectorAll('input[name="quantity[]"]');
            var weight = document.querySelectorAll('input[name="weight[]"]');
            var customer = document.querySelector('input[name="customer"]').value;
            var date = document.querySelector('input[name="date"]').value;
            var category = document.querySelectorAll('input[name="category[]"]');
            console.log(purity);
            console.log(quantity);
            console.log(weight);
            for (let i = 0; i < quantity.length; i++) {
                productRows += `
            <tr>
                <td>${product[i].value}</td>
                <td>${category[i].value}</td>
                <td>${weight[i].value}</td>
                <td>${quantity[i].value}</td>
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
                                    <th>Category</th>
                                    <th>Weight</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${productRows}
                            </tbody>
                        </table>
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
            PrintSlip(formData); 
        });

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
