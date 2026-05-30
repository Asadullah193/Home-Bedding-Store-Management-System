<?php
include("data_class.php");

$month = $_POST['month'];   
$year  = $_POST['year'];

$monthName = date("F", mktime(0, 0, 0, $month, 10));

$obj = new data();
$obj->setconnection();
$result = $obj->getMonthlyreport($month, $year);

// totals
$totalQuantity = 0;
$totalSalesAmount = 0;
$totalCashAmount = 0;
$totalCostAmount = 0;
$totalDueAmount = 0;
$totalNetCash = 0;

// MAIN BACKGROUND
echo "<div style='background:#94ef9fff; padding:20px;'>";

// Heading
echo "<h1 style='text-align:center;'>
Monthly Sales Report - $monthName $year
</h1><br>";

// TABLE 
echo "<table border='1' width='90%' align='center' cellpadding='8'
style='border-collapse:collapse; text-align:center; background:#b1fec7;'>

<tr style='background:#16DE52; color:black; font-weight:bold;'>
<th>Date</th>
<th>Quantity</th>
<th>Amount</th>
<th>Cash</th>
<th>Cost</th>
<th>Due</th>
<th>Net Cash</th>
</tr>";

while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>
        <td>{$row['date']}</td>
        <td>{$row['total_quantity']}</td>
        <td>{$row['total_sales_amount']}</td>
        <td>{$row['total_cash']}</td>
        <td>{$row['total_cost']}</td>
        <td>{$row['total_due_amount']}</td>
        <td>{$row['net_cash']}</td>
    </tr>";

    $totalQuantity += $row['total_quantity'];
    $totalSalesAmount += $row['total_sales_amount'];
    $totalCashAmount += $row['total_cash'];
    $totalCostAmount += $row['total_cost'];
    $totalDueAmount += $row['total_due_amount'];
    $totalNetCash += $row['net_cash'];
}

echo "</table><br><br>";

// SUMMARY TITLE (blue like image)
echo "<h2 style='text-align:center; color:blue;'>Monthly Summary</h2><br>";

// SUMMARY TABLE 
echo "<table border='1' width='50%' align='center' cellpadding='12'
style='border-collapse:collapse; background:#b1fec7;'>

<tr><td><b>Total Quantity:</b></td><td>{$totalQuantity} Pcs</td></tr>
<tr><td><b>Total Sales Amount:</b></td><td>{$totalSalesAmount} Tk</td></tr>
<tr><td><b>Total Cash:</b></td><td>{$totalCashAmount} Tk</td></tr>
<tr><td><b>Total Due Amount:</b></td><td>{$totalDueAmount} Tk</td></tr>
<tr><td><b>Total Cost:</b></td><td>{$totalCostAmount} Tk</td></tr>
<tr><td><b>Net Cash:</b></td><td><b>{$totalNetCash} Tk</b></td></tr>
</table>";

echo "</div>";
?>