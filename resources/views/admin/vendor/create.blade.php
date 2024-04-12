@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-2">
                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label">Vendor:</label>
                    <div class="col-sm-3">
                        <select id="select-vendor" placeholder="Pick a vendor...">
                            <option value="">Select a vendor...</option>
                        </select>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-header card border border-danger">
                        <h4 class="card-title">
                            {{ $type }} Department
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
                                        <h6>By Default</h6>
                                        <div class="ms-md-5">
                                            <div class="row mb-4 ms-md-3">
                                                <label for="18k" class="ps-md-5 col-sm-1 col-form-label">18k:</label>
                                                <div class="col-sm-5">
                                                    <input type="number" name="18k" id="18k" step="any"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ms-md-3">
                                                <label for="21k" class="ps-md-5 col-sm-1 col-form-label">21k:</label>
                                                <div class="col-sm-5">
                                                    <input type="number" name="21k" id="21k" step="any"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ms-md-3">
                                                <label for="22k" class="ps-md-5 col-sm-1 col-form-label">22k:</label>
                                                <div class="col-sm-5">
                                                    <input type="number" name="22k" id="22k" step="any"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9 d-flex justify-content-end me-4">
                                                <button type="button" id="delete"
                                                    class="btn btn-danger px-3 me-3 disabled"
                                                    onclick="DeleteVendor()">Delete</button>
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
        function GetVendorData(id) {
            var delete1 = document.getElementById("delete");
            let url = `{{ route('vendor.edit', ['id' => ':id']) }}`;
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    delete1.classList.remove("disabled");
                    document.getElementById("id").value = response.vendor.id;
                    document.getElementById("name").value = response.vendor.name;
                    document.getElementById("phone").value = response.vendor.phone;
                    document.getElementById("address").value = response.vendor.address;
                    document.getElementById("18k").value = response.vendor['18k'];
                    document.getElementById("21k").value = response.vendor['21k'];
                    document.getElementById("22k").value = response.vendor['22k'];
                    document.getElementById("name").readOnly = true;
                }
            });
        }

        function DeleteVendor() {
            var id = document.getElementById("id").value;
            let url = `{{ route('vendor.destroy', ['id' => ':id']) }}`;
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
                            text: 'Vendor Deleted Successfully',
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
                }
            });
        }

        function getVendorInitials() {
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
                url: "{{ route('next-vendor-number') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                success: function(data) {
                    console.log(data);
                    document.getElementById("id").value = initials.toUpperCase() + data.vendorNumber;

                }
            })

        }
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
            // type is end of the url
            let type = window.location.href.split("/").pop();
            console.log(type);
            $.ajax({
                url: "{{ route('vendor.index') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                data: {
                    type: type
                },
                success: function(data) {
                    console.log(data);
                    var select = $('#select-vendor')[0].selectize;
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
            getVendorInitials();
        });

        $(document).on('change', '#select-vendor', function(e) {
            e.preventDefault();
            GetVendorData($(this).val());
        });

        var form = document.getElementById("form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var select = $('#select-vendor')[0].selectize;
            var id1 = select.getValue();
            var id = document.getElementById("id").value;
            var data = new FormData(form);
            if (id1 === id) {
                var url = `{{ route('vendor.update', ['id' => ':id']) }}`;
                url = url.replace(':id', id);
            } else {
                var url = `{{ route('vendor.store') }}`;
                data.append("type", window.location.href.split("/").pop());
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
