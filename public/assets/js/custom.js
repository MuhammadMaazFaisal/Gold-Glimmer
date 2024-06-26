function GrandTotal() {
    var zircon_total = parseFloat(document.getElementById('zircon_total').value);
    if (isNaN(zircon_total)) {
        zircon_total = 0;
    }
    var stone_total = parseFloat(document.getElementById('stone_total').value);
    if (isNaN(stone_total)) {
        stone_total = 0;
    }
    var total = zircon_total + stone_total;
    document.getElementById('grand_total').value = total;
}

function ZirconQuantity(current) {
    var zircon_quantity = current.querySelectorAll('input[id="zircon_quantity[]"]');
    var total = 0;
    zircon_quantity.forEach(function(input) {
        if (input.value) {
            total += parseFloat(input.value);
        }
    });
    current.querySelector('input[id="zircon_total_quantity[]"]').value = total;
    ZirconWeight(current);
    SGrandWeight(current)
}

function ZirconWeight(current) {
    var zircon_weight = current.querySelectorAll('input[id="zircon_weight[]"]');
    total = 0;
    for (var i = 0; i < zircon_weight.length; i++) {
        if (zircon_weight[i].value) {
            total += parseFloat(zircon_weight[i].value);
        }
    }
    current.querySelector('input[id="zircon_total_weight[]"]').value = total;
    SGrandWeight(current)
}

function StoneQuantity(current) {
    var stone_quantity = current.querySelectorAll('input[id="stone_quantity[]"]');
    var total = 0;
    stone_quantity.forEach(function(input) {
        if (input.value) {
            total += parseFloat(input.value);
        }
    });
    current.querySelector('input[id="stone_total_quantity[]"]').value = total;
    StoneWeight(current);
    SGrandWeight(current)
}

function StoneWeight(current) {
    var stone_weight = current.querySelectorAll('input[id="stone_weight[]"]');
    total = 0;
    for (var i = 0; i < stone_weight.length; i++) {
        if (stone_weight[i].value) {
            total += parseFloat(stone_weight[i].value);
        }
    }
    current.querySelector('input[id="stone_total_weight[]"]').value = total;
    SGrandWeight(current)
}

function ReturnedQuantity(element) {
    var r_quantity = element.querySelectorAll('input[id="r_quantity[]"]');
    var total = 0;
    r_quantity.forEach(function(input) {
        if (input.value) {
            total += parseFloat(input.value);
        }
    });
    element.querySelector('input[id="r_stone_quantity"]').value = total;
    var r_rate = element.querySelector('input[id="r_rate"]');
    var event = new Event('change');
    r_rate.dispatchEvent(event);
    ReturnedWeight(element);
}

function ReturnedWeight(element) {
    var r_weight = element.querySelectorAll('input[id="r_weight[]"]');
    var r_quantity = element.querySelectorAll('input[id="r_quantity[]"]');
    total = 0;
    for (var i = 0; i < r_weight.length; i++) {
        if (r_weight[i].value) {
            total += parseFloat(r_weight[i].value);
        }
    }
    element.querySelector('input[id="r_stone_weight"]').value = total;
}

function CalculatePayable() {
    var total_weight_issue = parseFloat($(document).find('#total-weight-issue').val());
    var received_weight = parseFloat($(document).find('#received_weight').val());
    var stone_received = parseFloat($(document).find('#stone_received').val());
    var wastage = parseFloat($(document).find('#wastage1').val());
    if (total_weight_issue !== "" && received_weight !== "" && stone_received !== "" && wastage !== "") {
        var total = received_weight + stone_received + wastage;
        $(document).find('#Total').val(total);
        var payable = (total_weight_issue - total).toFixed(2) + '0';
        $(document).find('#Payable').val(payable);
    }
}

function CalculateTotal() {
    var stepIssueweight = parseFloat($(document).find('#stepIssueweight').val());
    var Zircon = parseFloat($(document).find('#Zircon').val());
    var stone_weight = parseFloat($(document).find('#stone_weight').val());
    if (stepIssueweight != '' && Zircon != '' && stone_weight != '') {
        var total = (stepIssueweight + Zircon + stone_weight).toFixed(2) + '0';
        $(document).find('#total-weight-issue').val(total);
    }
}

function restoreDiv() {
    // Restore the original content of the div
    document.getElementById("print-div").innerHTML = originalContent;
}

function BarCode(btn) {
    var inputElement = btn.parentNode.parentNode.childNodes[5].childNodes[1];
    const event = new KeyboardEvent('keydown', {
        keyCode: 13
    });
    inputElement.dispatchEvent(event);
    const barcode = inputElement.value;
}

