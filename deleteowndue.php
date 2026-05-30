<?php
include("data_class.php");

$obj = new data();
$obj->setconnection();

$id = $_GET['id'] ?? 0;

if($id > 0){
    $obj->deleteOwnDue($id);
}

header("Location: admin_service_dashboard.php?msg=deleted");
exit();
?>