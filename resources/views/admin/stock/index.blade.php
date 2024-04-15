@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header card border border-danger">
                        <h4 class="card-title">
                            Stock
                        </h4>
                    </div>
                    <div class="card-body px-4 ">
                        <div class="row">
                            <div class="col-lg-12 ms-lg-auto ">
                                <div class="mt-4 mt-lg-0 table-responsive">
                                    <table id="stock-table" class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Date</th>
                                                <th>Barcode</th>
                                                <th>Item</th>
                                                <th>Price Per</th>
                                                <th>Quantity</th>
                                                <th>Weight</th>
                                                <th>Rate</th>
                                                <th>Total</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            @php
                                                $totalQuantity = 0;
                                                $totalWeight = 0;
                                                $payable = 0;
                                            @endphp
                                            @foreach ($stocks as $stock)
                                                @foreach ($stock->stockDetails as $stockDetails)
                                                    <tr>
                                                        <td>{{ $stockDetails->created_at }}</td>
                                                        <td>{{ $stockDetails->barcode }}</td>
                                                        <td>{{ $stockDetails->detail }}</td>
                                                        <td>{{ $stockDetails->price_per }}</td>
                                                        <td>{{ $stockDetails->quantity }}</td>
                                                        <td>{{ $stockDetails->weight }}</td>
                                                        <td>{{ $stockDetails->rate }}</td>
                                                        <td>{{ $stockDetails->total_amount }}</td>
                                                        <td>
                                                            <button class="delete-button"
                                                                onclick="Delete({{ $stockDetails->id }})">Delete</button>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $totalQuantity += $stockDetails->quantity;
                                                        $totalWeight += $stockDetails->weight;
                                                        $payable += $stockDetails->total_amount;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row my-4 justify-content-end">
                                    <div class="col-sm-2">
                                        <input type="number" step="any" name="quantity" id="quantity"
                                            class="form-control form-control card" placeholder="Total Metal"
                                            value="{{ $totalQuantity }}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="weight" id="weight" value="{{ $totalWeight }}"
                                            class="form-control form-control card" placeholder="Total Jewellery">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" name="total" id="total" value="{{ $payable }}"
                                            class="form-control form-control card bg-dark border-dark text-light"
                                            placeholder="payable">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" id="printDataTable">Print Data</button>
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
        function Print(barcode) {
            var parent = barcode.parentNode.parentNode;
            let printWindow = window.open("", "_blank");
            let slipContent = `
                            <!DOCTYPE html>
                            <html>
                            <head>
                            <style>
                                @media print {
                                    @page {
                                        size: 80mm 200mm;
                                        margin: 0;
                                        margin-top:-20px;
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
                            <svg id="barcode"></svg>
                            <p><span class="label" style="margin-right:6px;">${parent.children[5].innerHTML} | ${parent.children[4].innerHTML}</span></p>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.js" integrity="sha512-wkHtSbhQMx77jh9oKL0AlLBd15fOMoJUowEpAzmSG5q5Pg9oF+XoMLCitFmi7AOhIVhR6T6BsaHJr6ChuXaM/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"><\/script>
                            <script>
                        // Function to render barcode
                        function renderBarcode() {
                            const barcodeElement = document.getElementById("barcode");
                            if (barcodeElement) {
                                JsBarcode(barcodeElement, "${parent.children[1].innerHTML}", {
                                    format: "CODE128",
                                    width: 2,
                                    height: 50,
                                });
                                window.print();
                            } else {
                                // Barcode element not found, retry after a short delay
                                setTimeout(renderBarcode, 100);
                            }
                        }
                        // Start rendering barcode
                        renderBarcode();
                    <\/script>
                </body>
                </html>
            `;
            // Write slip content to the new tab
            printWindow.document.open();
            printWindow.document.write(slipContent);
            printWindow.print();
            printWindow.document.close();
        }

        function Delete(id) {
            url = "{{ route('stock.destroy', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "Delete",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(data) {
                    if (data['alert-type'] == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Stock deleted successfully!',
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

        function calculateSums(filteredData) {
            var totalAmountSum = filteredData
                .toArray()
                .reduce(function(sum, row) {
                    return sum + parseFloat(row.total_amount);
                }, 0);
            var totalQuantitySum = filteredData
                .toArray()
                .reduce(function(sum, row) {
                    return sum + parseFloat(row.total_quantity);
                }, 0);
            var totalWeightSum = filteredData
                .toArray()
                .reduce(function(sum, row) {
                    return sum + parseFloat(row.total_weight);
                }, 0);
            $('#quantity').val(totalQuantitySum.toFixed(2));
            $('#weight').val(totalWeightSum.toFixed(2));
            $('#total').val(totalAmountSum.toFixed(2));
        }

        function printCurrentDataTable() {
            var table = $('#stock-table').DataTable();
            var visibleRows = table.rows({
                search: 'applied'
            }).data().toArray();
            var styles = "<style>";
            styles += `
                    @media print {
                        body {
                            width: 210mm;
                            height: 297mm;
                            margin: 0;
                            font-family: 'Arial', sans-serif;
                            font-size: 12px;
                        }
                        .table {
                            width: 100%;
                            max-width: 100%;
                            margin-bottom: 1rem;
                            border-collapse: collapse;
                            box-sizing: border-box;
                        }
                        .table th, .table td {
                            padding: 0.75rem;
                            vertical-align: top;
                            border-top: 1px solid #dee2e6;
                            box-sizing: border-box;
                        }
                        .table thead th {
                            vertical-align: bottom;
                            border-bottom: 2px solid #dee2e6;
                            box-sizing: border-box;
                        }
                        .table-bordered {
                            border: 1px solid #dee2e6;
                            box-sizing: border-box;
                        }
                        .table-bordered th, .table-bordered td {
                            border: 1px solid #dee2e6;
                            box-sizing: border-box;
                        }
                    }
            `;
            styles += "</style>";
            var printContent = "<div class='centered-content'><table class='table table-bordered'>";
            printContent += "<thead><tr>";
            $('#stock-table thead th').each(function() {
                printContent += "<th>" + $(this).text() + "</th>";
            });
            printContent += "</tr></thead>";
            printContent += "<tbody>";
            for (var i = 0; i < visibleRows.length; i++) {
                printContent += "<tr>";
                $.each(visibleRows[i], function(key, value) {
                    printContent += "<td>" + value + "</td>";
                });
                printContent += "</tr>";
            }
            printContent += "</table></div>";
            var printWindow = window.open('', '', 'width=800, height=600');
            printWindow.document.write('<html><head><title>Print</title>');
            printWindow.document.write(styles);
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
        $(document).ready(function() {
            $('#stock-table').on('draw.dt', function() {
                var filteredData = table.rows({
                    search: 'applied'
                }).data();
                calculateSums(filteredData);
            });
        });
        $(document).on('click', '#printDataTable', function() {
            printCurrentDataTable();
        });
    </script>
@endsection