function CalculateWastage() {
    var manufacturer_rate = parseFloat(document.getElementById('manufacturer-rate').value);
    var unpolish_weight = parseFloat(document.getElementById('unpolish_weight').value);
    if (!isNaN(manufacturer_rate) && !isNaN(unpolish_weight)) {
        var wastage = (unpolish_weight * manufacturer_rate) / 96;
        wastage = parseFloat(wastage.toFixed(2));
        document.getElementById('wastage').value = wastage;
    }
    var selectElement = document.getElementById('select-manufacturer-purity');
    var selectedValues = selectElement.value;
    var selectedOption = selectElement.selectedOptions[0]; // Assuming you're only selecting one option
    var selectedText = selectedOption.text;
    if (selectedText == '18k') {
        var tValues = document.getElementById('tValues');
        var total = (unpolish_weight + wastage) * 0.75;
        tValues.value = total.toFixed(2) + '0';
    } else if (selectedText == '21k') {
        var tValues = document.getElementById('tValues');
        tValues.value = ((unpolish_weight + wastage) * 0.875).toFixed(2) + '0';
    } else if (selectedText == '22k') {
        var tValues = document.getElementById('tValues');
        tValues.value = ((unpolish_weight + wastage) * 0.916).toFixed(2) + '0';
    }
    CalculateDifference()
}

function TotalWeight(element) {
    var total_weight = element.querySelector("input[id='r_total_weight']");
    var stone_weight = element.querySelector("input[id='r_stone_weight']");
    if (stone_weight.value == "") {
        stone_weight.value = 0;
    }
    var received_weight = element.querySelector("input[id='received_weight']");
    total_weight.value = parseFloat(stone_weight.value) + parseFloat(received_weight.value);
    GrandWeight(element);
    ReturnedPayable(element);
}

function GrandWeight(element) {
    var total_weight = element.querySelector("input[id='r_total_weight']");
    var wastage = element.querySelector("input[id='r_wastage']");
    var received_weight = element.querySelector("input[id='received_weight']");
    var grand_total_weight = element.querySelector("input[id='r_grand_weight']");
    grand_total_weight.value = parseFloat(total_weight.value) + parseFloat(wastage.value);
    ReturnedPayable(element);
}

function ReturnedPayable(element) {
    var payable = element.querySelector("input[id='r_payable']");
    var r_grand_weight = element.querySelector("input[id='r_grand_weight']");
    var grand_total_weight = element.previousElementSibling.querySelector("input[id='grand_total_weight[]']");
    payable.value = (parseFloat(grand_total_weight.value) - parseFloat(r_grand_weight.value)).toFixed(2) + "0";
}

function SGrandWeight(current) {
    var total = current.querySelector("input[id='grand_total_weight[]']");
    var stone_total_weight = current.querySelector("input[id='stone_total_weight[]']");
    var zircon_total_weight = current.querySelector("input[id='zircon_total_weight[]']");
    var stepIssueweight = current.querySelector("input[id='stepIssueweight[]']");
    if (stepIssueweight.value == "") {
        stepIssueweight.value = 0;
    }
    if (stone_total_weight.value == "") {
        stone_total_weight.value = 0;
    }
    if (zircon_total_weight.value == "") {
        zircon_total_weight.value = 0;
    }
    value = parseFloat(stone_total_weight.value) + parseFloat(zircon_total_weight.value) + parseFloat(
        stepIssueweight
        .value);
    total.value = value.toFixed(2) + '0';
    const event = new Event("change", {
        bubbles: true
    });
    total.dispatchEvent(event);
}

