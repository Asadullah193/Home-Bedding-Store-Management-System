<?php
include("data_class.php");

if (!isset($_GET['product_id']) || !isset($_GET['customer_id'])) {
    die("❌ Invalid request.");
}


$product_id = $_GET['product_id'];
$customer_id = $_GET['customer_id'];
$quantity = $_POST['quantity'] ?? 0;


?>
