@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-2">
                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">Customer:</label>
                    <div class="col-sm-3">
                        <select id="select-customer" placeholder="Pick a customer...">
                            <option value="">Select a customer...</option>
                        </select>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-header card border border-danger">
                        <h4 class="card-title">
                            Customer Management
                        </h4>
                    </div>
                    <div class="card-body p-4 ">
                        <div class="row">
                            <div class="col-lg-12 ms-lg-auto ">
                                <div class="mt-4 mt-lg-0">
                                    <form id="form" method="POST" enctype="multipart/form-data">
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
                                        <div class="row mb-4">
                                            <label for="phone" class="ps-md-4 col-sm-1 col-form-label">Phone:</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="phone" id="phone" value=""
                                                    class="form-control" placeholder="Phone" required>
                                            </div>
                                            <label for="address" class="ps-md-5 col-sm-1 col-form-label">Address:</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="address" id="address" value=""
                                                    class="form-control" placeholder="Address" required>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9 d-flex justify-content-end me-4">
                                                <button type="button" id="delete"
                                                    class="btn btn-danger px-3 me-3 disabled"
                                                    onclick="DeleteCustomer()">Delete</button>
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
@endsection
@section('scripts')
    <script>
        function GetCustomerData(id) {
            var delete1 = document.getElementById("delete");
            let url = `{{ route('customer.edit', ['id' => ':id']) }}`;
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    delete1.classList.remove("disabled");
                    document.getElementById("id").value = response.customer.id;
                    document.getElementById("name").value = response.customer.name;
                    document.getElementById("phone").value = response.customer.phone;
                    document.getElementById("address").value = response.customer.address;
                    document.getElementById("name").readOnly = true;
                }
            });
        }

        function DeleteCustomer() {
            var id = document.getElementById("id").value;
            let url = `{{ route('customer.destroy', ['id' => ':id']) }}`;
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.data['alert-type'] == "success") {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Customer Deleted Successfully',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong.',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                },error: function(response) {
                    let errors = response.responseJSON.errors;
                    let message = "";
                    for (let key in errors) {
                        message += errors[key] + "\n";
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            });
        }

        function getCustomerInitials() {
            var fullName = document.getElementById("name").value;
            const words = fullName.trim().split(" ");
            for (let i = 0; i < words.length; i++) {
                words[i] = words[i][0].toUpperCase() + words[i].slice(1);
            }
            // join the capitalized words back into a single string
            const capitalizedFullName = words.join(" ");
            document.getElementById("name").value = capitalizedFullName;
            var nameParts = fullName.split(" ");
            var initials = "";
            for (var i = 0; i < nameParts.length; i++) {
                if (nameParts[i]) {
                    initials += nameParts[i].charAt(0);
                }
            }
            $.ajax({
                url: "{{ route('next-customer-number') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "GET",
                success: function(data) {
                    console.log(data);
                    document.getElementById("id").value = initials.toUpperCase() + data.customerNumber;
                }
            })
        }
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
            $.ajax({
                url: "{{ route('customer.index') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                success: function(data) {
                    console.log(data);
                    var select = $('#select-customer')[0].selectize;
                    for (var i = 0; i < data.length; i++) {
                        var newOption = {
                            value: data[i].id,
                            text: data[i].id + " | " + data[i].name
                        };
                        select.addOption(newOption);
                    }
                }
            })
            var date = new Date().toISOString().slice(0, 10);
            var dataInputs = document.querySelectorAll('input[type="date"]');
            for (let i = 0; i < dataInputs.length; i++) {
                dataInputs[i].value = date;
            }
        });
        $(document).on('blur', '#name', function(e) {
            e.preventDefault();
            getCustomerInitials();
        });
        $(document).on('change', '#select-customer', function(e) {
            e.preventDefault();
            GetCustomerData($(this).val());
        });
        var form = document.getElementById("form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var select = $('#select-customer')[0].selectize;
            var id1 = select.getValue();
            var id = document.getElementById("id").value;
            var data = new FormData(form);
            if (id1 === id) {
                var url = `{{ route('customer.update', ['id' => ':id']) }}`;
                url = url.replace(':id', id);
            } else {
                var url = `{{ route('customer.store') }}`;
            }
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.data['alert-type'] == "success") {
                        Swal.fire({
                            title: 'Success!',
                            text: data.data.message,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something Went Wrong',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    }
                },
                error: function(data) {
                    console.log(data);
                    var errors = data.responseJSON.errors;
                    var message = "";
                    for (var key in errors) {
                        message += errors[key] + "\n";
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            })
        });
    </script>
@endsection
