
<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memo_number = $_POST['memo_number'] ?? '';
    $date = $_POST['date'] ?? '';
    $customername = $_POST['customername'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $totalquantity = $_POST['totalquantity'] ?? 0;
    $grandtotal = $_POST['grandtotal'] ?? 0;
    $paid = $_POST['paid'] ?? 0;
    $due = $_POST['due'] ?? 0;
    $conditionamount = $_POST['conditionamount'] ?? '';

    
    $products = [];
    if (!empty($_POST['productname']) && is_array($_POST['productname'])) {
        for ($i = 0; $i < count($_POST['productname']); $i++) {
            $products[] = [
                'productname' => $_POST['productname'][$i],
                'quantity' => $_POST['quantity'][$i],
                'price' => $_POST['price'][$i],
                'total' => $_POST['total'][$i]
            ];
        }
    }

    try {
        $obj = new data();
        $obj->setconnection();
        $obj->addinvoicememo(
            $memo_number,
            $date,
            $customername,
            $phone,
            $address,
            $totalquantity,
            $grandtotal,
            $paid,
            $due,
            $conditionamount
        );

       
        
        $obj->addinvoicememoitems($memo_number, $products);

        header("Location: invoicememo_page.php?msg=done");
        exit();

    } catch (Exception $e) {
        header("Location: invoicememo_page.php?msg=error&reason=" . urlencode($e->getMessage()));
        exit();
    }

} else {
    header("Location: invoicememo_page.php?msg=fail");
    exit();
}
?>
