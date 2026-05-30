<?php

include("data_class.php");

$staff_name  = $_POST['staff_name'];
$phone       = $_POST['phone'];
$address     = $_POST['address'];
$designation = $_POST['designation'];
$salary      = $_POST['salary'];
$join_date      = $_POST['join_date'];
$cv_link     = $_POST['cv_link'];


// NATIONAL ID IMAGE 

$nid_image = "";

if(!empty($_FILES['nid_image']['name'])){

    $nid_image = $_FILES['nid_image']['name'];

    $tmp_nid = $_FILES['nid_image']['tmp_name'];

    move_uploaded_file($tmp_nid,"staff_files/".$nid_image);

}


// STAFF PHOTO 

$photo = "";

if(!empty($_FILES['photo']['name'])){

    $photo = $_FILES['photo']['name'];

    $tmp_photo = $_FILES['photo']['tmp_name'];

    move_uploaded_file($tmp_photo,"staff_files/".$photo);

}


// CV UPLOAD 

$cv = "";

if(!empty($_FILES['cv']['name'])){

    $cv = $_FILES['cv']['name'];

    $tmp_cv = $_FILES['cv']['tmp_name'];

    move_uploaded_file($tmp_cv,"staff_files/".$cv);

}


// OTHER DOCUMENT

$other_document = [];

foreach($_FILES['other_document']['name'] as $i => $name){

    $tmp = $_FILES['other_document']['tmp_name'][$i];

    $new_name = time() . "_" . $name;
    move_uploaded_file($tmp, "staff_files/" . $new_name);

    $other_document[] = $new_name;
}

$other_document_db = json_encode($other_document);


$u = new data();
$u->setconnection();
$u->addstaffsalary(
    $staff_name,
    $phone,
    $address,
    $designation,
    $salary,
    $join_date,
    $nid_image,
    $photo,
    $cv,
    $cv_link,
    $other_document_db
);

header("location:admin_service_dashboard.php");

?>