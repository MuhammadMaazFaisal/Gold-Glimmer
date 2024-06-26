@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header card border border-danger">
                        <h4 class="card-title">
                            PURCHASING
                        </h4>
                    </div>
                    <div class="card-body px-4 ">
                        <div class="row">
                            <div class="col-lg-12 ms-lg-auto ">
                                <div class="mt-4 mt-lg-0">
                                    <form id="form" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-4 justify-content-between">
                                            <div class="col-sm-3">
                                                <select id="select-manufacturer" class="vendor" name="vendor_id"
                                                    placeholder="Pick a vendor..." required>
                                                    <option value="">Select a vendor...</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="invoice" id="invoice" class="form-control"
                                                    placeholder="Invoice" readonly required>
                                                <input type="hidden" name="id" id="id" class="form-control" placeholder="id">
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Detail</th>
                                                        <th colspan="2">Price Per</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Weight</th>
                                                        <th scope="col">Rate</th>
                                                        <th scope="col">Total Amount</th>
                                                        <th scope="col">Barcode</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                    <tr>
                                                        <td scope="row">1</td>
                                                        <td>
                                                            <textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;"
                                                                placeholder="Details"></textarea>
                                                        </td>
                                                        <td colspan="2"><select class="form-control price_per"
                                                                id="price_per[]" name="price_per[]"
                                                                placeholder="Price per">
                                                                <option value="Qty">Qty</option>
                                                                <option value="Tola">Tola</option>
                                                                <option value="K">K</option>
                                                            </select>
                                                        </td>
                                                        <td> <input type="number" value="" id="quantity[]"
                                                                name="quantity[]" class="form-control"
                                                                placeholder="Quantity"></td>
                                                        <td> <input type="number" step="any" value=""
                                                                id="weight[]" name="weight[]" class="form-control"
                                                                placeholder="Weight"></td>
                                                        <td><input type="number" step="any" value=""
                                                                id="rate[]" name="rate[]" class="form-control"
                                                                placeholder="Rate" required></td>
                                                        <td><input type="number" step="any" value=""
                                                                id="total[]" name="total[]" class="form-control"
                                                                placeholder="Total" onchange="GrandTotal()" required></td>
                                                        <td><input id="barcode[]" name="barcode[]" type="text"
                                                                class="form-control" placeholder=""
                                                                aria-label="Example text with button addon" value="{{ round(microtime(true) * 1000) . mt_rand(100, 999) }}"
                                                                aria-describedby="button-addon1" readonly></td>
                                                        <td class="d-none">
                                                            <div class="pt-2 form-check d-flex justify-content-center">
                                                                <input class="form-check-input" type="checkbox" checked
                                                                    name="checkbox[]" onclick="GenerateBarcode(this)"
                                                                    id="checkbox[]">
                                                            </div>
                                                        </td>
                                                        <td><i onclick="AddProduct()"
                                                                class="fa fa-plus-circle fa-1x p-3"></i></td>
                                                        <td><input type="hidden" step="any" value=""
                                                                id="rate_s[]" name="rate_s[]" class="form-control"
                                                                placeholder="Rate" required></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="row mb-4 d-flex justify-content-end">
                                                <div class="d-flex justify-content-end col-sm-2 ">
                                                    <input type="text" id="grand_total" name="grand_total"
                                                        class="form-control " placeholder="Grand Total" readonly required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-success me-2">Print</button>
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary">Save</button>
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
    <div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="product-table" class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice ID</th>
                                <th scope="col">Vendor ID</th>
                                <th scope="col">Vendor Name</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
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
        function DeletePurchasing() {
            var product = document.getElementById('invoice');
            if (product.value == '') {
                alert('Please Select Invoice');
            } else {
                let url = "{{ route('purchasing.destroy', ':id') }}";
                url = url.replace(':id', product.value);
                $.ajax({
                    url: url,
                    method: "Delete",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data['alert-type'] == 'success') {
                            location.reload();
                        }
                    }
                });
            }
        }

        function AddProduct() {
            let area = document.getElementById('tbody');
            let tr = document.createElement('tr');
            let count = document.querySelectorAll('#tbody tr').length + 1;
            let barcode = Math.floor(new Date().getTime() + Math.random());
            tr.innerHTML =
                `<th scope="row">${count}</th>
                              <td class="d-none"> <input type="text"  id="id[]" name="id[]" value="" placeholder="id" class="form-control d-none"></td>
                            <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                            <td colspan="2"><select class="form-control price_per" id="price_per[]" name="price_per[]" placeholder="Price per">
                                <option value="Qty">Qty</option>
                                <option value="Tola">Tola</option>
                                <option value="K">K</option>
                            </select></td>
                            <td> <input type="number" value="" id="quantity[]" name="quantity[]" class="form-control" placeholder="Quantity" ></td>
                            <td> <input type="number" step="any" value="" id="weight[]" name="weight[]" class="form-control" placeholder="Weight" ></td>
                            <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control" placeholder="Rate" required></td>
                            <td><input type="number" step="any" value="" id="total[]" name="total[]" class="form-control" placeholder="Total" required></td>
                            <td><input id="barcode[]" name="barcode[]" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="${barcode}"
                                 readonly></td>
                            <td class="d-none">
                                <div class="pt-2 form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" checked
                                        name="checkbox[]" onclick="GenerateBarcode(this)"
                                        id="checkbox[]">
                                </div>
                            </td>
                        <td><i onclick="DeleteProduct(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>
                                                                        <td><input type="hidden" step="any" value="" id="rate_s[]" name="rate_s[]" class="form-control" placeholder="Rate" required></td>`;
            area.appendChild(tr);
            AddEventListeners();
        }

        function DeleteProduct(e) {
            e.parentNode.parentNode.remove();
        }

        function GrandTotal() {
            total = document.querySelectorAll('#total\\[\\]');
            let grand_total = 0;
            for (let i = 0; i < total.length; i++) {
                grand_total += parseInt(total[i].value);
            }
            document.getElementById('grand_total').value = grand_total;
        }

        function GenerateBarcode(btn) {
            unique = Math.floor(new Date().getTime() + Math.random());
            if (btn.parentNode.parentNode.previousElementSibling.children[0].value == "") {
                btn.parentNode.parentNode.previousElementSibling.children[0].value = unique;
            } else {
                btn.parentNode.parentNode.previousElementSibling.children[0].value = "";
            }
        }

        function CalculateTotal(i) {
            price_per = document.querySelectorAll('#price_per\\[\\]')[i];
            qty = document.querySelectorAll('#quantity\\[\\]')[i];
            weight = document.querySelectorAll('#weight\\[\\]')[i];
            rate = document.querySelectorAll('#rate\\[\\]')[i];
            total = document.querySelectorAll('#total\\[\\]')[i];
            if (price_per.value == "K") {
                total.value = (weight.value * rate.value * 5).toFixed(0);
                GrandTotal();
            } else if (price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
                GrandTotal();
            } else if (price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
                GrandTotal();
            }
        }

        function GetProductId(btn) {
            var id = btn.parentNode.parentNode.id;
            var vendor_id = btn.parentNode.parentNode.children[2].innerHTML;
            var total = btn.parentNode.parentNode.children[4].innerHTML;
            $('#product-modal').modal('hide');
            var product = document.getElementById("invoice");
            product.value = id;
            document.getElementById('id').value = id;
            GetPurchasingDetails(id, vendor_id, total);
        }

        function GetPurchasingDetails(id, vendor_id, total) {
            var delete_btn = document.getElementById("delete-product");
            delete_btn.disabled = false;
            let url = "{{ route('purchasing.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log("GetPurchasingDetails", data);
                    var area = document.getElementById('tbody');
                    area.innerHTML = "";
                    let GrandTotal = document.getElementById('grand_total');
                    GrandTotal.value = total;
                    var select_manufacturer = $('#select-manufacturer')[0].selectize;
                    select_manufacturer.setValue(vendor_id);
                    for (i = 0; i < data.length; i++) {
                        let tr =
                            `<tr>
                                <td scope="row">1</td>
                                <td class="d-none"> <input type="text"  id="id[]" name="id[]" value="${data[i].id}" placeholder="id" class="form-control d-none"></td>
                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details">${data[i].detail}</textarea></td>
                               <td colspan="2"><select class="form-control price_per" id="price_per[]" name="price_per[]" placeholder="Price per">`;
                        if (data[i].price_per == "Qty") {
                            tr += `<option value="Qty" selected>Qty</option>
                                        <option value="Tola">Tola</option>
                                        <option value="K">K</option>`;
                        } else if (data[i].price_per == "Tola") {
                            tr += `<option value="Qty">Qty</option>
                                        <option value="Tola" selected>Tola</option>
                                        <option value="K">K</option>`;
                        } else if (data[i].price_per == "K") {
                            tr += `<option value="Qty">Qty</option>
                                        <option value="Tola">Tola</option>
                                        <option value="K" selected>K</option>`;
                        }
                        tr += `</select></td>
                                <td> <input type="number"  id="quantity[]" name="quantity[]" value="${data[i].quantity}" class="form-control" placeholder="Quantity"></td>
                                <td> <input type="number" step="any"  id="weight[]" name="weight[]" value="${data[i].weight}" class="form-control" placeholder="Weight"></td>
                                <td><input type="number" step="any"  id="rate[]" name="rate[]" value="${data[i].rate}" class="form-control" placeholder="Rate" required></td>
                                <td><input type="number" step="any"  id="total[]" name="total[]" value="${data[i].total_amount}" class="form-control" placeholder="Total" onchange="GrandTotal()" required></td>
                                <td><input id="barcode[]" name="barcode[]" value="${data[i].barcode}" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly></td>
                                <td><div class="pt-2 form-check d-flex justify-content-center">
                                    <input class="form-check-input" checked type="checkbox" name="checkbox[]" onclick="GenerateBarcode(this)" id="checkbox[]">
                                </div></td>`;
                        if (i == 0) {
                            tr += `<td><i onclick="AddProduct()" class="fa fa-plus-circle fa-1x p-3"></i></td>`;
                        } else {
                            tr +=
                                `<td><i onclick="DeleteProduct(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>`
                        }
                        tr += `</tr>`;
                        area.innerHTML += tr;
                    }
                    AddEventListeners();
                }
            });
        }

        function AddEventListeners() {
            $('select').not("select[name='type[]']").selectize({
                sortField: 'text'
            });
            price_per = document.querySelectorAll('#price_per\\[\\]');
            weight = document.querySelectorAll('#weight\\[\\]');
            qty = document.querySelectorAll('#quantity\\[\\]');
            rate = document.querySelectorAll('#rate\\[\\]');
            price_per.forEach((e, i) => {
                selectize = $(e).selectize()[0].selectize;
                selectize.on('change', function() {
                    CalculateTotal(i);
                });
            });
            for (let i = 0; i < price_per.length; i++) {
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
        }
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('purchasing.index') }}", // path to function
                method: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log("purchasing", data);
                    var tbody = document.getElementById("product-table-body");
                    for (var i = 0; i < data.length; i++) {
                        var tr = document.createElement("tr");
                        var td1 = document.createElement("td");
                        var td2 = document.createElement("td");
                        var td3 = document.createElement("td");
                        var td4 = document.createElement("td");
                        var td4_1 = document.createElement("td");
                        var td5 = document.createElement("td");
                        var td6 = document.createElement("td");
                        var btn = document.createElement("button");
                        btn.innerHTML = "Select";
                        btn.className = "btn btn-primary";
                        btn.addEventListener("click", function() {
                            GetProductId(this);
                        });
                        tr.id = data[i].id;
                        td1.innerHTML = i + 1;
                        td2.innerHTML = data[i].id;
                        td3.innerHTML = data[i].vendor_id;
                        td4.innerHTML = data[i].vendor.name;
                        td4_1.innerHTML = data[i].total;
                        date = data[i].created_at;
                        const inputDateStr = data[i].created_at;
                        const inputDate = new Date(inputDateStr);
                        const day = inputDate.getDate().toString().padStart(2, '0');
                        const month = (inputDate.getMonth() + 1).toString().padStart(2, '0');
                        const year = inputDate.getFullYear();
                        const formattedDate = `${day}-${month}-${year}`;
                        td5.innerHTML = formattedDate;
                        td6.classList.add("p-1");
                        td6.appendChild(btn);
                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td4_1);
                        tr.appendChild(td5);
                        tr.appendChild(td6);
                        tbody.appendChild(tr);
                    };
                }
            });
            AddEventListeners();
            $.ajax({
                url: "{{ route('next-purchasing-number') }}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    document.getElementById('invoice').value = 'P-' + data;
                }
            });
            $.ajax({
                url: "{{ route('purchasing.vendors') }}",
                method: "GET",
                
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    function: "GetAllVendorData",
                    type: "Additional Vendor"
                },
                success: function(data) {
                    console.log(data);
                    var select = $('#select-manufacturer')[0].selectize;
                    console.log(select);
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

        $("#form").submit(function(e) {
            e.preventDefault();
            checkbox = document.querySelectorAll('input[id="checkbox[]"]');
            checkbox_values = [];
            for (let i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) {
                    checkbox_values.push(1);
                } else {
                    checkbox_values.push(0);
                }
            }
            let formData = new FormData(this);
            formData.append("checkbox_values", JSON.stringify(checkbox_values));
            if (document.getElementById('id').value != "") {
                url = "{{ route('purchasing.update', ':id') }}";
                url = url.replace(':id', document.getElementById('id').value);
            }else{
                url = "{{ route('purchasing.store') }}";
            }
            console.log(url);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data['alert-type'] == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data['message'],
                            showConfirmButton: true
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
