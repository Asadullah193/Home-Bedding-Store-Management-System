<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id                = $_POST['id'];
    $adddate           = $_POST['adddate'];
    $customerselect    = $_POST['customerselect'];
    $addname           = $_POST['addname'];
    $addphone          = $_POST['addphone'];
    $addaddress        = $_POST['addaddress'];
    $addadvanceamount  = $_POST['addadvanceamount'];
    $productselect     = $_POST['productselect'];
    $addquantity       = $_POST['addquantity'];
    $adddetail         = $_POST['adddetail'];
    $type              = $_POST['type'];
    $couriername       = $_POST['couriername'];

    $obj = new data();
    $obj->setconnection();
    $result = $obj->updateadvanceorder($id, $adddate, $customerselect, $addname, $addphone, $addaddress, $addadvanceamount, $productselect, $addquantity,  $adddetail, $type, $couriername);

    if ($result) {
        header("Location: admin_service_dashboard.php?msg=Advance Order Updated");
        exit;
    } else {
        echo "Error updating advance order!";
    }

} else {
    echo "Invalid Request!";
}
?>
