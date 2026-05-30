<?php
include("data_class.php");

$memo_number = $_GET['memo_number'];

$obj = new data();
$obj->setconnection();
$itemDelete = $obj->deleteInvoiceItemsByMemo($memo_number);
$memoDelete = $obj->deleteInvoiceMemoByMemoNumber($memo_number);

if ($itemDelete && $memoDelete) {
    header("Location: admin_service_dashboard.php?msg= Delete Done");
} else {
    header("Location: admin_service_dashboard.php?msg=Fail");
}
exit;
