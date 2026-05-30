<?php
    $con = mysqli_connect('localhost', 'root', '');
    if(!$con){
        echo 'Not connected to the server';
    }
    if(!mysqli_select_db($con,'home bedding store management system')){
        echo 'Database is not selected';
    }
    $Customer_name = $_POST['Customer_name'];
    $Shop_name = $_POST['Shop_name'];
    $Facebook_page = $_POST['Facebook_page'];
    $Phone_number = $_POST['Phone_number'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Address = $_POST['Address'];

    $sql = "INSERT INTO customer(Customer_name, Shop_name, Facebook_page, Phone_number, Email, Password, Address)VALUES('$Customer_name', '$Shop_name', '$Facebook_page', '$Phone_number', '$Email', '$Password', '$Address')";
    if(!mysqli_query($con, $sql)){
        echo 'Not saved';
    }
else
{
    header("refresh:1, url=registration_page.php");
}
    ?>