function AddStoneSetter() {
    var product_id = document.getElementsByClassName('code')[0].value;
    let area = document.getElementById("stone-setter-area");
    const retainedWeightInputs = document.querySelectorAll('input[id="retained_weight[]"]');
    const lastRetainedWeightInput = retainedWeightInputs[retainedWeightInputs.length - 1];
    const lastRetainedWeightValue = lastRetainedWeightInput.value;
    var date = new Date().toISOString().slice(0, 10);
    area.innerHTML += `
                    <h1>Stone Setter</h1>
                    <hr>	<div class="mt-4 mt-lg-0">
                       <form id="stepthree" method="POST" enctype="multipart/form-data">
                           <?php
                           $randomstone = random_int(0000000000, 779900000000);
                           echo "<input type='hidden' name='stonebarcode' value='$randomstone' class='form-control'>";
                           ?>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Name:</label>
                               <div class="col-sm-5">
                                   <select id="select-stone_setter[]" name="vendor[]" placeholder="Pick a stone setter..." required>
                                       <option value="">Select a stone setter...</option>
                                   </select>
                               </div>
                               <label for="horizontal-firstname-input" class="bar-code col-sm-1 col-form-label d-flex justify-content-end">Bar Code:</label>
                               <div class="col-sm-5">
                                   <input type="text" name="code[]" value="${product_id}"" class="form-control code" placeholder="code" readonly>
                               </div>
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Date:</label>
                               <div class="col-sm-5">
                                   <input type="date" name="date[]" id="s_date" value="${date}" class="form-control" placeholder="Date">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Image Upload:</label>
                               <div class="col-sm-5">
                                   <input type="file" id="image[]" name="image[]" value="" class="form-control" accept="image/*">
                               </div>
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Details:</label>
                               <div class="col-sm-11">
                                   <textarea type="text" name="detail[]" id="s_details[]" class="form-control" style="height: 107px;" placeholder="Details"></textarea>
                               </div>
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Total Weight (g):</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="s_total_weight[]" id="s_total_weight[]" value="${lastRetainedWeightValue}" class="form-control" placeholder="Total Weight" readonly>
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">- Retained Weight (g):</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="retained_weight[]" id="retained_weight[]" class="form-control" placeholder="Retained Weight">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">= Issued Weight (g):</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="Issued_weight[]" id="stepIssueweight[]" class="form-control" placeholder="Issued Weight" readonly>
                               </div>
                           </div>
                           <div class="row mb-4">
                               <h5>Zircon:</h6>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label  d-flex justify-content-end">Code:</label>
                                                    <div class="col-sm-1">
                                                        <select name="zircon_code[]" id="zircon_code[]" value="" class="form-control" placeholder="Zircon">
                                                            <option value="">Select a zircon...</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2 p-0">
                                                    <input type="text" name="zircon_detail[]" id="zircon_detail[]" value="" class="form-control" placeholder="Zircon Detail">
                                                    </div>
                                   <label for="horizontal-firstname-input" class="col-sm-1 col-form-label  d-flex justify-content-end">Weight (g):</label>
                                   <div class="col-sm-2">
                                       <input type="number" step="any" name="zircon_weight[]" id="zircon_weight[]" value="" class="form-control" placeholder="Zircon">
                                   </div>
                                   <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                   <div class="col-sm-2">
                                       <input type="number" name="zircon_quantity[]" id="zircon_quantity[]" value="" class="form-control" placeholder="Zircon">
                                   </div>
                                   <div class="col-sm-2">
                                       <i onclick="Add(this)" class="fa fa-plus-circle p-2"></i>
                                   </div>
                           </div>
                           <div id="area">
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Total Weight (g):</label>
                               <div class="col-sm-2">
                                   <input type="number" step="any" name="zircon_total_weight[]" value="" id="zircon_total_weight[]" class="form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                               <div class="col-sm-1"></div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Total Quantity:</label>
                               <div class="col-sm-2">
                                   <input type="number" name="zircon_total_quantity[]" value="0" id="zircon_total_quantity[]" class="form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-none">Total Price:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="zircon_total[]" value="" id="zircon_total[]" class="d-none form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                           </div>
                           <div class="row mb-4">
                               <h5>Stone:</h5>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Code:</label>
                               <div class="col-sm-1">
                                   <select name="stone_code[]" id="stone_code[]" value="" class="form-control" placeholder="Stone Code">
                                       <option value="">Select a stone...</option>
                                   </select>
                               </div>
                               <div class="col-sm-2 p-0">
                               <input type="text" name="stone_detail[]" id="stone_detail[]" value="" class="form-control" placeholder="Stone Detail">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                               <div class="col-sm-2">
                                   <input type="number" step="any" name="stone_weight[]" id="stone_weight[]" value="" class="form-control" placeholder="Stone Weight">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                               <div class="col-sm-2">
                                   <input type="number" name="stone_quantity[]" id="stone_quantity[]" value="" class="form-control" placeholder="Stone Quantity">
                               </div>
                               <div class="col-sm-2">
                                   <i onclick="AddStone(this)" class="fa fa-plus-circle p-2"></i>
                               </div>
                           </div>
                           <div id="area2">
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Total Weight (g):</label>
                               <div class="col-sm-2">
                                   <input type="number" step="any" name="stone_total_weight[]" value="" id="stone_total_weight[]" class="form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                               <div class="col-sm-1"></div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Total Quantity:</label>
                               <div class="col-sm-2">
                                   <input type="number" name="stone_total_quantity[]" value="" id="stone_total_quantity[]" class="form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-none">Total Price:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="stone_total[]" value="" id="stone_total[]" class="d-none form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label ">Grand Total Weight (g):</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="grand_total_weight[]" value="" id="grand_total_weight[]" class=" form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                           </div>
                           <div class="row mb-4">
                               <h5 class="d-none">Grand Total:</h5>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-none">Total Price:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="grand_total[]" value="" id="grand_total[]" class="d-none form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                           </div>
                           <hr />
                           <div class="row justify-content-end mb-3">
                               <div class="col-sm-9">
                                   <div>
                                       <button type="button" class="btn btn-success waves-effect waves-light" onclick="PrintSetter(this)">Print</button>
                                       <button type="submit" class="btn btn-primary btn1" id="s_save">Save</button>
                                   </div>
                               </div>
                           </div>
                       </form>
                       <form id="r_stepthree" method="POST" enctype="multipart/form-data">
                           <div class="row">
                               <label for="received_weight">Recieved Weight (g):</label>
                               <div class="col-sm-4 mb-4">
                                   <input type="number" step="any" name="received_weight" value="" id="received_weight" class="form-control" placeholder="Received weight">
                               </div>
                               <div id="returned-area[]" class="row">
                                   <h5>Zircon/Stone Return:</h5>
                                   <div class="row mb-4"><label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Detail:</label>
                                       <div class="col-sm-3">
                                           <input type="text" name="r_code[]" id="r_code[]" value="" class="form-control" placeholder="Detail">
                                       </div>
                                       <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                                       <div class="col-sm-2">
                                           <input type="number" step="any" name="r_weight[]" id="r_weight[]" value="" class="form-control" placeholder="Weight">
                                       </div>
                                       <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                                       <div class="col-sm-2">
                                           <input type="number" name="r_quantity[]" id="r_quantity[]" value="" class="form-control" placeholder="Quantity">
                                       </div>
                                       <div class="col-sm-2">
                                           <i class="fa fa-plus-circle p-2" onclick="AddReturned(this)"></i>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Stone Weight (g):</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="r_stone_weight" value="" id="r_stone_weight" class="form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Stone Quantity:</label>
                               <div class="col-sm-3">
                                   <input type="number" name="r_stone_quantity" value="" id="r_stone_quantity" class="form-control form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Total Weight Return:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="r_total_weight" value="" id="r_total_weight" class="form-control" placeholder="Total">
                               </div>
                               <label for="horizontal-firstname-input" for="r_rate" class="col-sm-1 col-form-label d-flex justify-content-end">Rate:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" value="" id="r_rate" name="r_rate" class="form-control" placeholder="Rate" required>
                               </div>
                               <label for="horizontal-firstname-input" for="sh_qty" class="col-sm-1 col-form-label d-flex justify-content-end">S-Quantity:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" value="" id="sh_qty" name="sh_qty" class="form-control" placeholder="Shruded Quantity">
                               </div>
                           </div>
                           <div class="row mb-4">
                               <label for="horizontal-firstname-input" for="r_wastage" class="col-sm-1 col-form-label d-flex justify-content-end">Wastage:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" value="" id="r_wastage" name="r_wastage" class="form-control" placeholder="Wastage" readonly>
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Grand Weight (g):</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="r_grand_weight" value="" id="r_grand_weight" class="form-control card bg-dark border-dark text-light" placeholder="Total">
                               </div>
                               <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Payable:</label>
                               <div class="col-sm-3">
                                   <input type="number" step="any" name="r_payable" value="" id="r_payable" class="form-control" placeholder="Total">
                               </div>
                           </div>
                           <div class="row justify-content-end">
                               <div class="col-sm-9">
                                   <div>
                                       <button type="button" class="btn btn-success waves-effect waves-light" onclick="PrintReturned(this)>Print</button>
                                       <button type="submit" class="btn btn-primary btn1" id="r_save">Save</button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>`;
    var retained_weight = document.querySelectorAll('input[id="retained_weight[]"]');
    for (var i = 0; i < retained_weight.length; i++) {
        retained_weight[i].addEventListener("change", function() {
            CalculateIssuedWeight(this);
        });
    };
    async function runLoop2() {
        await ReturnedStoneListeners();
        await StoneSetterListeners();
        await GetStoneSetterNames();
        await GetAllZircons();
        await GetAllStones();
    }
    runLoop2();
}

