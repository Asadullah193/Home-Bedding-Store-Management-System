<?php
include("data_class.php");

$obj = new data();
$obj->setconnection();

$id = $_GET['id'] ?? 0;

if ($id > 0) {

    $result = $obj->deleteStaff($id);

    if ($result) {
        echo "<script>
                alert('Staff deleted successfully');
                window.location.href='admin_service_dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Delete failed');
                window.location.href='admin_service_dashboard.php';
              </script>";
    }

} else {
    echo "<script>
            alert('Invalid staff ID');
            window.location.href='admin_service_dashboard.php';
          </script>";
}
?>