<?php
include("data_class.php");

if(!empty($_GET['date'])){
    $date = $_GET['date'];

    $obj = new data();
    $obj->setconnection();

    if($obj->deletedailyreport($date)){
        echo "<script>alert('Daily report deleted successfully!'); window.location.href='admin_service_dashboard.php';</script>";
    } else {
        echo "<script>alert('Delete failed!'); window.history.back();</script>";
    }

} else {
    echo "Invalid Request";
}
?>