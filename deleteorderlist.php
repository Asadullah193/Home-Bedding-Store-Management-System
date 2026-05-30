<?php
include("data_class.php");

$deleteorderlist=$_GET['deleteadvance_orderid'];


$obj=new data();
$obj->setconnection();
$obj->deleteorderlist($deleteorderlist);