<?php

include("data_class.php");

$addnames=$_POST['addname'];
$addshopnames=$_POST['addshopname'];
$addpagenames=$_POST['addpagename'];
$addphone= $_POST['addphone'];
$addaddress= $_POST['addaddress'];
$addemail= $_POST['addemail'];
$addpass= $_POST['addpass'];
$type= $_POST['type'];


$obj=new data();
$obj->setconnection();
$obj->addnewcustomer($addnames,$addshopnames,$addpagenames,$addphone,$addaddress,$addemail,$addpass,$type);