function ReturnTotalWeight(element) {
    let total = element.querySelector("input[id='r_total_weight']");
    let received_weight = element.querySelector("input[id='received_weight']");
    let r_stone_weight = element.querySelector("input[id='r_stone_weight']");
    if (r_stone_weight.value == "") {
        r_stone_weight.value = 0;
    }
    total.value = parseFloat(received_weight.value) + parseFloat(r_stone_weight.value);
}


image.onchange = evt => {
    const [file] = image.files
    if (file) {
        preview.src = URL.createObjectURL(file);
        $('#preview').css("display", "block");
    }
}
async function runLoop1() {
    await GetDate();
    await GetAllZircons();
    await GetAllStones();
    await GetStoneSetterNames();
}

function AddStone(element) {
    var area2 = element.parentNode.parentNode.nextElementSibling;
    var div2 = document.createElement("div");
    div2.setAttribute("class", "row mb-4 remove");
    div2.innerHTML = `<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Code:</label>
                       <div class="col-sm-1">
                       <select name="stone_code[]" id="stone_code[]" value="" class="form-control" placeholder="Stone Code">
                                                                <option value="">Select a stone...</option>
                                                            </select>
                       </div>
                       <div class="col-sm-2 p-0">
                       <input type="text" name="stone_detail[]" id="stone_detail[]" value="" class="form-control" placeholder="Stone Detail">
                       </div>
                       <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                       <div class="col-sm-2">
                           <input type="text" name="stone_weight[]" id="stone_weight[]" value="" class="form-control" placeholder="Stone Weight">
                       </div>
                       <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                       <div class="col-sm-2">
                           <input type="text" name="stone_quantity[]" id="stone_quantity[]" value="" class="form-control" placeholder="Stone Quantity">
                       </div>
                       <div class="col-sm-2">
                           <i class="delete-stone fa fa-minus-circle p-2"></i>
                       </div>`;
    area2.appendChild(div2);
    var stone_weight = document.querySelectorAll('input[id="stone_weight[]"]');
    var stone_quantity = document.querySelectorAll(
        'input[id="stone_quantity[]"]'
    );
    stone_quantity.forEach(function (input) {
        input.addEventListener("input", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            StoneQuantity(current);
        });
    });
    stone_weight.forEach(function (input) {
        input.addEventListener("input", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            StoneWeight(current);
        });
    });
    GetAllStones();
}

function DeleteAdditional(element) {
    var area = element.parentNode.parentNode;
    area.remove();
}

