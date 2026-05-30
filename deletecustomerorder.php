<?php

include("data_class.php");

if(isset($_GET['id'])){

$id = $_GET['id'];

$userloginid = $_GET['userlogid'];

echo $id; 
$u = new data();

$u->setconnection();

$u->deletecustomerorder($id);

header("location:customer_dashboard.php?userlogid=$userloginid");

}

?>