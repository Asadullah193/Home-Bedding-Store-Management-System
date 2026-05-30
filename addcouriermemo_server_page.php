<?php
include("data_class.php");



$date=$_POST['date'];
$couriername= $_POST['couriername'];
$couriermemonumber=$_POST['couriermemonumber'];
$courierphone=$_POST['courierphone'];
$courieraddress= $_POST['courieraddress'];
$senderphone= $_POST['senderphone'];
$receivername= $_POST['receivername'];
$receiverphone= $_POST['receiverphone'];
$receiveraddress= $_POST['receiveraddress'];
$conditionamount= $_POST['conditionamount'];
$couriercharge= $_POST['couriercharge'];
$courierfeestatus= $_POST['courierfeestatus'];




if (move_uploaded_file($_FILES["couriermemophoto"]["tmp_name"],"courier_memo_images/" . $_FILES["couriermemophoto"]["name"])) {

    $couriermemopic=$_FILES["couriermemophoto"]["name"];

$obj=new data();
$obj->setconnection();
$obj->addcouriermemo($couriermemopic,$date,$couriername,$couriermemonumber,$courierphone,$courieraddress,$senderphone,$receivername,$receiverphone,$receiveraddress,$conditionamount,$couriercharge,$courierfeestatus);
  } 
  else {
     echo "File not uploaded";
  }