function Add(element) {
    area = element.parentNode.parentNode.nextElementSibling;
    var div = document.createElement("div");
    div.setAttribute("class", "row mb-4 remove");
    div.innerHTML = `<label for="horizontal-firstname-input" class="col-sm-1 col-form-label  d-flex justify-content-end">Code:</label>
   <div class="col-sm-1">
       <select name="zircon_code[]" id="zircon_code[]" value="" class="form-control" placeholder="Zircon">
           <option value="">Select a zircon...</option>
       </select>
   </div>
   <div class="col-sm-2 p-0">
       <input type="text" name="zircon_detail[]" id="zircon_detail[]" value="" class="form-control" placeholder="Zircon Detail">
   </div>
   <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
   <div class="col-sm-2">
       <input type="text" name="zircon_weight[]" id="zircon_weight[]" value="" class="form-control" placeholder="Zircon" >
   </div>
   <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
   <div class="col-sm-2">
       <input type="text" name="zircon_quantity[]" id="zircon_quantity[]" value="" class="form-control" placeholder="Zircon" >
   </div>
   <div class="col-sm-2">
       <i class="delete-zircon fa fa-minus-circle p-2"></i>
   </div>`;
    area.appendChild(div);
    var zircon_weight = document.querySelectorAll(
        'input[id="zircon_weight[]"]'
    );
    var zircon_quantity = document.querySelectorAll(
        'input[id="zircon_quantity[]"]'
    );
    zircon_quantity.forEach(function (input) {
        input.addEventListener("input", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            ZirconQuantity(current);
        });
    });
    zircon_weight.forEach(function (input) {
        input.addEventListener("input", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            ZirconWeight(current);
        });
    });
    GetAllZircons();
}

function AddAdditional(element) {
    var returned_area = element.parentNode.parentNode.parentNode;
    var div2 = document.createElement("tr");
    div2.setAttribute("class", "remove");
    div2.innerHTML = `<td>
       <input type="date" id="a_date[]" name="date[]" value="${new Date()
           .toISOString()
           .slice(0, 10)}" class="form-control" placeholder="Date">
   </td>
   <td>
       <select id="select-vendor[]" name="vendor_id[]" placeholder="Pick a vendor...">
           <option value="">Select a vendor...</option>
       </select>
   </td>
   <td>
       <select required="" id="a_type[]" name="type[]" class="form-control form-select">
           <option value="">Select Type</option>
           <option value="Stone ">Stone</option>
           <option value="Dull">Dull</option>
           <option value="Meena">Meena</option>
           <option value="Ruby">Ruby</option>
           <option value="Green">Green</option>
           <option value="Sapphire">Sapphire</option>
           <option value="Topas">Topas</option>
           <option value="Turmaline">Turmaline</option>
           <option value="Lekar">Lekar</option>
           <option value="Cubic Baquets">Cubic Baquets</option>
           <option value="Korean Baquets">Korean Baquets</option>
           <option value="Color Stones">Color Stones</option>
           <option value="Blue">Blue</option>
           <option value="Pearl">Pearl</option>
           <option value="Packet">Packet</option>
       </select>
   </td>
   <td>
       <input type="number" step="any" id="amount[]" name="amount[]" class="form-control" placeholder="Amount">
   </td>
   <td><i class="fa fa-minus-circle p-2" onclick="DeleteAdditional(this)"></i>
   </td>`;
    returned_area.appendChild(div2);
    GetAllAdditionals();
}

function Add(element) {
    area = element.parentNode.parentNode.nextElementSibling;
    var div = document.createElement("div");
    div.setAttribute("class", "row mb-4 remove");
    div.innerHTML = `<label for="horizontal-firstname-input" class="col-sm-1 col-form-label  d-flex justify-content-end">Code:</label>
   <div class="col-sm-1">
       <select name="zircon_code[]" id="zircon_code[]" value="" class="form-control" placeholder="Zircon">
           <option value="">Select a zircon...</option>
       </select>
   </div>
   <div class="col-sm-2 p-0">
       <input type="text" name="zircon_detail[]" id="zircon_detail[]" value="" class="form-control" placeholder="Zircon Detail">
   </div>
   <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
   <div class="col-sm-2">
       <input type="text" name="zircon_weight[]" id="zircon_weight[]" value="" class="form-control" placeholder="Zircon" >
   </div>
   <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
   <div class="col-sm-2">
       <input type="text" name="zircon_quantity[]" id="zircon_quantity[]" value="" class="form-control" placeholder="Zircon" >
   </div>
   <div class="col-sm-2">
       <i class="delete-zircon fa fa-minus-circle p-2"></i>
   </div>`;
    area.appendChild(div);
    var zircon_weight = document.querySelectorAll(
        'input[id="zircon_weight[]"]'
    );
    var zircon_quantity = document.querySelectorAll(
        'input[id="zircon_quantity[]"]'
    );
    zircon_quantity.forEach(function (input) {
        input.addEventListener("input", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            ZirconQuantity(current);
        });
    });
    zircon_weight.forEach(function (input) {
        input.addEventListener("input", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            ZirconWeight(current);
        });
    });
    GetAllZircons();
}

