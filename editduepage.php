<?php

include("data_class.php");

$obj = new data();
$obj->setconnection();

$duecustomer_id = $_POST['duecustomer_id'] ?? 0;

// ============================
// CUSTOMER UPDATE
// ============================
if(isset($_POST['customer_name'])){

    $obj->updateDueCustomer(
        $duecustomer_id,
        $_POST['customer_name'] ?? '',
        $_POST['shop_name'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['address'] ?? ''
    );
}
if(isset($_POST['update_ledger'])){

    $id             = $_POST['id'] ?? 0;
    $type           = $_POST['type'] ?? 'ADD';

    $date           = $_POST['date'] ?? '';
    $bill_no        = $_POST['bill_no'] ?? '';
    $bill_amount    = $_POST['bill_amount'] ?? 0;
    $paid           = $_POST['paid'] ?? 0;
    $payment_detail = $_POST['payment_detail'] ?? '';

    // update ledger
    $obj->updateLedger(
        $id,
        $date,
        $bill_no,
        $bill_amount,
        $paid,
        $payment_detail
 
    );
   

   $final_due = $obj->recalculateDue($duecustomer_id);

   $obj->updateCurrentDue($duecustomer_id, $final_due);

    if($type == 'ADD'){
        $net_due = (float)$bill_amount - (float)$paid;
    }
    else if($type == 'PAY'){
        $net_due = - (float)$paid;
    }
    else {
        $net_due = 0;
    }

    // 3. update only this row net_due
    $obj->updateLedgerCurrentDue($id, $net_due);

   



    // sync ADD
    if($type == 'ADD'){
        $obj->updateDueTransaction(
            $id,
            $date,
            $bill_no,
            $bill_amount,
            $paid
        );
    }

    // sync PAY
    if($type == 'PAY'){
        $obj->updatePaymentTransaction(
            $id,
            $date,
            $paid,
            $payment_detail
        );
    }

   
    $obj->recalculateDue($duecustomer_id);
}

 
?>