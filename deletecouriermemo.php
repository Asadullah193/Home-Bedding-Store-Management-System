<?php
include("data_class.php");

$deletecourier_memoid=$_GET['deletecourier_memoid'];


$obj=new data();
$obj->setconnection();
$obj->deletecouriermemo($deletecourier_memoid);