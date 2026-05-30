<?php

include("data_class.php");

$id = $_GET['id'];

$u = new data();
$u->setconnection();

$u->deleteproductrequest($id);

header("location:admin_service_dashboard.php");

?>