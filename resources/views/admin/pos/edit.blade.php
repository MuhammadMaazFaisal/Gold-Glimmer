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
                                                            @if ($customer->id == $order->customer_id)
                                                                <option value="{{ $customer->id }}" selected>
                                                                    {{ $customer->id }}
                                                                    | {{ $customer->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <label for="date" class="col-sm-1 col-form-label">Date:</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        value="{{ $order->date }}" placeholder="Date">
                                                </div>
                                                <h4 class="my-4">
                                                    Product Details
                                                </h4>
                                                <div class="product-container">
                                                    @foreach ($order->items as $item)
                                                        <div class="product">
                                                            <h6>
                                                                Product {{ $loop->iteration }}
                                                            </h6>
                                                            <div class="row mb-4">
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Product:</label>
                                                                <div class="col-sm-3">
                                                                    <select name="product[]" required id="product[]"
                                                                        class="form-control form-select">
                                                                        <option value="">Select Product</option>
                                                                        @foreach ($products as $product)
                                                                            @if ($product->id == $item->finished_product_id)
                                                                                <option value="{{ $product->id }}"
                                                                                    selected>
                                                                                    {{ $product->barcode }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                                                                <div class="col-sm-3">
                                                                    <input type="number" step="any" name="weight[]"
                                                                        value="{{ $item->product->weight }}" id="weight[]"
                                                                        class="form-control" placeholder="Weight" required
                                                                        readonly>
                                                                </div>
                                                                <div class="col-sm-3 text-center">
                                                                    <a
                                                                        href="{{ asset('images/products') }}/{{ $item->product->image }}">
                                                                        <img src="{{ asset('images/products') }}/{{ $item->product->image }}"
                                                                            alt="" id="product-image"
                                                                            style="width: 60px; height: 60px;">
                                                                    </a>
                                                                </div>
                                                                <div class="col-sm-1"></div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Purity:</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="purity_text[]"
                                                                        value="{{ $item->product->product->purity_text }}"
                                                                        class="form-control" placeholder="Purity" required
                                                                        readonly>
                                                                </div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Price:</label>
                                                                <div class="col-sm-2">
                                                                    <input type="number" step="any" name="price[]"
                                                                        value="{{ $item->product->price }}" id="price[]"
                                                                        class="form-control" placeholder="Price" required
                                                                        readonly>
                                                                </div>
                                                                <label for="horizontal-firstname-input"
                                                                    class="col-sm-1 col-form-label d-flex justify-content-end">Category:</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="category[]"
                                                                        value="{{ $item->product->category }}"
                                                                        id="category[]" class="form-control"
                                                                        placeholder="Category" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-12 d-flex justify-content-between mb-3">
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" name="total"
                                                            value="{{ $order->total }}" id="total" class="form-control"
                                                            placeholder="Total" required readonly>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" step="any" name="advance" value="{{ $order->advance }}"
                                                            id="advance" class="form-control" placeholder="Advance"
                                                            required>
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
        </div>
    </div>
@endsection
@section('scripts')
    <script>
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
