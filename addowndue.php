<?php
include("data_class.php");


$obj = new data();
$obj->setconnection();

$company_name = $_POST['company_name'] ?? '';
$phone        = $_POST['phone'] ?? '';
$address      = $_POST['address'] ?? '';

$result = $obj->addclientdue($company_name, $phone, $address);

if($result){
    header("Location: admin_service_dashboard.php?msg=success");
} else {
    echo "Insert failed";
}
exit();
?>