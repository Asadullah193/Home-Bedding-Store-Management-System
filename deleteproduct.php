<?php
include("data_class.php");

$deleteproductid=$_GET['deleteproductid'];


$obj=new data();
$obj->setconnection();
$obj->deleteproduct($deleteproductid);