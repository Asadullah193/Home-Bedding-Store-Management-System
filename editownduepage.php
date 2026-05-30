<?php

include("data_class.php");

$obj = new data();
$obj->setconnection();

$owndue_id = $_POST['owndue_id'] ?? 0;

// ============================
// CUSTOMER UPDATE
// ============================
if(isset($_POST['company_name'])){

    $obj->updateOwnDue(
        $owndue_id,
        $_POST['company_name'] ?? '',
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
    $obj->updateOwnLedger(
        $id,
        $date,
        $bill_no,
        $bill_amount,
        $paid,
        $payment_detail
 
    );
   

   $final_due = $obj->recalculateOwnDue($owndue_id);

   $obj->updateOwnCurrentDue($owndue_id, $final_due);

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
    $obj->updateLedgerOwnCurrentDue($id, $net_due);

   



    // sync ADD
    if($type == 'ADD'){
        $obj->updateOwnDueTransaction(
            $id,
            $date,
            $bill_no,
            $bill_amount,
            $paid
        );
    }

    // sync PAY
    if($type == 'PAY'){
        $obj->updateOwnPaymentTransaction(
            $id,
            $date,
            $paid,
            $payment_detail
        );
    }

   
    $obj->recalculateOwnDue($owndue_id);
}

 
?>