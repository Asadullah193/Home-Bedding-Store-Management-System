<?php

include("data_class.php");

$id = $_GET['id'];

$u = new data();
$u->setconnection();

$u->approveproductrequest($id);

header("location:admin_service_dashboard.php");

?>