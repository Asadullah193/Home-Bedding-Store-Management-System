<?php

include("data_class.php");

$productid      = $_POST['productid'];
$customerid     = $_POST['customerid'];
$customer_name  = $_POST['customer_name'];
$phone          = $_POST['phone'];
$product_name   = $_POST['product_name'];
$price          = $_POST['price'];
$image          = $_POST['image'];
$quantity       = $_POST['quantity'];

$u = new data();
$u->setconnection();

$u->requestproduct(
$customerid,
$productid,
$customer_name,
$phone,
$product_name,
$price,
$quantity,
$image
);

header("location:customer_dashboard.php?userlogid=$customerid");

?>