function AddReturned(element) {
    var returned_area = element.parentNode.parentNode.parentNode;
    var div2 = document.createElement("div");
    div2.setAttribute("class", "row mb-4 remove");
    div2.innerHTML = `<label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Detail:</label>
                       <div class="col-sm-3">
                           <input type="text" name="r_code[]" id="r_code[]" value="" class="form-control" placeholder="Detail">
                       </div>
                       <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Weight (g):</label>
                       <div class="col-sm-2">
                           <input type="number" step="any" name="r_weight[]" id="r_weight[]" value="" class="form-control" placeholder="Weight" required>
                       </div>
                       <label for="horizontal-firstname-input" class="col-sm-1 col-form-label d-flex justify-content-end">Quantity:</label>
                       <div class="col-sm-2">
                           <input type="number" step="any" name="r_quantity[]" id="r_quantity[]" value="" class="form-control" placeholder="Quantity" required>
                       </div>
                       <div class="col-sm-2">
                           <i class="delete-returned fa fa-minus-circle p-2"></i>
                       </div>`;
    returned_area.appendChild(div2);
    var r_weight = document.querySelectorAll('input[id="r_weight[]"]');
    var r_quantity = document.querySelectorAll('input[id="r_quantity[]"]');
    r_quantity.forEach(function (input) {
        input.addEventListener("input", function () {
            let current =
                this.parentNode.parentNode.parentNode.parentNode.parentNode;
            ReturnedQuantity(current);
        });
    });
    r_weight.forEach(function (input) {
        input.addEventListener("input", function () {
            let current =
                this.parentNode.parentNode.parentNode.parentNode.parentNode;
            ReturnedWeight(current);
        });
    });
}

function CalculateDifference() {
    var unpolished_weight = parseFloat(
        $(document).find("#unpolish_weight").val()
    );
    var polished_weight = parseFloat($(document).find("#polish_weight").val());
    var stepIssueweight = (document.getElementById("s_total_weight[]").value =
        polished_weight);
    const inputElement = document.getElementById("s_total_weight[]");
    // Create a new 'change' event
    const changeEvent = new Event("change");
    // Dispatch the 'change' event on the input element
    inputElement.dispatchEvent(changeEvent);
    if (unpolished_weight != "" && polished_weight != "") {
        var difference = (unpolished_weight - polished_weight).toFixed(2) + "0";
        if (difference == 0) {
            var polisher_save_btn =
                document.getElementById("polisher_save_btn");
            var polisher_print_btn =
                document.getElementById("polisher_print_btn");
            polisher_print_btn.disabled = true;
            polisher_save_btn.disabled = true;
        } else {
            var polisher_save_btn =
                document.getElementById("polisher_save_btn");
            var polisher_print_btn =
                document.getElementById("polisher_print_btn");
            polisher_print_btn.disabled = false;
            polisher_save_btn.disabled = false;
        }
        $(document).find("#difference").val(difference);
    }
}

function CalculateIssuedWeight(retained_weight) {
    total_weight =
        retained_weight.parentNode.previousElementSibling.previousElementSibling
            .children[0].value;
    total_weight = parseFloat(total_weight);
    if (total_weight < retained_weight.value) {
        alert("Retained weight cannot be greater than total weight");
        retained_weight.value = "";
    } else if (
        total_weight == "" ||
        total_weight == null ||
        total_weight == undefined
    ) {
        alert("Please enter total weight");
        retained_weight.value = "";
    } else {
        value = (total_weight - parseFloat(retained_weight.value)).toFixed(3);
        retained_weight.parentNode.nextElementSibling.nextElementSibling.children[0].value =
            value;
        NextTotalWeight(retained_weight);
    }
    current = retained_weight.parentNode.parentNode.parentNode;
    SGrandWeight(current);
}

function NextTotalWeight(retained_weight) {
    let all_retained_weight = document.querySelectorAll(
        'input[id="retained_weight[]"]'
    );
    for (let i = 0; i < all_retained_weight.length; i++) {
        let current = all_retained_weight[i];
        if (current == retained_weight && i < all_retained_weight.length - 1) {
            let total_weight =
                all_retained_weight[i + 1].parentNode.previousElementSibling
                    .previousElementSibling.children[0];
            total_weight.value = retained_weight.value;
            CalculateIssuedWeight(all_retained_weight[i + 1]);
        }
    }
}

function CalculateNewPayable(rate) {
    var difference = document.getElementById("difference").value;
    var poWas = document.getElementById("poWas");
    var payable = document.getElementById("payable");
    if (difference == 0) {
        poWas.value = 0;
    } else {
        poWas.value = (difference / rate / 96).toFixed(2) + "0";
    }
    payable.value = (difference - poWas.value).toFixed(2) + "0";
}

function GetDate() {
    var date = new Date().toISOString().slice(0, 10);
    var dataInputs = document.querySelectorAll('input[type="date"]');
    for (let i = 0; i < dataInputs.length; i++) {
        if (
            dataInputs[i].id !== "from-date" &&
            dataInputs[i].id !== "to-date"
        ) {
            dataInputs[i].value = date;
        }
    }
}

