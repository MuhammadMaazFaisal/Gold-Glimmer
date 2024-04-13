@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">

    <div class="col-xl-12">


        <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header card border border-info">

                        <h4 class="card-title">
                            {{$type}} Cash


                        </h4>

                    </div>
                    <div class="col d-flex justify-content-end me-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="SelectMetal()" data-bs-target="#product-modal">
                            Show History
                        </button>
                    </div>
                    <div class="card-body p-4 ">


                        <div class="row">

                            <div class="col-lg-12 ms-lg-auto ">

                                <div class="mt-4 mt-lg-0">


                                    <form id="form" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $randomgold = random_int(0000000000, 929900000000);
                                        echo "<input type='hidden' name='goldbarcode' value='$randomgold' class='form-control'>";
                                        ?>
                                        <input style="display: none;" type="number" step="any" name="product_id" id="product_id" class="form-control">
                                        <div class="row mb-4">
                                            <label for="date" class="col-sm-1 col-form-label">Date:</label>
                                            <div class="col-sm-5">
                                                <input type="date" name="date" id="date" class="form-control" placeholder="Date">
                                            </div>
                                            <label for="vendor" class="col-sm-1 col-form-label">Name:</label>
                                            <div class="col-sm-5">
                                                <select id="vendor" name="vendor" required class="form-control form-select"></select>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="amount" class="col-sm-1 col-form-label">Amount:</label>
                                            <div class="col-sm-11">
                                                <input type="number" step="any" name="amount" id="amount" class="form-control" placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="detail" class="col-sm-1 col-form-label">Details:</label>
                                            <div class="col-sm-11">
                                                <textarea type="text" name="detail" id="detail" class="form-control" style="height: 107px;" placeholder="Details"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-5">

                                            <div class="row d-flex justify-content-end">
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary mx-1" onclick="Print()">Print</button>
                                                    <button type="button" class="btn btn-danger mx-1" onclick="Delete()">Delete</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
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
<div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table id="product-table" class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vendor ID</th>
                            <th scope="col">Vendor Name</th>
                            <th scope="col">Amount</th>
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
                    <input type="number" step="any" id="total_pure_weight" class="form-control" placeholder="Total Pure Weight">
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
    $(document).on('click', '.select-btn', function() {
        var productId = $(this).data('product-id');
        var vendorId = $(this).data('vendor-id');
        var date = $(this).data('date');
        var amount = parseFloat($(this).data('amount')); // Convert to a float value
        var details = $(this).data('details');

        // Set the values to the corresponding input elements by ID
        $('#product_id').val(productId);
        var select_manufacturer = $('#vendor')[0].selectize;
        select_manufacturer.setValue(vendorId);
        $('#date').val(date);
        $('#amount').val(amount);
        $('#detail').val(details);


        // Close the modal
        $('#product-modal').modal('hide');
    });

    function SelectMetal() {
        $.ajax({
            url: "{{route('cash.index')}}",
            type: "Get",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                type: "{{$type}}"
            },
            success: function(response) {
                data = response.data;
                console.log(data);
                if (data.length > 0) {
                    let table_body = document.getElementById('product-table-body');
                    table_body.innerHTML = '';
                    for (i = 0; i < data.length; i++) {
                        date = data[i].date;
                        const inputDateStr = data[i].date;
                        const inputDate = new Date(inputDateStr);
                        const day = inputDate.getDate().toString().padStart(2, '0');
                        const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
                        const year = inputDate.getFullYear();
                        const formattedDate = `${day}-${month}-${year}`;
                        let row = `
                    <tr>
                    <td>${data[i].id}</td>
                    <td>${data[i].vendor_id}</td>
                    <td>${data[i].vendor.name}</td>
                    <td>${data[i].amount}</td>
                    <td>${formattedDate}</td>
                    <td><button class="btn btn-primary select-btn" data-product-id="${data[i]['id']}" data-vendor-id="${data[i]['vendor_id']}" data-vendor-name="${data[i]['name']}" data-date="${data[i]['date']}" data-amount="${data[i]['amount']}" data-details="${data[i]['details']}">Select</button></td>
                    </tr>
                    `;
                        table_body.innerHTML += row;
                    }
                } else {
                    let table_body = document.getElementById('product-table-body');
                    table_body.innerHTML = '';
                    let row = `
                <tr>
                <td colspan="9" class="text-center">No records found</td>
                </tr>
                `;
                    table_body.innerHTML += row;
                }
            }
        });
    }

    function Delete() {
        let product = $('#product_id').val();
        if (product == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select a product from history to delete!',
            })
            return;
        } else {
            let url = "{{route('cash.destroy',':id')}}";
            url = url.replace(':id', product);
            $.ajax({
                url: url,
                type: "Delete",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(data);
                    data = response.data;
                    if (data['alert-type'] == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Cash Record deleted successfully!',
                        })
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                }
            });
        }
    }

    function Print() {
        let printWindow = window.open("", "_blank");

        // Generate slip content
        let slipContent = `<!DOCTYPE html>
                            <html>
                            <head>
                            <style>
                                @media print {
                                    @page {
                                        size: 80mm 200mm;
                                        margin: 0;
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
                                }
                            </style>
                            </head>
                            <body>
                            <p><span class="label" style="margin-right:6px";>Date:</span><span>${$('#date').val()}</span></p>
                            <p><span class="label" style="margin-right:6px";>Vendor ID:</span><span>${$("#vendor").selectize()[0].selectize.options[$("#vendor").selectize()[0].selectize.getValue()].text}</span></p>
                            <p><span class="label" style="margin-right:6px";>Detail:</span><span>${$('#detail').val()}</span></p>
                            <p><span class="label" style="margin-right:6px";>Amount:</span><span>${$('#amount').val()}</span></p>
                            </body>
                            </html>`;

        // Write slip content to the new tab
        printWindow.document.open();
        printWindow.document.write(slipContent);
        printWindow.print();
        printWindow.document.close();



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


    $(document).ready(function() {
        GetDate();

        $('select').selectize({
            sortField: 'text'
        });

        $.ajax({
            url: "{{route('cash.vendors')}}", // This is the URL to the API
            method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function(response) {
                var data =response.data
                var select = $('#vendor')[0].selectize;
                for (var i = 0; i < data.length; i++) {
                    var newOption = {
                        value: data[i].id,
                        text: data[i].id + " | " + data[i].name
                    };
                    select.addOption(newOption);
                }

            }
        });
    });

    $('#form').on('submit', function(e) {
        e.preventDefault();
        var form = new FormData(this);
        form.append('type', '{{$type}}');
        if ($('#product_id').val() != '') {
            var url="{{route('cash.update',':id')}}";
            url=url.replace(':id',$('#product_id').val());
        }else{
            var url="{{route('cash.store')}}";
        }
        $.ajax({
            url: url,
            method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: form,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response);
                var data =response.data
                if (data['alert-type'] == "success") {
                    Swal.fire({
                        title: "Success!",
                        text: data['message'],
                        icon: "success",
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong.',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        });
    });
</script>
@endsection
