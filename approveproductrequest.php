<?php

include("data_class.php");




$request=$_GET['reqid'];
$product=$_GET['product'];
$shopname= $_GET['shopname'];
$phone= $_GET['phone'];
$customerselect= $_GET['customerselect'];
$getdate= date("d/m/Y");
$days= $_GET['days'];

$ordercompleteDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new data();
$obj->setconnection();
$obj->productrequestapprove($product,$shopname,$phone,$customerselect,$days,$getdate,$ordercompleteDate,$request);
