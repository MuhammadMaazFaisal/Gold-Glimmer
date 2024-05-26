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
                                            <hr>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input"
                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Customer:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="customer" id="customer"
                                                        class="form-control" value="{{ $order->customer->name }}"
                                                        placeholder="Customer" required readonly>
                                                </div>
                                                <label for="date" class="col-sm-1 col-form-label">Date:</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        value="{{ $order->created_at->toDateString() }}" placeholder="Date">
                                                </div>
                                                <h4 class="my-4">
                                                    Product Details
                                                </h4>
                                                <hr>
                                                <div class="product-container">
                                                    @php
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($products as $product)
                                                    @php
                                                        $total += $product->price;
                                                    @endphp
                                                        <h4 class="mt-3">Product {{ $loop->iteration }}</h4>
                                                        <div class="row">
                                                            <div class="col-md-8 row my-1">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="barcode">Barcode</label>
                                                                        <input type="text" class="form-control"
                                                                            id="barcode[]" required name="barcode[]"
                                                                            value="{{ $product->barcode }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="weight">Weight (g)</label>
                                                                        <input type="number" step="any"
                                                                            class="form-control" id="weight[]" required
                                                                            value="{{ $product->weight }}" name="weight[]"
                                                                            placeholder="Enter weight in grams" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="category">Category</label>
                                                                        <input type="text" class="form-control"
                                                                            id="category[]" required
                                                                            value="{{ $product->category }}"
                                                                            name="category[]" placeholder="Enter category" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="price">Retail Price</label>
                                                                        <input type="text" class="form-control"
                                                                            id="price[]" value="{{ $product->price }}"
                                                                            name="price[]" required
                                                                            placeholder="Enter retail price" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <textarea class="form-control" id="description[]" readonly name="description[]" rows="3">{{ $product->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 row my-1">
                                                                <div class="col-md-12 form-group">
                                                                    <img src="{{ asset('images/products') }}/{{ $product->image }}"
                                                                        id="product-image" class="img-fluid"
                                                                        alt="Product Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row my-2">
                                                <div class="col-4">
                                                    <label for="advance">Total</label>
                                                    <input type="number" step="any" name="total" value="{{ $total }}"
                                                        id="total" class="form-control" placeholder="Total" required readonly>
                                                </div>
                                                <div class="col-4">
                                                    <label for="balance">Balance</label>
                                                    <input type="number" step="any" name="balance" value="{{ $total - $order->advance }}"
                                                        id="balance" class="form-control" placeholder="Balance" required readonly>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-12 d-flex justify-content-between mb-3  d-none">
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" name="total" value=""
                                                            id="total" class="form-control" placeholder="Total" required
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary col-2">Complete</button>
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
            var barcode = document.querySelectorAll('input[name="barcode[]"]');
            var weight = document.querySelectorAll('input[name="weight[]"]');
            var price = document.querySelectorAll('input[name="price[]"]');
            var customer = document.querySelector('input[name="customer"]').value;
            var date = document.querySelector('input[name="date"]').value;
            var category = document.querySelectorAll('input[name="category[]"]');
            var total = document.querySelector('input[name="total"]').value;
            var balance = document.querySelector('input[name="balance"]').value;
            for (let i = 0; i < barcode.length; i++) {
                productRows += `
            <tr>
                <td>${barcode[i].value}</td>
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
                        <h1>Order Slip</h1>
                        <p class="label">Customer: 
                        <span>${customer}</span></p>
                        <p class="label">Date:
                        <span>${date}</span></p>
                        <p class="label">Total:
                        <span>Rs ${total}</span></p>
                        <p class="label">Amount Paid:
                        <span>Rs ${balance}</span></p>
                        <p class="label">Products:</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Category</th>
                                    <th>Weight</th>
                                    <th>Price</th>
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
            window.location.href = "{{ route('order.list') }}";

        }
        $(document).ready(function() {
            $('#customer').selectize({
                sortField: 'text'
            });
        });
        $('#form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('order.complete.store', $order->id) }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        PrintSlip(formData);
                    } else {
                        swal("Error", "Something went wrong", "error");
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
@endsection
