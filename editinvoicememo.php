<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

$u = new data();
$u->setconnection();


  // INVOICE MEMO DATA


$memo_id          = $_POST['invoice_memoid'];
$memo_number      = $_POST['memo_number'];
$date             = $_POST['date'];
$customer_name    = $_POST['customer_name'];
$phone            = $_POST['phone'];
$address          = $_POST['address'];
$totalquantity    = $_POST['totalquantity'];
$grandtotal       = $_POST['grandtotal'];
$paid             = $_POST['paid'];
$due              = $_POST['due'];
$condition_amount = $_POST['condition_amount'];


   // UPDATE INVOICEMEMO

$u->updateInvoiceMemo(
    $memo_id,
    $date,
    $customer_name,
    $phone,
    $address,
    $totalquantity,
    $grandtotal,
    $paid,
    $due,
    $condition_amount
);


   // ITEMS DATA

$itemids     = $_POST['itemid'];
$productname = $_POST['productname'];
$quantity    = $_POST['quantity'];
$price       = $_POST['price'];
$total       = $_POST['total'];



  // DELETE REMOVED ITEMS

$u->deleteRemovedInvoiceItems($memo_number, $itemids);


  // UPDATE / INSERT ITEMS

for ($i = 0; $i < count($productname); $i++) {

    if (!empty($itemids[$i])) {
        
        $u->updateInvoiceItem(
            $itemids[$i],
            $productname[$i],
            $quantity[$i],
            $price[$i],
            $total[$i]
        );
    } else {
       
        $u->addInvoiceItem(
            $memo_number,
            $productname[$i],
            $quantity[$i],
            $price[$i],
            $total[$i]
        );
    }
}

header("Location: admin_service_dashboard.php?msg=Invoice Updated Successfully");
exit;