function ReturnedStoneListeners() {
    var r_quantity = document.querySelectorAll('input[id="r_quantity[]"]');
    var r_weight = document.querySelectorAll('input[id="r_weight[]"]');
    var zircon_weight = document.querySelectorAll(
        'input[id="zircon_weight[]"]'
    );
    var zircon_quantity = document.querySelectorAll(
        'input[id="zircon_quantity[]"]'
    );
    var stone_weight = document.querySelectorAll('input[id="stone_weight[]"]');
    var stone_quantity = document.querySelectorAll(
        'input[id="stone_quantity[]"]'
    );
    var r_quantity = document.querySelectorAll('input[id="r_quantity[]"]');
    var grand_total_weight = document.querySelectorAll("#r_total_weight");
    var received_weight = document.querySelectorAll("#received_weight");
    var r_stone_weight = document.querySelectorAll("#r_stone_weight");
    var zircon_total = document.querySelectorAll("#zircon_total");
    var stone_total = document.querySelectorAll("#stone_total");
    var select_manufacturer_purity = document.querySelectorAll(
        "#select-manufacturer-purity"
    );
    var select_polisher_purity = document.querySelectorAll(
        "#select-polisher-purity"
    );
    var unpolish_weight = document.querySelectorAll("#unpolish_weight");
    var polish_weight = document.querySelectorAll("#polish_weight");
    var p_rate = document.querySelectorAll("#p_rate");
    var r_stone_quantity = document.querySelectorAll("#r_stone_quantity");
    var r_rate = document.querySelectorAll("#r_rate");
    var r_wastage = document.querySelectorAll("#r_wastage");
    var manufacturer_rate = document.querySelectorAll("#manufacturer-rate");
    var r_grand_weight = document.querySelectorAll("#r_grand_weight");
    var retained_weight = document.querySelectorAll(
        'input[id="retained_weight[]"]'
    );
    var s_total_weight = document.querySelectorAll(
        'input[id="s_total_weight[]"]'
    );
    var sh_qty = document.querySelectorAll('input[id="sh_qty"]');
    for (var i = 0; i < sh_qty.length; i++) {
        sh_qty[i].addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            CalculateReturnedWastage(current);
            ReturnedPayable(current);
        });
    }
    for (var i = 0; i < s_total_weight.length; i++) {
        s_total_weight[i].addEventListener("change", function () {
            CalculateIssuedWeight(
                this.parentElement.nextElementSibling.nextElementSibling
                    .children[0]
            );
        });
    }
    for (var i = 0; i < retained_weight.length; i++) {
        retained_weight[i].addEventListener("change", function () {
            CalculateIssuedWeight(this);
        });
    }
    r_grand_weight.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            ReturnedPayable(current);
        });
    });
    r_rate.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            CalculateReturnedWastage(current);
        });
    });
    r_stone_weight.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode.parentNode;
            TotalWeight(current);
        });
    });
    r_wastage.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            TotalWeight(current);
        });
    });
    r_stone_quantity.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            CalculateReturnedWastage(current);
        });
    });
    received_weight.forEach(function (element) {
        element.addEventListener("change", function () {
            current = this.parentNode.parentNode.parentNode;
            ReturnTotalWeight(current);
        });
    });
    r_stone_weight.forEach(function (element) {
        element.addEventListener("change", function () {
            current = this.parentNode.parentNode.parentNode;
            ReturnTotalWeight(current);
        });
    });
    received_weight.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            TotalWeight(current);
        });
    });
    grand_total_weight.forEach(function (element) {
        element.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode.nextSibling;
            ReturnedPayable(current);
        });
    });
    for (let i = 0; i < r_quantity.length; i++) {
        r_quantity[i].addEventListener("change", function () {
            let current =
                this.parentNode.parentNode.parentNode.parentNode.parentNode;
            ReturnedQuantity(current);
        });
        r_quantity[i].addEventListener("change", function () {
            let current =
                this.parentNode.parentNode.parentNode.parentNode.parentNode;
            TotalWeight(current);
        });
    }
    for (let i = 0; i < r_weight.length; i++) {
        r_weight[i].addEventListener("change", function () {
            let current =
                this.parentNode.parentNode.parentNode.parentNode.parentNode;
            ReturnedWeight(current);
        });
        r_weight[i].addEventListener("change", function () {
            let current =
                this.parentNode.parentNode.parentNode.parentNode.parentNode;
            TotalWeight(current);
        });
    }
}

function StoneSetterListeners() {
    var zircon_weight = document.querySelectorAll(
        'input[id="zircon_weight[]"]'
    );
    var zircon_code = document.querySelectorAll('select[id="zircon_code[]"]');
    var zircon_quantity = document.querySelectorAll(
        'input[id="zircon_quantity[]"]'
    );
    var stone_weight = document.querySelectorAll('input[id="stone_weight[]"]');
    var stone_quantity = document.querySelectorAll(
        'input[id="stone_quantity[]"]'
    );
    var grand_total_weight = document.querySelectorAll(
        'input[id="grand_total_weight[]"]'
    );
    grand_total_weight.forEach(function (input) {
        input.addEventListener("change", function () {
            let current =
                this.parentNode.parentNode.parentNode.nextElementSibling;
            ReturnedPayable(current);
        });
    });
    stone_quantity.forEach(function (input) {
        input.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            StoneQuantity(current);
        });
    });
    stone_weight.forEach(function (input) {
        input.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            StoneWeight(current);
        });
    });
    zircon_quantity.forEach(function (input) {
        input.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            ZirconQuantity(current);
        });
    });
    zircon_weight.forEach(function (input) {
        input.addEventListener("change", function () {
            let current = this.parentNode.parentNode.parentNode;
            ZirconWeight(current);
        });
    });
}

$(document).on("click", ".delete-stone", function () {
    let current = this.parentNode.parentNode.parentNode.parentNode;
    $(this).parent().parent().remove();
    StoneQuantity(current);
    StoneWeight(current);
});
$(document).on("click", ".delete-zircon", function () {
    let current = this.parentNode.parentNode.parentNode.parentNode;
    $(this).parent().parent().remove();
    ZirconQuantity(current);
    ZirconWeight(current);
});
$(document).on("click", ".delete-returned", function () {
    let current = this.parentNode.parentNode.parentNode.parentNode.parentNode;
    $(this).parent().parent().remove();
    ReturnedQuantity(current);
    ReturnedWeight(current);
});

