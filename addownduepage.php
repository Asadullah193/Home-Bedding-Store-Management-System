<?php
include("data_class.php");

$obj = new data();
$obj->setconnection();

// ✅ GET CUSTOMER ID
$owndue_id = $_POST['owndue_id'] ?? 0;

if($owndue_id == 0){
    die("Client ID missing!");
}

// ✅ GET FORM DATA
$date        = $_POST['date'][0] ?? '';
$bill_no     = $_POST['bill_no'][0] ?? '';
$bill_amount = (float)($_POST['bill_amount'][0] ?? 0);
$prev_due    = (float)($_POST['prev_due'][0] ?? 0);
$paid        = (float)($_POST['paid'][0] ?? 0);


if(empty($date) || empty($bill_no)){
    die("Required fields missing!");
}


$total = $bill_amount + $prev_due;
$due   = $total - $paid;


if($due < 0){
    $due = 0;
}

//  INSERT
$result = $obj->addowndue(
    $owndue_id,
    $date,
    $bill_no,
    $bill_amount,
    $prev_due,
    $total,
    $paid,
    $due
);


if($result){
    $obj->updateOwnCurrentDue($owndue_id, $due);

    // CALL FUNCTION (SAFE)
    $obj->insertOwnLedgerAdd(
        $owndue_id,
        $date,
        $bill_no,
        $bill_amount,
        $prev_due,
        $paid,
        $due
    );
}

header("Location: admin_service_dashboard.php?msg=" . ($result ? "Due Added Successfully" : "Failed to Add Due"));
exit;
?>