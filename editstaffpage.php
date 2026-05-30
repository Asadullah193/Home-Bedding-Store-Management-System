<?php
include("data_class.php");

$obj = new data();
$obj->setconnection();

/* =====================================================
   1. STAFF UPDATE (NO GLOBAL RECALC HERE ❌)
===================================================== */
if (isset($_POST['staff_id']) && !isset($_POST['update_salary'])) {

    $staff_id = $_POST['staff_id'];

    $obj->updateStaffInfo(
        $staff_id,
        $_POST['staff_name'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['address'] ?? '',
        $_POST['designation'] ?? '',
        $_POST['salary'] ?? '',
        $_POST['join_date'] ?? '',
        $_POST['cv_link'] ?? '',
        $_FILES
    );

   

    header("Location: admin_service_dashboard.php?editstaff_id=" . $staff_id);
    exit;
}


/* =====================================================
   2. SALARY ROW UPDATE + GLOBAL RECALC
===================================================== */
if (isset($_POST['update_salary'])) {

    $staff_id  = $_POST['staff_id'];
    $salary_id = $_POST['salary_id'];

    $date      = $_POST['date'] ?? '';
    $month     = $_POST['month'] ?? '';
    $salary    = $_POST['row_salary'] ?? 0;   
    $bonus     = $_POST['bonus'] ?? 0;
    $paid      = $_POST['paid'] ?? 0;
    $status    = $_POST['status'] ?? '';
    $note      = $_POST['note'] ?? '';
    $last_due  = $_POST['last_due'] ?? 0;

    // UPDATE SINGLE SALARY ROW
    $obj->updateSalaryRow(
        $salary_id,
        $date,
        $month,
        $salary,
        $bonus,
        $paid,
        $status,
        $note,
        $last_due
    );

    // GLOBAL RECALC
    $obj->recalculateSalary($staff_id);

    header("Location: admin_service_dashboard.php?editstaff_id=" . $staff_id);
    exit;
}
?>