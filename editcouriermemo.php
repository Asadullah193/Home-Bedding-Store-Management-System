<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id               = $_POST['id'];
    $date             = $_POST['date'];
    $couriername      = $_POST['couriername'];
    $couriermemonumber= $_POST['couriermemonumber'];
    $courierphone     = $_POST['courierphone'];
    $courieraddress   = $_POST['courieraddress'];
    $senderphone      = $_POST['senderphone'];
    $receivername     = $_POST['receivername'];
    $receiverphone    = $_POST['receiverphone'];
    $receiveraddress  = $_POST['receiveraddress'];
    $conditionamount  = $_POST['conditionamount'];
    $couriercharge    = $_POST['couriercharge'];
    $courierfeestatus = $_POST['courierfeestatus'];


    $couriermemopic = null;

    if (!empty($_FILES['couriermempic']['name'])) {

        $filename = time() . "_" . $_FILES['couriermempic']['name'];
        $tmpname  = $_FILES['couriermempic']['tmp_name'];
        $folder   = "courier_memo_images/" . $filename;

        if (move_uploaded_file($tmpname, $folder)) {
            $couriermemopic = $filename;
        } else {
            die("Error uploading image.");
        }
    }

    $obj = new data();
    $obj->setconnection();
    $result = $obj->updateCourierMemo(
        $id,
        $date,
        $couriername,
        $couriermemonumber,
        $courierphone,
        $courieraddress,
        $senderphone,
        $receivername,
        $receiverphone,
        $receiveraddress,
        $conditionamount,
        $couriercharge,
        $courierfeestatus,
        $couriermemopic
    );

    if ($result) {
        header("Location: admin_service_dashboard.php?msg=Courier Memo Updated");
        exit;
    } else {
        echo "Error updating courier memo!";
    }

} else {
    echo "Invalid Request!";
}
?>
