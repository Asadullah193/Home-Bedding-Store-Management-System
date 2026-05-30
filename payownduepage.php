<?php
include("data_class.php");

$obj = new data();
$obj->setconnection();

$owndue_id = $_POST['owndue_id'] ?? 0;
$pay_date = $_POST['pay_date'] ?? '';
$current_due = $_POST['current_due'];
$pay_amount = $_POST['pay_amount'] ?? 0;
$payment_method = $_POST['payment_method'] ?? '';

if($owndue_id == 0 || empty($pay_date)){
    die("Invalid data!");
}


$new_due = $current_due - $pay_amount;

if($new_due < 0){
    $new_due = 0;
}

/* INSERT PAYMENT */
$result = $obj->payowndue(
    $owndue_id,
    $pay_date,
    $current_due,
    $pay_amount,
    $new_due,
    $payment_method
);

if($result){

    $obj->updateOwnCurrentDue($owndue_id, $new_due);


    $obj->insertOwnLedgerPay(
        $owndue_id,
        $pay_date,
        $current_due,
        $pay_amount,
        $new_due,
        $payment_method
    );

    header("Location: admin_service_dashboard.php?msg=Payment Success");

}else{
    header("Location: admin_service_dashboard.php?msg=Payment Failed");
}
?>