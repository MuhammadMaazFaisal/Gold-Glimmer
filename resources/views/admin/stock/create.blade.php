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
                    <div id="existing_stock" class="col-lg-12 ms-lg-auto ">
                        <div class="mt-4 mt-lg-0">
                            <form id="existing-stock-form" method="POST" enctype="multipart/form-data">
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
                                        <tbody id="existing-tbody">
                                            <tr>
                                                <td scope="row">1</td>
                                                <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                                                <td colspan="2"><select class="form-control price_per" id="price_per[]" name="price_per[]" placeholder="Price per">
                                                        <option value="">Select price per</option>
                                                        <option value="Qty">Qty</option>
                                                        <option value="Tola">Tola</option>
                                                        <option value="K">K</option>
                                                    </select></td>
                                                <td> <input type="number" placeholder="" id="quantity[]" name="quantity[]" class="form-control"></td>
                                                <td> <input type="number" step="any" placeholder="" id="weight[]" name="weight[]" class="form-control"></td>
                                                <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control"></td>
                                                <td><input type="number" step="any" placeholder="" id="total[]" name="total[]" class="form-control"></td>
                                                <td><input id="barcode[]" name="barcode[]" value="" type="text" class="form-control" readonly></td>
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

    function GenerateBarcode(btn) {
        unique = Math.floor(new Date().getTime() + Math.random());
        if (btn.parentNode.nextElementSibling.children[0].value === "") {
            btn.parentNode.nextElementSibling.children[0].value = unique;
        }
    }

    function CalculateTotal(i) {
        price_per = document.querySelectorAll('#price_per\\[\\]')[i];
        qty = document.querySelectorAll('#quantity\\[\\]')[i];
        weight = document.querySelectorAll('#weight\\[\\]')[i];
        rate = document.querySelectorAll('#rate\\[\\]')[i];
        total = document.querySelectorAll('#total\\[\\]')[i];
        if (price_per != undefined) {
            if (price_per.value == "K") {
                total.value = (weight.value * rate.value * 5).toFixed(0);
            } else if (price_per.value == "Tola") {
                total.value = ((weight.value / 11.664) * rate.value).toFixed(0);
            } else if (price_per.value == "Qty") {
                total.value = (qty.value * rate.value).toFixed(0);
            }
        }
        GenerateBarcode(total)
    }
    function AddEventListeners() {
        $('select').not("select[name='type[]']").selectize({
            sortField: 'text'
        });
        price_per = document.querySelectorAll('#price_per\\[\\]');
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
    }
    function AddStock() {
        let area = document.getElementById('existing-tbody');
        let tr = document.createElement('tr');
        let count = area.children.length + 1;
        let barcode = Math.floor(new Date().getTime() + Math.random());
        tr.innerHTML = `<tr>
                            <td scope="row">${count}</td>
                            <td><textarea type="text" name="detail[]" id="detail[]" class="form-control" style="height: 20px;" placeholder="Details"></textarea></td>
                           <td colspan="2"><select class="form-control price_per" id="price_per[]" name="price_per[]" placeholder="Price per">
                                    <option value="">Select price per</option>
                                    <option value="Qty">Qty</option>
                                    <option value="Tola">Tola</option>
                                    <option value="K">K</option>
                                </select></td>
                            <td> <input type="number" placeholder="" id="quantity[]" name="quantity[]" class="form-control"></td>
                            <td> <input type="number" step="any" placeholder="" id="weight[]" name="weight[]" class="form-control"></td>
                            <td><input type="number" step="any" value="" id="rate[]" name="rate[]" class="form-control"></td>
                            <td><input type="number" step="any" placeholder="" id="total[]" name="total[]" class="form-control"></td>
                            <td><input id="barcode[]" name="barcode[]" value="" type="text" class="form-control" readonly value="${barcode}"
                                ></td>
                            <td><i onclick="DeleteStock(this)" class="fa fa-minus-circle fa-1x p-3"></i></td>
                            <td class="d-none"><input type="text" class="form-control" id="pd_id[]" name="pd_id[]" value="existing"></td>
                        </tr>`;
        area.appendChild(tr);
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
    });
    $(document).on("submit", "#existing-stock-form", function(e) {
        e.preventDefault();
        form = new FormData(this);
        $.ajax({
            url: "{{ route('stock.store') }}",
            method: "POST",
            data: form,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
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
