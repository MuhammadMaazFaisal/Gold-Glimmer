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
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="card-header card border border-danger">
                                <h4 class="card-title">
                                    Complete Product
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row my-1">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="m_product_id">Main Product Id</label>
                                                <input type="text" class="form-control" id="m_product_id"
                                                    name="m_product_id" value="{{ $product->id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vendor">Vendor</label>
                                                <input type="text" class="form-control" id="vendor" name="vendor"
                                                    value="{{ $product->vendor->name }}" readonly>
                                                <input type="hidden" class="form-control" id="vendor_id" name="vendor_id"
                                                    value="{{ $product->vendor_id }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="products-area">
                                        @for ($i = 0; $i < $product->quantity; $i++)
                                            <h4 class="mt-3">Product {{ $i + 1 }}</h4>
                                            <div class="row my-1">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="barcode">Barcode</label>
                                                        <input type="text" class="form-control" id="barcode[]" required
                                                            name="barcode[]"
                                                            value="{{ preg_replace('/[^0-9]/', '', uniqid()) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="weight">Weight (g)</label>
                                                        <input type="number" step="any" class="form-control" id="weight[]" required
                                                        value="@if( isset($product->polisherStep) && isset($product->polisherStep->polish_weight)){{ $product->polisherStep->polish_weight / $product->quantity }}@else{{ $product->unpolished_weight / $product->quantity }}@endif"
                                                            name="weight[]" placeholder="Enter weight in grams">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-1">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <input type="text" class="form-control" id="category[]" required value="{{ $product->productType->name }}"
                                                            name="category[]" placeholder="Enter category">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="price">Retail Price</label>
                                                        <input type="text" class="form-control" id="price[]"
                                                            name="price[]" required placeholder="Enter retail price">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control" id="image[]" accept="image/*"
                                                            name="image[]" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-1">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" id="description[]" name="description[]" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Layout -->
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection
@section('scripts')
@endsection
