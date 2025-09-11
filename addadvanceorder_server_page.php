<?php

include("data_class.php");
$adddate=$_POST['adddate'];
$customerselect=$_POST['customerselect'];
$addnames=$_POST['addname'];
$addphone= $_POST['addphone'];
$addaddress= $_POST['addaddress'];
$addadvanceamount= $_POST['addadvanceamount'];
$productselect= $_POST['productselect'];
$addquantity= $_POST['addquantity'];
$adddetail= $_POST['adddetail'];
$type= $_POST['type'];
$couriername= $_POST['couriername'];

$obj=new data();
$obj->setconnection();
$obj->addadvanceorder($adddate,$customerselect,$addnames,$addphone,$addaddress,$addadvanceamount,$productselect,$addquantity,$adddetail,$type,$couriername);
