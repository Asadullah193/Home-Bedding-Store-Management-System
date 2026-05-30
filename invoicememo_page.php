<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Invoice Memo Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<style>

.inner,label {
    color: rgba(47, 20, 223, 1);
    font-weight:bold;
 }

.innerdiv { 
    text-align: center;
    width: 1100px; margin:auto;
 }

input{ 
    margin-left:30px;
 }

.inner { 
    background-color: #a1e6a7ff; 
}

.greenbtn { 
    background-color: #0ad584ff; 
    color: black; 
    width: 95%; 
    height: 40px; 
    margin-top: 8px; 
}

.greenbtn, a { 
    text-decoration: none; 
    color: black; 
    font-size: large; 
}

th{ 
    background-color: #16DE52; 
    color: black; 
}

td{ 
    background-color: #b1fec7; 
    color: black; 
}

td, a{ 
    color:black; 
}

.print-btn {  
    background: #2196F3; 
    color: white; 
    padding: 8px 14px; 
    border: none; 
    border-radius: 4px; 
    margin-top: 10px; 
    cursor: pointer; 
}

@media print { 
    .print-btn, .btn { 
        display: none; 
    } 

    body { 
        background: white;
     } 

    .memo-container { 
        border: none; 
        width: 100%; 
    } 
}

.btn { 
    background-color: #4a8c56d5; 
    color: white; 
    font-size: 25px; 
    font-weight: bold; 
    border: none; 
    border-radius: 15px; 
    text-decoration: none; 
    text-align: left; 
}

.btn:hover { 
    background-color: #218838; 
    color: #fff; 
    text-decoration: none; 
}

label { 
    margin-left:50px; 
    padding-top:10px; 
    font-size: 18px; 
    color: rgb(51, 51, 51); 
}

