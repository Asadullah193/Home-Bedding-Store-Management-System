<?php
include("data_class.php");



$productname=$_POST['productname'];
$productdetail=$_POST['productdetail'];
$companyname=$_POST['companyname'];
$productsize=$_POST['productsize'];
$category=$_POST['category'];
$productprice=$_POST['productprice'];
$productquantity=$_POST['productquantity'];



if (move_uploaded_file($_FILES["productphoto"]["tmp_name"],"product_images/" . $_FILES["productphoto"]["name"])) {

    $productpic=$_FILES["productphoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->addproduct($productpic,$productname,$productdetail,$companyname,$productsize,$category,$productprice,$productquantity);
  } 
  else {
     echo "File not uploaded";
  }