$(document).on("change", "#select-manufacturer-purity", function (e) {
    e.preventDefault();
    var manufacturer_rate = document.getElementById("manufacturer-rate");
    var selectElement = document.getElementById("select-manufacturer-purity");
    var selectedOptionValue = selectElement.value;
    var selectedText = selectElement.text;
    manufacturer_rate.value = selectedOptionValue;
    var select1 = $("#select-manufacturer").selectize({
        sortField: "text",
        searchField: "item",
        openOnFocus: false,
    })[0].selectize;
    var selectedOptionValue1 = select1.getValue();
    CalculateWastage();
});
$(document).on("change", "#select-stone_setter", function (e) {
    e.preventDefault();
    let current = this.parentNode.parentNode.parentNode.parentNode;
    GetStoneSetterRate(current);
});
$(document).on("change", "#select-polisher-purity", function (e) {
    e.preventDefault();
    var polisher_rate = document.getElementById("polisher-rate");
    polisher_rate.value = this.value;
});
$(document).on("input", "#rate", function (e) {
    e.preventDefault();
    var constantValue = 96;
    var rFlowValue = parseFloat($(this).val());
    var upEmail = parseFloat($(document).find("#unpolish_weight").val());
    var pValues = [];
    $.each($("#pValue option:selected"), function () {
        pValues.push($(this).val());
    });
    var sPValue = pValues[0];
    if (isNaN(upEmail)) {
        alert("Please Insert The unpolish_weight Value");
        $(document).find("#rate").val("");
        return false;
    } else {
        var wtgValue =
            ((upEmail * rFlowValue) / constantValue).toFixed(2) + "0";
        $(document).find("#wastage").val(wtgValue);
        var wtgValue1 = (wtgValue = (upEmail * rFlowValue) / constantValue);
        var rr = parseFloat(upEmail + wtgValue1).toFixed(2) + "0";
        var rr2 = parseFloat(sPValue).toFixed(2) + "0";
        var tValues = (rr * sPValue).toFixed(2) + "0";
        $(document).find("#tValues").val(tValues);
    }
});
$(document).on("input", "#Zircon", function (e) {
    e.preventDefault();
    CalculateTotal();
});
$(document).on("input", "#stone_weight", function (e) {
    e.preventDefault();
    CalculateTotal();
});
$(document).on("input", "#received_weight", function (e) {
    e.preventDefault();
    let current = this.parentNode.parentNode.parentNode.previousElementSibling;
    GetStoneSetterRate(current);
    CalculatePayable();
});
$(document).on("input", "#stone_received", function (e) {
    e.preventDefault();
    CalculatePayable();
});
$(document).on("input", "#wastage1", function (e) {
    e.preventDefault();
    CalculatePayable();
});

$(document).on("change", "#select-polisher", function (e) {
    e.preventDefault();
    CalculatePolisherWastage();
});


$(document).ready(function() {
    $('select:not(#select-manufacturer-purity)').selectize({
        sortField: 'text',
        openOnFocus: false
    });
    GetAllAdditionals();
    var zircon_weight = document.querySelectorAll('input[id="zircon_weight[]"]');
    var zircon_quantity = document.querySelectorAll('input[id="zircon_quantity[]"]');
    var stone_weight = document.querySelectorAll('input[id="stone_weight[]"]');
    var stone_quantity = document.querySelectorAll('input[id="stone_quantity[]"]');
    var r_quantity = document.querySelectorAll('input[id="r_quantity[]"]');
    var grand_total_weight = document.querySelector("#r_total_weight");
    var received_weight = document.querySelector("#received_weight");
    var r_stone_weight = document.querySelector("#r_stone_weight");
    var zircon_total = document.querySelector('#zircon_total');
    var stone_total = document.querySelector('#stone_total');
    var select_manufacturer_purity = document.querySelector('#select-manufacturer-purity');
    var select_polisher_purity = document.querySelector('#select-polisher-purity');
    var unpolish_weight = document.querySelector('#unpolish_weight');
    var polish_weight = document.querySelector('#polish_weight');
    var p_rate = document.querySelector('#p_rate');
    var r_stone_quantity = document.querySelector("#r_stone_quantity");
    var r_rate = document.querySelector("#r_rate");
    var r_wastage = document.querySelector("#r_wastage");
    var manufacturer_rate = document.querySelector("#manufacturer-rate");
    var r_grand_weight = document.querySelector("#r_grand_weight");
    var retained_weight = document.querySelectorAll('input[id="retained_weight[]"]');
    manufacturer_rate.addEventListener("change", function() {
        CalculateWastage();
    });
    unpolish_weight.addEventListener('change', CalculateWastage);
    unpolish_weight.addEventListener('change', CalculateDifference);
    polish_weight.addEventListener('change', CalculateDifference);
    p_rate.addEventListener('change', function() {
        CalculateNewPayable($(this).val());
    });
    ReturnedStoneListeners();
    StoneSetterListeners();
});


window.addEventListener('load', runLoop1());