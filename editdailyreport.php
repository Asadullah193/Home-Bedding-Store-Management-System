<?php
require_once("data_class.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

$u = new data();
$u->setconnection();

// OLD DATE (for delete)
$old_date = $_POST['report_id'];

// NEW DATE
$date = $_POST['date'];

// ======================
// BUILD SALES ARRAY
// ======================
$salesData = [];
for ($i = 0; $i < count($_POST['memonumber']); $i++) {

    $salesData[] = [
        "memo"   => $_POST['memonumber'][$i],
        "name"   => $_POST['customername'][$i],
        "qty"    => $_POST['quantity'][$i],
        "amount" => $_POST['amount'][$i],
        "due"    => $_POST['dueamount'][$i]
    ];
}

// ======================
// BUILD COST ARRAY
// ======================
$costData = [];
for ($i = 0; $i < count($_POST['costdetails']); $i++) {

    $costData[] = [
        "details" => $_POST['costdetails'][$i],
        "amount"  => $_POST['costamount'][$i],
        "method"  => $_POST['paymentmethod'][$i]
    ];
}

// ======================
// BUILD CASH ARRAY
// ======================
$cashData = [];
for ($i = 0; $i < count($_POST['cashdetails']); $i++) {

    $cashData[] = [
        "details" => $_POST['cashdetails'][$i],
        "amount"  => $_POST['cashamount'][$i]
    ];
}


// ======================
// DELETE OLD REPORT
// ======================
$u->deletedailyreport($old_date);


// ======================
// INSERT UPDATED DATA
// ======================
$u->addDailyReport($date, $salesData, $costData, $cashData);


// ======================
// SUCCESS
// ======================
echo "<script>
alert('Daily Report Updated Successfully!');
window.location.href='admin_service_dashboard.php?editreport_date=$date';
</script>";