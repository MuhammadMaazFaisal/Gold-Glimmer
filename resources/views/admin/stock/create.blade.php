@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header card border border-danger">
                    <h4 class="card-title">
                        Add Stock
                    </h4>
                </div>
                <div class="card-body p-4 ">
                    <div class="row">
                        <div class="col-lg-12 ms-lg-auto ">
                            <div class="mt-4 mt-lg-0">
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">S-Invoice:</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="s-invoice" id="s-invoice" class="form-control" placeholder="S-Invoice" readonly>
                                    </div>
                                    <label for="select-type" class="col-sm-1 col-form-label d-flex justify-content-end">P-Invoice:</label>
                                    <div class="col-sm-2">
                                        <input type="text" name="invoice" id="invoice" class="form-control" placeholder="P-Invoice" readonly>
                                    </div>
                                    <label for="vendor_id" class="col-sm-1 col-form-label d-flex justify-content-end">Vendor Id:</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="" id="vendor_id" name="vendor_id" class="form-control" placeholder="Vendor Id" readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <button id="select-invoice" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#invoice-modal">
                                            Select Invoice
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="stock" class="d-none col-lg-12 ms-lg-auto ">
                            <div class="mt-4 mt-lg-0">
                                <form id="stock-form" method="POST" enctype="multipart/form-data">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Detail</th>
                                                    <th colspan="2">Type</th>
                                                    <th colspan="2">Price Per</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Weight</th>
                                                    <th scope="col">Rate</th>
                                                    <th scope="col">Total Amount</th>
                                                    <th scope="col">Barcode</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="e-tbody">
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-success me-2">Print</button>
                                            <button id="submit" type="submit" name="submit" class="btn btn-primary disabled">Save</button>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header card border border-danger">
                    <h4 class="card-title">
                        Add Existing Stock
                    </h4>
                </div>
                <div class="card-body p-4 ">
                    <div id="existing_stock" class="col-lg-12 ms-lg-auto ">
                        <div class="mt-4 mt-lg-0">
                            <form id="existing-stock-form" method="POST" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Detail</th>
                                                <th colspan="2">Type</th>
                                                <th colspan="2">Price Per</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Rate</th>
                                                <th scope="col">Total Amount</th>
                                                <th scope="col">Barcode</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="existing-tbody">
                                            <tr>
                                                <td scope="row">1</td>
                                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                                                <td colspan="2"> <select id="type[]" class="type" name="type[]" placeholder="Type">
                                                        <option value="">Type</option>
                                                    </select>
                                                    <input type="hidden" id="id" name="id" value="">
                                                </td>
                                                <td colspan="2"><select class="form-control price_per" id="e_price_per[]" name="price_per[]" placeholder="Price per">
                                                        <option value="">Select price per</option>
                                                        <option value="Qty">Qty</option>
                                                        <option value="Tola">Tola</option>
                                                        <option value="K">K</option>
                                                    </select></td>
                                                <td> <input type="number" placeholder="" id="quantity[]" name="quantity[]" class="form-control"></td>
                                                <td> <input type="number" step="any" placeholder="" id="weight[]" name="weight[]" class="form-control"></td>
                                                <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control"></td>
                                                <td><input type="number" step="any" placeholder="" id="total[]" name="total[]" class="form-control"></td>
                                                <td><input id="barcode[]" name="barcode[]" value="" type="text" class="form-control"></td>
                                                <td><i onclick="AddStock()" class="fa fa-plus-circle fa-1x p-3"></i></td>
                                                <td class="d-none"><input type="text " class="form-control" id="pd_id[]" name="pd_id[]" value="existing"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-success me-2">Print</button>
                                        <button id="e-submit" type="submit" name="submit" class="btn btn-primary">Save</button>
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
<div class="modal fade" id="invoice-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="filter-form" method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <label for="from-date" class="col-sm-1 col-form-label d-flex justify-content-end">From:</label>
                        <div class="col-sm-1">
                            <input type="date" name="from-date" id="from-date" class="form-control">
                        </div>
                        <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">To:</label>
                        <div class="col-sm-1">
                            <input type="date" name="to-date" id="to-date" class="form-control">
                        </div>
                        <label for="select-type" class="col-sm-1 col-form-label d-flex justify-content-end">Invoice:</label>
                        <div class="col-sm-2">
                            <input type="text" name="invoice" id="m-invoice" value="" class="form-control" placeholder="Invoice" readonly>
                        </div>
                        <label for="vendor_name" class="col-sm-1 col-form-label d-flex justify-content-end">Vendor:</label>
                        <div class="col-sm-2">
                            <input type="text" value="" id="vendor_name" name="vendor_name" class="form-control" placeholder="Vendor Id" readonly>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
                <table class="table table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Vendor ID</th>
                            <th scope="col">Vendor Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="modal-tbody">
                    </tbody>
                </table>
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
    function GetDate() {
        var date = new Date().toISOString().slice(0, 10);
        var dataInputs = document.querySelectorAll('input[type="date"]');
        for (let i = 0; i < dataInputs.length; i++) {
            dataInputs[i].value = date;
        }
    }
    function getFilteredData(form) {
        const fromDate = $("#from-date").val();
        const toDate = $("#to-date").val();
        if (fromDate > toDate) {
            alert("Start date cannot be greater than end date");
            return;
        }
        var formData = new FormData(form);
        formData.append("function", "GetFilterData");
        $.ajax({
            url: "get_data.php",
            method: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {}
        });
    }
    function GetInvoices() {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetInvoices"
            },
            success: function(response) {
                data = JSON.parse(response);
                tbody = document.getElementById("modal-tbody");
                for (i = 0; i < data.length; i++) {
                    date = data[i].date;
                    const inputDateStr = data[i].date;
                    const inputDate = new Date(inputDateStr);
                    const day = inputDate.getDate().toString().padStart(2, '0');
                    const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
                    const year = inputDate.getFullYear();
                    const formattedDate = `${day}-${month}-${year}`;
                    value = `<tr id="${data[i].id}">
                            <th scope="row">${i+1}</th>
                            <td>${data[i].id}</td>
                            <td>${data[i].vendor_id}</td>
                            <td>${data[i].name}</td>
                            <td>Rs ${data[i].total}</td>
                            <td>${formattedDate}</td>
                            <td>
                                <button type="button" onclick="SelectInvoice(this)" class="btn btn-primary" >
                                    Select
                            </td>
                        </tr>`
                    tbody.innerHTML += value;
                }
            }
        });
    }
    function SelectInvoice(btn) {
        invoice = btn.parentNode.parentNode.id;
        vendor_id = btn.parentNode.parentNode.children[2].innerHTML;
        $("#invoice-modal").modal("hide");
        document.getElementById("invoice").value = invoice;
        document.getElementById("vendor_id").value = vendor_id;
        document.getElementById("stock").classList.remove("d-none");
        GetProductDetails(invoice);
    }
    function GetProductDetails(invoice) {
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetStockCount"
            },
            success: function(response) {
                response = JSON.parse(response);
                document.getElementById("s-invoice").value = response;
            }
        });
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetProductDetails",
                id: invoice
            },
            success: function(response) {
                data = JSON.parse(response);
                tbody = document.getElementById("e-tbody");
                tbody.innerHTML = "";
                for (i = 0; i < data.length; i++) {
                    value = `<tr>
                                <td scope="row">1</td>
                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details">${data[i].detail}</textarea></td>
                                <td colspan="2"><input type="text" class="form-control" id="type[]" name="type[]" value="${data[i].type}" placeholder="Type" readonly></td>
                                <td colspan="2"><input type="text" class="form-control" id="price_per[]" name="price_per[]" value="${data[i].price_per}" readonly></td>
                                <td> <input type="number" placeholder="${data[i].remaining_quantity}" id="quantity[]" name="quantity[]" class="form-control"></td>
                                <td> <input type="number" step="any" placeholder="${data[i].remaining_weight}" id="weight[]" name="weight[]" class="form-control"></td>
                                <td><input type="number" step="any" value="${data[i].rate}" id="rate[]" name="rate[]" class="form-control" readonly></td>
                                <td><input type="number" step="any" placeholder="${data[i].remaining_total_amount}" id="total[]" name="total[]" class="form-control"></td>
                                <td><input id="barcode[]" name="stock_barcode[]" value="${data[i].barcode}" type="text" class="form-control" readonly></td>
                                <td><div class="pt-2 form-check">
                                    <input class="form-check-input" type="checkbox" name="checkbox[]" id="checkbox[]">
                                </div></td>
                                <td class="d-none"><input type="number" class="form-control" id="pd_id[]" name="pd_id[]" value="${data[i].id}" readonly></td>
                            </tr>`
                    tbody.innerHTML += value;
                }
                const checkbox = document.querySelectorAll('input[id="checkbox[]"]');
                for (let i = 0; i < checkbox.length; i++) {
                    checkbox[i].addEventListener("change", function() {
                        if (this.checked) {
                            GenerateBarcode(this);
                        }
                    });
                }
                AddEventListeners();
            }
        });
    }
    function GenerateBarcode(btn) {
        unique = Math.floor(new Date().getTime() + Math.random());
        if (btn.parentNode.parentNode.previousElementSibling.children[0].value === "") {
            btn.parentNode.parentNode.previousElementSibling.children[0].value = unique;
        }
        document.getElementById("submit").classList.remove("disabled");
    }
    function CalculateTotal(i) {
        price_per = document.querySelectorAll('#price_per\\[\\]')[i];
        e_price_per = document.querySelectorAll('#e_price_per\\[\\]')[i];
        qty = document.querySelectorAll('#quantity\\[\\]')[i];
        weight = document.querySelectorAll('#weight\\[\\]')[i];
        rate = document.querySelectorAll('#rate\\[\\]')[i];
        total = document.querySelectorAll('#total\\[\\]')[i];
        if (e_price_per != undefined) {
            if (e_price_per.value == "K") {
                total.value = (weight.value * rate.value * 5).toFixed(0);
            } else if (e_price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (e_price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }
        if (price_per != undefined) {
            if (price_per.value == "K") {
                total.value = (weight.value * rate.value * 5).toFixed(0);
            } else if (price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }
        s_invoice = document.getElementById("s-invoice").value;
        if (s_invoice != "") {
            if (price_per.value == "K") {
                total.value = (qty.value * rate.value * 5).toFixed(0);
            } else if (price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }
    }
    function AddEventListeners() {
        $('select').not("select[name='type[]']").selectize({
            sortField: 'text'
        });
        price_per = document.querySelectorAll('#price_per\\[\\]');
        e_price_per = document.querySelectorAll('#e_price_per\\[\\]');
        weight = document.querySelectorAll('#weight\\[\\]');
        qty = document.querySelectorAll('#quantity\\[\\]');
        rate = document.querySelectorAll('#rate\\[\\]');
        for (let i = 0; i < price_per.length; i++) {
            price_per[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
            weight[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
            qty[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
            rate[i].addEventListener('change', function() {
                CalculateTotal(i);
            });
        }
        for (let i = 0; i < e_price_per.length; i++) {
            $(document).on('change', e_price_per[i], function() {
                CalculateTotal(i);
            });
        }
    }
    function AddStock() {
        let area = document.getElementById('existing-tbody');
        let tr = document.createElement('tr');
        tr.innerHTML = `<tr>
                            <td scope="row">1</td>
                            <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                            <td colspan="2"> <select id="type[]" class="type" name="type[]" placeholder="Type">
                                    <option value="">Type</option>
                                </select>
                                <input type="hidden" id="id" name="id" value="">
                            </td>
                            <td colspan="2"><select class="form-control price_per" id="e_price_per[]" name="price_per[]" placeholder="Price per">
                                    <option value="">Select price per</option>
                                    <option value="Qty">Qty</option>
                                    <option value="Tola">Tola</option>
                                    <option value="K">K</option>
                                </select></td>
                            <td> <input type="number" placeholder="" id="quantity[]" name="quantity[]" class="form-control"></td>
                            <td> <input type="number" step="any" placeholder="" id="weight[]" name="weight[]" class="form-control"></td>
                            <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control"></td>
                            <td><input type="number" step="any" placeholder="" id="total[]" name="total[]" class="form-control"></td>
                            <td><input id="barcode[]" name="barcode[]" value="" type="text" class="form-control"></td>
                            <td><i onclick="DeleteStock(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>
                            <td class="d-none"><input type="text" class="form-control" id="pd_id[]" name="pd_id[]" value="existing"></td>
                        </tr>`;
        area.appendChild(tr);
        type = tr.querySelectorAll("select[name='type[]']");
        select = $(type).selectize({
            create: true, // Allows users to create new items
            sortField: 'text'
        })[0].selectize;
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetAllTypes",
                type: "vendor"
            },
            success: function(response) {
                console.log("all types", response);
                var data = JSON.parse(response);
                for (var i = 0; i < data.length; i++) {
                    var newOption = {
                        value: data[i].barcode,
                        text: data[i].barcode + " | " + data[i].name
                    };
                    select.addOption(newOption);
                }
                select.on('change', function(value) {
                    GetType(type[0]);
                });
            }
        });
        AddEventListeners();
    }
    function DeleteStock(btn) {
        btn.parentNode.parentNode.remove();
    }
    $(document).ready(function() {
        GetDate();
        AddEventListeners();
        $('select').not("select[name='type[]']").selectize({
            sortField: 'text'
        });
        $("#from-date").change(function() {
            const fromDate = $(this).val();
            $("#to-date").attr("min", fromDate);
        });
        $(".clickable-row").click(function() {
            $(this).next(".hidden-row").toggle();
        });
        $("#select-invoice").click(GetInvoices());
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetAllTypes",
                type: "vendor"
            },
            success: function(response) {
                console.log("all types in event", response);
                var data = JSON.parse(response);
                type = document.querySelectorAll("select[name='type[]']");
                for (var j = 0; j < type.length; j++) {
                    select = $(type[j]).selectize({
                        create: true,
                        sortField: 'text'
                    })[0].selectize;
                    for (var i = 0; i < data.length; i++) {
                        var newOption = {
                            value: data[i].barcode,
                            text: data[i].barcode + " | " + data[i].name
                        };
                        select.addOption(newOption);
                    }
                    select.on('change', function(value) {
                        GetType(this.$input[0]);
                    });
                }
            }
        });
    });
    function GetType(element) {
        console.log("element", element);
        console.log(element.value);
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
                function: "GetDetailType",
                barcode: element.value
            },
            success: function(response) {
                console.log("detail type", response);
                var tr = element.parentNode.parentNode;
                if (response != "false") {
                    var data = JSON.parse(response);
                    price_per = tr.querySelectorAll("select[name='price_per[]']");
                    selectizeInstance = $(price_per).selectize()[0].selectize;
                    selectizeInstance.setValue(data.price_per);
                    // Prevent opening the dropdown
                    selectizeInstance.$control.css({
                        'pointer-events': 'none',
                        'background-color': '#eee', // Optional: visual feedback that it's read-only
                        'color': '#666' // Optional: visual feedback
                    });
                    tr.querySelectorAll("input[name='rate[]']")[0].value = data.rate;
                    tr.querySelectorAll("input[name='rate[]']")[0].readOnly = true;
                    tr.querySelectorAll("input[name='barcode[]']")[0].value = data.barcode;
                    tr.querySelectorAll("input[name='barcode[]']")[0].readOnly = true;
                } else {
                    price_per = tr.querySelectorAll("select[name='price_per[]']");
                    selectizeInstance = $(price_per).selectize()[0].selectize;
                    selectizeInstance.enable();
                    tr.querySelectorAll("input[name='barcode[]']")[0].value = Math.floor(new Date().getTime() + Math.random());
                }
            }
        });
    }
    $(document).on("submit", "#stock-form", function(e) {
        e.preventDefault();
        checkbox = document.querySelectorAll('input[id="checkbox[]"]');
        checkbox_values = [];
        for (let i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                checkbox_values.push(i);
            }
        }
        s_invoice = document.getElementById("s-invoice").value;
        p_id = document.getElementById("invoice").value;
        var formData = new FormData(this);
        formData.append("function", "AddStock");
        formData.append("checkbox_values", JSON.stringify(checkbox_values));
        formData.append("s_invoice", s_invoice);
        formData.append("p_id", p_id);
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                data = JSON.parse(response);
                if (data[0] == "success" && data[0] == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Stock Added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload();
                    });
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
    $(document).on("submit", "#existing-stock-form", function(e) {
        e.preventDefault();
        form = new FormData(this);
        form.append("function", "AddExistingStock");
        $.ajax({
            url: "functions.php",
            method: "POST",
            data: form,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                data = JSON.parse(response);
                if (data[0] == "success" && data[0] == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Stock Added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload();
                    });
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
</script>
@endsection
