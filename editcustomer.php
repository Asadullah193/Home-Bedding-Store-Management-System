 <?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id          = $_POST['id'];
    $name        = $_POST['addname'];
    $shopname    = $_POST['addshopname'];
    $pagename    = $_POST['addpagename'];
    $phone       = $_POST['addphone'];
    $address     = $_POST['addaddress'];
    $email       = $_POST['addemail'];
    $pass    = $_POST['addpass'];
    $type        = $_POST['type'];



    $obj = new data();
    $obj->setconnection();
    $result = $obj->updatecustomer($id, $name, $shopname, $pagename, $phone,  $address, $email, $pass, $type);

    if ($result) {
        header("Location: admin_service_dashboard.php?msg=Customer Updated");
        exit;
    } else {
        echo "Error updating Customer!";
    }
} else {
    echo "Invalid Request!";
}
?>
 

