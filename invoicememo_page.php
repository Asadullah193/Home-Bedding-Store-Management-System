<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $customername = $_POST['customername'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $grandtotal = $_POST['grandtotal'];
    $paid = $_POST['paid'];
    $due = $_POST['due'];

    $products = [];
    for ($i = 0; $i < count($_POST['productname']); $i++) {
        $products[] = [
            'productname' => $_POST['productname'][$i],
            'quantity' => $_POST['quantity'][$i],
            'price' => $_POST['price'][$i],
            'total' => $_POST['total'][$i]
        ];
    }

    $obj = new data();
    $obj->setconnection();
    $obj->addBillingMemo($date, $customername, $phone, $address, $grandtotal, $paid, $due);

    $last_id = $obj->connection->lastInsertId();
    $obj->addBillingItems($last_id, $products);

    header("Location: admin_service_dashboard.php?msg=done");
} else {
    header("Location: admin_service_dashboard.php?msg=fail");
}
?>