input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
input[type=text], input[type=email], input[type=number], input[type=password], select, textarea { width: 40%; padding: 2px; border: 1px solid #ccc; border-radius: 8px; margin-top: 2px; margin-bottom: 2px; box-sizing: border-box; resize: vertical; }

body { 
    font-family: 'Roboto'; 
}

</style>
</head>
<body>

<?php 
include("data_class.php"); 
$msg = $_REQUEST['msg'] ?? "";
if ($msg == "done") { echo "<div class='alert alert-success'>Successfully Done</div>"; } 
elseif ($msg == "fail") { echo "<div class='alert alert-danger'>Fail</div>"; } 
?>

<div class="innerdiv">
<div id="addinvoicememo" class="inner portion">
<button class="greenbtn">INVOICE MEMO</button><br>
<a href="admin_service_dashboard.php" class="btn">⬅ Back</a><br>

<!-- SHOP HEADER -->
<div style="background:linear-gradient(to right,#c8e6c9,#e8f5e9); padding:10px; border-radius:10px 10px 0 0; display:flex; align-items:center; justify-content:space-between;">
  <div><img src="fb-qr.png" alt="Facebook QR" style="width:120px; height:120px;"></div>
  <div style="flex:1; text-align:center;">
    <h1 style="color:#d62828; font-size:50px; margin:0;">Home Bedding</h1>
    <h3>Prop: Mohammad Ullah Shohag</h3>
    <p>Phone: 01712-895018, 01810-054177 | Hotline: 02-47391392, 02-22665772</p>
    <p>Email: asadullah.shakil01907@gmail.com | asadullah.shakil@gmail.com</p>
    <p>Address: Daulat Complex, 109/110, Shop No:19, Islampur, Dhaka-1100</p>
  </div>
  <div><img src="youtube.png" alt="YouTube QR" style="width:120px; height:120px;"></div>
</div>


<?php $memo_number = "MEMO-" . date("dmy") . "-" . rand(100,9999); ?>
<form action="addinvoicememo.php" method="post" style="padding:10px;">
<label><b>Memo No:</b></label>
<input type="text" name="memo_number" value="<?php echo $memo_number; ?>" readonly style="width:390px;">
<label><b>Date:</b></label>
<input type="date" name="date" required><br>
<label><b>Customer Name:</b></label>
<input type="text" name="customername" required style="width:390px;">
<label><b>Phone:</b></label>
<input type="number" name="phone" required style="width:200px;"><br>
<label><b>Address:</b></label>
<input type="text" name="address" required style="width:780px;"><br>
<hr style="border: 2px solid black; margin-top: 20px; margin-bottom: 10px;">


<!-- ITEM TABLE -->
<h4>Items</h4>
<table border="1" cellpadding="6" cellspacing="0" width="90%" id="billingTable" align="center" style="border-collapse:collapse; text-align:center;">
<thead style="background:#e6ffe6;">
<tr>
<th>SL</th>
<th>Product Description</th>
<th>Quantity</th>
<th>Price(Tk)</th>
<th>Amount (Tk)</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td><input type="text" name="productname[]" required style="width:200px;"></td>
<td><input type="number" name="quantity[]" class="quantity" required></td>
<td><input type="number" step="0.01" name="price[]" class="price" required></td>
<td><input type="number" step="0.01" name="total[]" class="total" readonly></td>
<td><button type="button" onclick="removeRow(this)">X</button></td>
</tr>
</tbody>
</table>

<div style="text-align:center; margin:10px;">
<button type="button" onclick="addRow()">➕ Add Row</button>
</div>

<!-- TOTALS -->
<div style="padding:10px 20px;">
<label><b>Total Quantity(Pcs):</b></label>
<input type="number" step="0.01" name="totalquantity" id="totalquantity" readonly><br>
<label><b>Grand Total(Tk):</b></label>
<input type="number" step="0.01" name="grandtotal" id="grandtotal" readonly><br>
<label><b>Paid(Tk):</b></label>
<input type="number" step="0.01" name="paid" id="paid" oninput="calculateDue()" required><br>
<label><b>Due(Tk):</b></label>
<input type="number" step="0.01" name="due" id="due" readonly><br>
<label><b>Condition Amount(Tk):</b></label>
<input type="text" name="conditionamount" required style="width:370px;"><br>
<input type="submit" value="💾 Save Memo" class="print-btn">
<button type="button" class="print-btn" onclick="window.print()">🖨 Print</button>
</div>

<hr style="border: 2px solid black; margin-top: 20px; margin-bottom: 10px;">
<div class="footer">
<p style="color:#d62828;font-size: 25px;">Sold items can be returned. However, washed and white items are not returnable.</p>
</div>
</form>
</div>
</div>

<script>
// Add Row
function addRow() {
    const table = document.getElementById("billingTable").getElementsByTagName('tbody')[0];
    const rowCount = table.rows.length;
    const row = table.insertRow();
    row.innerHTML = `
    <td>${rowCount + 1}</td>
    <td><input type="text" name="productname[]" required style="width:200px;"></td>
    <td><input type="number" name="quantity[]" class="quantity" required></td>
    <td><input type="number" step="0.01" name="price[]" class="price" required></td>
    <td><input type="number" step="0.01" name="total[]" class="total" readonly></td>
    <td><button type="button" onclick="removeRow(this)">X</button></td>`;
    bindEvents();
}

// Remove Row
function removeRow(btn) {
    const row = btn.closest("tr");
    row.remove();
    updateSerialNumbers();
    calculateGrandTotal();
}

// Update SL numbers dynamically
function updateSerialNumbers() {
    const rows = document.querySelectorAll("#billingTable tbody tr");
    rows.forEach((row, index) => row.cells[0].textContent = index + 1);
}

// Bind input events
function bindEvents() {
    document.querySelectorAll(".quantity, .price").forEach(el => {
        el.oninput = function() {
            const row = el.closest("tr");
            const qty = parseFloat(row.querySelector(".quantity").value) || 0;
            const price = parseFloat(row.querySelector(".price").value) || 0;
            row.querySelector(".total").value = (qty * price).toFixed(2);
            calculateGrandTotal();
        }
    });
}

// Calculate Grand Total
function calculateGrandTotal() {
    let grand = 0;
    let totalQty = 0;
    document.querySelectorAll(".total").forEach(t => grand += parseFloat(t.value) || 0);
    document.querySelectorAll(".quantity").forEach(q => totalQty += parseFloat(q.value) || 0);
    document.getElementById("grandtotal").value = grand.toFixed(2);
    document.getElementById("totalquantity").value = totalQty.toFixed(0);
    calculateDue();
}

// Calculate Due
function calculateDue() {
    const grand = parseFloat(document.getElementById("grandtotal").value) || 0;
    const paid = parseFloat(document.getElementById("paid").value) || 0;
    document.getElementById("due").value = (grand - paid).toFixed(2);
    
}

bindEvents();
</script>
</body>
</html>
