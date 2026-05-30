<?php
include("data_class.php");

$customer_names=$_POST['customer_name'];
$shop_names=$_POST['shop_name'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$obj=new data();
$obj->setconnection();
$result = $obj->addduecustomer($customer_names,$shop_names,$phone,$address);

