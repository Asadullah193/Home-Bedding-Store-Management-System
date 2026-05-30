<?php
include("data_class.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

$obj = new data();
$obj->setconnection();

// GET FORM DATA
$staff_id   = $_POST['staff_id'] ?? 0;
$date      = $_POST['date'] ?? '';
$month      = $_POST['month'] ?? '';
$salary     = $_POST['salary'] ?? 0;
$bonus      = $_POST['bonus'] ?? 0;
$last_due   = $_POST['last_due'] ?? 0;
$pay_amount = $_POST['pay_amount'] ?? 0;
$note       = $_POST['note'] ?? '';

// CONVERT TO NUMBERS
$salary     = floatval($salary);
$bonus      = floatval($bonus);
$last_due   = floatval($last_due);
$pay_amount = floatval($pay_amount);

// TOTAL CALCULATION
$total_salary = $salary + $bonus + $last_due;
$balance = $total_salary - $pay_amount;

// STATUS CHECK
if ($balance > 0) {
    $status = "Due";
} elseif ($balance < 0) {
    $status = "Extra Paid";
    $balance = abs($balance);
} else {
    $status = "Full Paid";
    $balance = 0;
}

// SAVE TO DATABASE
$obj->paySalary(
    $staff_id,
    $date,
    $month,
    $salary,
    $bonus,
    $last_due,
    $pay_amount,
    $balance,
    $status,
    $note
);

// SUCCESS MESSAGE
echo "<script>
alert('Salary Payment Successful');
window.location.href='paysalary.php?staff_id=$staff_id';
</script>";

}
?>