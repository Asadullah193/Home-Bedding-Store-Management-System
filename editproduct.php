<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_POST['id'];
    $productname    = $_POST['productname'];
    $productdetail  = $_POST['productdetail'];
    $companyname    = $_POST['companyname'];
    $productsize    = $_POST['productsize'];
    $category       = $_POST['category'];
    $productprice   = $_POST['productprice'];
    $productquantity= $_POST['productquantity'];
    $productorder   = isset($_POST['productorder']) ? $_POST['productorder'] : 0;

       $productava = $productquantity - $productorder;

    $productpic = null;
    if (!empty($_FILES['productpic']['name'])) {
        $filename = $_FILES['productpic']['name'];
        $tmpname  = $_FILES['productpic']['tmp_name'];
        $folder   = "product_images/" . $filename;

        if (move_uploaded_file($tmpname, $folder)) {
            $productpic = $filename;
        } else {
            die("Error uploading file.");
        }
    }

    $obj = new data();
    $obj->setconnection();
    $result = $obj->updateproduct($id, $productname, $productdetail, $companyname, $productsize,  $category, $productprice, $productquantity, $productava, $productorder, $productpic);

    if ($result) {
        header("Location: admin_service_dashboard.php?msg=Product Updated");
        exit;
    } else {
        echo "Error updating product!";
    }
} else {
    echo "Invalid Request!";
}
?>
