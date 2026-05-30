<?php
include("data_class.php");

$deletecustomer=$_GET['customeriddelete'];


$obj=new data();
$obj->setconnection();
$obj->deletecustomer($deletecustomer);