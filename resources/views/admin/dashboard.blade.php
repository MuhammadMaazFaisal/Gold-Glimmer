@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">DASHBOARD</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">

            <div class="col-lg-4">
                <div class="card bg-dark border-dark text-light">
                    <div class="card-body">
                        <h3 class="mb-4 text-light">Vendors</h3>
                        <h3 class="mb-4 text-light">{{ $vendors }}</h3>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-4">
                <div class="card bg-success border-success text-white-50">
                    <div class="card-body">
                        <h3 class="mb-3 text-white">Finished Products</h3>
                        <h3 class="mb-4 text-light">{{ $finishedProducts }}</h3>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-4">
                <div class="card bg-info border-info text-white-50">
                    <div class="card-body">
                        <h3 class="mb-3 text-white">Unfinished Products</h3>
                        <h3 class="mb-4 text-light">{{ $unfinishedProducts }}</h3>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="card bg-warning border-info text-white-50">
                    <div class="card-body">
                        <h3 class="mb-3 text-white">POS Orders</h3>
                        <h3 class="mb-4 text-light">{{ $posOrders }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-secondary border-info text-white-50">
                    <div class="card-body">
                        <h3 class="mb-3 text-white">Customers</h3>
                        <h3 class="mb-4 text-light">{{ $customers }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-danger border-info text-white-50">
                    <div class="card-body">
                        <h3 class="mb-3 text-white">Orders</h3>
                        <h3 class="mb-4 text-light">{{ $orders }}</h3>
                    </div>
                </div>
            </div>

        </div><!-- end row-->

        <!-- end row -->
    </div>
@endsection
