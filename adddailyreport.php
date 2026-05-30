<?php
include("data_class.php");


$date = $_POST['date'] ?? '';

// Sales arrays
$memonumber = $_POST['memonumber'] ?? [];
$customername = $_POST['customername'] ?? [];
$quantity = $_POST['quantity'] ?? [];
$amount = $_POST['amount'] ?? [];
$dueamount = $_POST['dueamount'] ?? [];

// Cost arrays
$costdetails = $_POST['costdetails'] ?? [];
$costamount = $_POST['costamount'] ?? [];
$paymentmethod = $_POST['paymentmethod'] ?? [];

// Cash arrays
$cashdetails = $_POST['cashdetails'] ?? [];
$cashamount = $_POST['cashamount'] ?? [];


$obj = new Data();
$obj->setConnection(); 


$salesData = [];
for ($i = 0; $i < count($memonumber); $i++) {
    $salesData[] = [
        'memo' => $memonumber[$i],
        'name' => $customername[$i],
        'qty' => $quantity[$i],
        'amount' => $amount[$i],
        'due' => $dueamount[$i]
    ];
}

$costData = [];
for ($i = 0; $i < count($costdetails); $i++) {
    $costData[] = [
        'details' => $costdetails[$i],
        'amount' => $costamount[$i],
        'method' => $paymentmethod[$i]
    ];
}

$cashData = [];
for ($i = 0; $i < count($cashdetails); $i++) {
    $cashData[] = [
        'details' => $cashdetails[$i],
        'amount' => $cashamount[$i]
    ];
}

// Insert into database
if ($obj->addDailyReport($date, $salesData, $costData, $cashData)) {
    echo "<script>alert('Daily report saved successfully!'); window.location.href='admin_service_dashboard.php';</script>";
} else {
    die("Error saving daily report");
}
?>
