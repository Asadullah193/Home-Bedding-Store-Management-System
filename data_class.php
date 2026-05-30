<?php 
session_start();
include("db.php");
class data extends db {

    private $productpic;
    private $productname;
    private $productdetail;
    private $companyname;
    private $productsize;
    private $category;
    private $productprice;
    private $productquantity;
    private $type;
    private $product;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct() {
        // echo " constructor ";
        echo "</br></br>";
    }


function requestproduct($customerid,$productid,$customer_name,$product_name,$phone,$price,$quantity,$image){

$q = "INSERT INTO product_request 
(customerid,productid,customer_name,product_name,phone,price,quantity,image,status,date,admin_delete)

VALUES 

('$customerid',
'$productid',
'$customer_name',
'$product_name',
'$phone',
'$price',
'$quantity',
'$image',
'Pending',
NOW(),
'No')";

$this->connection->query($q);

}



function getproductrequest($customerid){

$q = "SELECT 

id,
date,
image,
product_name,
phone,
price,
quantity,
status

FROM product_request 

WHERE customerid='$customerid'

ORDER BY id DESC";

$data = $this->connection->query($q);

return $data;

}




function getallproductrequest(){

$q = "SELECT * FROM product_request 
WHERE admin_delete='No'
ORDER BY id DESC";

$data = $this->connection->query($q);

return $data;

}



function approveproductrequest($id){

$q1 = "SELECT * FROM product_request WHERE id='$id'";
$data = $this->connection->query($q1);

$row = $data->fetch();

$productid = $row['productid'];
$quantity  = $row['quantity'];


$q2 = "UPDATE product_request
SET status='Approved'
WHERE id='$id'";

$this->connection->query($q2);


// update product order quantity
$q3 = "UPDATE product
SET productorder = productorder + '$quantity'
WHERE id='$productid'";

$this->connection->query($q3);


// update available quantity
$q4 = "UPDATE product
SET productava = productava - '$quantity'
WHERE id='$productid'";

$this->connection->query($q4);

}



function deleteproductrequest($id){

$q = "UPDATE product_request
SET admin_delete='Yes'
WHERE id='$id'";

$this->connection->query($q);

}

function addstaffsalary($staff_name,$phone,$address,$designation,$salary,$join_date,$nid_image,$photo,$cv,$cv_link,$other_document){

    if (is_array($other_document)) {
        $other_document = json_encode($other_document);
    }

    $q = "INSERT INTO staff_salary
    (staff_name, phone, address, designation, salary, join_date, nid_image, photo, cv, cv_link, other_document)
    VALUES
    ('$staff_name','$phone','$address','$designation','$salary','$join_date','$nid_image','$photo','$cv','$cv_link','$other_document')";

    $this->connection->query($q);
}



function stafflist(){

    $q = "SELECT * FROM staff_salary ORDER BY id DESC";
    $data = $this->connection->query($q);

    return $data->fetchAll(PDO::FETCH_ASSOC);
}



public function totalstaffsalary()
{
    $q = $this->connection->query("
        SELECT COALESCE(SUM(salary),0) AS total 
        FROM staff_salary
    ");

    return $q->fetch(PDO::FETCH_ASSOC);
}

function getStaffById($staff_id){

    $q = "SELECT * FROM staff_salary WHERE id='$staff_id'";

    $data = $this->connection->query($q);

    return $data->fetch(PDO::FETCH_ASSOC);
}


public function paySalary($staff_id, $date, $month, $salary, $bonus, $last_due, $pay_amount, $balance, $status, $note){

    $sql = "INSERT INTO salary_payments 
    (staff_id, date, month, salary, bonus, last_due, pay_amount, balance, status, note)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($sql);

    $stmt->execute([
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
        
    ]);
}

  
public function getSalaryRecords($staff_id)
{
    $sql = "SELECT * 
            FROM salary_payments
            WHERE staff_id = :staff_id
            ORDER BY id ASC";

    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(':staff_id', $staff_id);

    if($stmt->execute()){
        return $stmt;
    }else{
        return false;
    }
}

public function getLastSalaryBalance($staff_id)
{
    $sql = "SELECT balance, status
            FROM salary_payments
            WHERE staff_id = ?
            ORDER BY id DESC
            LIMIT 1";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$staff_id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



     //  UPDATE STAFF INFO
    
    public function updateStaffInfo($staff_id,$staff_name,$phone,$address,$designation,$salary,$join_date,$cv_link,$files)
    {
        $old = $this->getStaffById($staff_id);

        $upload = function($file,$oldFile="") {

            if (!empty($file['name'])) {
                $new = time() . "_" . basename($file['name']);
                move_uploaded_file($file['tmp_name'], "staff_files/" . $new);
                return $new;
            }
            return $oldFile;
        };

        $nid_image = $upload($files['nid_image'] ?? [], $old['nid_image']);
        $photo     = $upload($files['photo'] ?? [], $old['photo']);
        $cv        = $upload($files['cv'] ?? [], $old['cv']);

        $docs = [];

        if (!empty($files['other_document']['name'][0])) {

            foreach ($files['other_document']['name'] as $i => $name) {

                $tmp = $files['other_document']['tmp_name'][$i];
                $new = time() . "_" . $name;

                move_uploaded_file($tmp, "staff_files/" . $new);

                $docs[] = $new;
            }

        } else {

            $docs = json_decode($old['other_document'], true);
            if (!is_array($docs)) $docs = [];
        }

        $sql = "UPDATE staff_salary SET 
            staff_name=:staff_name,
            phone=:phone,
            address=:address,
            designation=:designation,
            salary=:salary,
            join_date=:join_date,
            cv_link=:cv_link,
            nid_image=:nid,
            photo=:photo,
            cv=:cv,
            other_document=:docs
        WHERE id=:id";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            ':staff_name'=>$staff_name,
            ':phone'=>$phone,
            ':address'=>$address,
            ':designation'=>$designation,
            ':salary'=>$salary,
            ':join_date'=>$join_date,
            ':cv_link'=>$cv_link,
            ':nid'=>$nid_image,
            ':photo'=>$photo,
            ':cv'=>$cv,
            ':docs'=>json_encode($docs),
            ':id'=>$staff_id
        ]);
    }

   
  // UPDATE SALARY ROW

public function updateSalaryRow($id,$date,$month,$row_salary,$bonus,$paid,$status,$note,$last_due)
{
    $sql = "UPDATE salary_payments SET 
        date=:date,
        month=:month,
        salary=:row_salary,
        bonus=:bonus,
        last_due=:last_due,
        pay_amount=:paid,
        status=:status,
        note=:note
    WHERE id=:id";

    $stmt = $this->connection->prepare($sql);

    $stmt->execute([
        ':date'       => $date,
        ':month'      => $month,
        ':row_salary' => $row_salary,
        ':bonus'      => $bonus,
        ':last_due'   => $last_due,
        ':paid'       => $paid,
        ':status'     => $status,
        ':note'       => $note,
        ':id'         => $id
    ]);
}


    public function recalculateSalary($staff_id)
{
    $stmt = $this->connection->prepare("
        SELECT * FROM salary_payments
        WHERE staff_id=:staff_id
        ORDER BY id ASC
    ");

    $stmt->execute([':staff_id'=>$staff_id]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $carry = 0;
    $first = true;

    foreach ($rows as $row) {

        // First row uses database input last_due
        if($first){
            $current_due = $row['last_due'];
            $first = false;
        } else {
            $current_due = $carry;
        }

        $total = $row['salary'] + $row['bonus'] + $current_due;
        $difference = $total - $row['pay_amount'];

        if($difference > 0){
            $status = "Due";
            $balance = $difference;
            $carry = $balance;
        }
        elseif($difference < 0){
            $status = "Extra Pay";
            $balance = abs($difference);
            $carry = $balance;
        }
        else{
            $status = "Full Paid";
            $balance = 0;
            $carry = 0;
        }

        $up = $this->connection->prepare("
            UPDATE salary_payments
            SET
                last_due=:last_due,
                balance=:balance,
                status=:status
            WHERE id=:id
        ");

        $up->execute([
            ':last_due' => $current_due,
            ':balance'  => $balance,
            ':status'   => $status,
            ':id'       => $row['id']
        ]);
    }
}

    function addnewcustomer($name,$shopname,$pagename,$phone,$address,$email,$pasword,$type){
        $this->name=$name;
        $this->shopname=$shopname;
        $this->pagename=$pagename;
        $this->phone=$phone;
        $this->address=$address;
        $this->email=$email;
        $this->pasword=$pasword;
        $this->type=$type;


         $q="INSERT INTO customer(id, name, shopname, pagename, phone, address, email, pass,type)VALUES('','$name','$shopname','$pagename','$phone','$address','$email','$pasword','$type')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }

    }
    function customerLogin($t1, $t2) {
        $q="SELECT * FROM customer where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: customer_dashboard.php?userlogid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    function adminLogin($t1, $t2) {

        $q="SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    function addclientdue($company_name, $phone, $address)
{
    $q = "INSERT INTO owndue (company_name, phone, address)
          VALUES (?, ?, ?)";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $company_name,
        $phone,
        $address
    ]);
}



    function addduecustomer($customer_name, $shop_name, $phone, $address){

    $q = "INSERT INTO due_customer 
          (customer_name, shop_name, phone, address)
          VALUES (?, ?, ?, ?)";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $customer_name,
        $shop_name,
        $phone,
        $address
    ]);
}




    function adddue($duecustomer_id, $date, $bill_no, $bill_amount, $prev_due, $total, $paid, $due){

    if(empty($duecustomer_id)){
        die("Customer ID missing!");
    }

    $q = "INSERT INTO due_transaction 
    (duecustomer_id, date, bill_no, bill_amount, prev_due, total, paid, due)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $duecustomer_id,
        $date,
        $bill_no,
        $bill_amount,
        $prev_due,
        $total,
        $paid,
        $due
    ]);
}


function addowndue($owndue_id, $date, $bill_no, $bill_amount, $prev_due, $total, $paid, $due){

    if(empty($owndue_id)){
        die("Client ID missing!");
    }

    $q = "INSERT INTO owndue_transaction 
    (owndue_id, date, bill_no, bill_amount, prev_due, total, paid, due)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $owndue_id,
        $date,
        $bill_no,
        $bill_amount,
        $prev_due,
        $total,
        $paid,
        $due
    ]);
}


    function updateCurrentDue($duecustomer_id, $due){

    $q = "UPDATE due_customer 
          SET current_due = ? 
          WHERE id = ?";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([$due, $duecustomer_id]);
}


function updateOwnCurrentDue($owndue_id, $due){

    $q = "UPDATE owndue 
          SET current_due = ? 
          WHERE id = ?";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([$due, $owndue_id]);
}



   function getCurrentDue($duecustomer_id){
    $sql = "SELECT current_due FROM due_customer WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$duecustomer_id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['current_due'] : 0;
}

function getOwnCurrentDue($owndue_id){
    $sql = "SELECT current_due FROM owndue WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$owndue_id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['current_due'] : 0;
}
    

    function pay_due($duecustomer_id, $date, $current_due, $pay_amount, $new_due, $payment_method){

    $sql = "INSERT INTO payment_transaction 
            (duecustomer_id, date, current_due, pay_amount, new_due, payment_method)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $duecustomer_id,
        $date,
        $current_due,
        $pay_amount,
        $new_due,
        $payment_method
    ]);
}


function payowndue($owndue_id, $date, $current_due, $pay_amount, $new_due, $payment_method){

    $sql = "INSERT INTO ownpayment_transaction 
            (owndue_id, date, current_due, pay_amount, new_due, payment_method)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $owndue_id,
        $date,
        $current_due,
        $pay_amount,
        $new_due,
        $payment_method
    ]);
}




function getDueLedger($duecustomer_id){

    $sql = "SELECT * FROM due_ledger 
            WHERE duecustomer_id = ? 
            ORDER BY id ASC";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$duecustomer_id]);

    return $stmt; 
}

function getOwnDueLedger($owndue_id){

    $sql = "SELECT * FROM owndue_ledger 
            WHERE owndue_id = ? 
            ORDER BY id ASC";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$owndue_id]);

    return $stmt; 
}


function insertLedgerAdd($duecustomer_id, $date, $bill_no, $bill_amount, $current_due, $paid, $net_due){

    $sql = "INSERT INTO due_ledger 
    (duecustomer_id, date, type, bill_no, bill_amount, current_due, paid, net_due, payment_detail)
    VALUES (?, ?, 'ADD', ?, ?, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $duecustomer_id,
        $date,
        $bill_no,
        $bill_amount,
        $current_due,
        $paid,
        $net_due,
        'Cash'
    ]);
}



function insertOwnLedgerAdd($owndue_id, $date, $bill_no, $bill_amount, $current_due, $paid, $net_due){

    $sql = "INSERT INTO owndue_ledger 
    (owndue_id, date, type, bill_no, bill_amount, current_due, paid, net_due, payment_detail)
    VALUES (?, ?, 'ADD', ?, ?, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $owndue_id,
        $date,
        $bill_no,
        $bill_amount,
        $current_due,
        $paid,
        $net_due,
        'Cash'
    ]);
}


function insertLedgerPay($duecustomer_id, $date, $current_due, $paid, $net_due, $payment_detail){

    $sql = "INSERT INTO due_ledger 
    (duecustomer_id, date, type, bill_amount, current_due, paid, net_due, payment_detail)
    VALUES (?, ?, 'PAY', 0, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $duecustomer_id,
        $date,
        $current_due,
        $paid,
        $net_due,
        $payment_detail
    ]);
}

function insertOwnLedgerPay($owndue_id, $date, $current_due, $paid, $net_due, $payment_detail){

    $sql = "INSERT INTO owndue_ledger 
    (owndue_id, date, type, bill_amount, current_due, paid, net_due, payment_detail)
    VALUES (?, ?, 'PAY', 0, ?, ?, ?, ?)";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $owndue_id,
        $date,
        $current_due,
        $paid,
        $net_due,
        $payment_detail
    ]);
}

   // ============================
    // CUSTOMER UPDATE
    // ============================
    public function updateDueCustomer($id, $name, $shop, $phone, $address)
    {
        $sql = "UPDATE due_customer SET 
                    customer_name = :customer_name,
                    shop_name = :shop_name,
                    phone = :phone,
                    address = :address
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':customer_name' => $name,
            ':shop_name' => $shop,
            ':phone' => $phone,
            ':address' => $address,
            ':id' => $id
        ]);
    }


    public function updateOwnDue($id, $name, $phone, $address)
    {
        $sql = "UPDATE owndue SET 
                    company_name = :company_name,
                    phone = :phone,
                    address = :address
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':company_name' => $name,
            ':phone' => $phone,
            ':address' => $address,
            ':id' => $id
        ]);
    }


    public function updateLedger($id, $date, $bill_no, $bill_amount, $paid, $payment_detail){

        $sql = "UPDATE due_ledger SET 
                date = ?, 
                bill_no = ?, 
                bill_amount = ?, 
                paid = ?, 
                payment_detail = ?
                WHERE id = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            $date,
            $bill_no,
            $bill_amount,
            $paid,
            $payment_detail,
            $id
        ]);
    }


    public function updateOwnLedger($id, $date, $bill_no, $bill_amount, $paid, $payment_detail){

        $sql = "UPDATE owndue_ledger SET 
                date = ?, 
                bill_no = ?, 
                bill_amount = ?, 
                paid = ?, 
                payment_detail = ?
                WHERE id = ?";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            $date,
            $bill_no,
            $bill_amount,
            $paid,
            $payment_detail,
            $id
        ]);
    }



  public function recalculateDue($duecustomer_id)
{
    $sql = "SELECT * FROM due_ledger 
            WHERE duecustomer_id = :id 
            ORDER BY id ASC";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([':id' => $duecustomer_id]);

    $balance = 0;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $current_due = $balance; // ✅ THIS IS THE FIX

        if($row['type'] === 'ADD'){
            $balance += $row['bill_amount'];
            $balance -= $row['paid'];
        }
        else if($row['type'] === 'PAY'){
            $balance -= $row['paid'];
        }

        if($balance < 0) $balance = 0;

        $this->connection->prepare("
            UPDATE due_ledger 
            SET current_due = ?,  -- ✅ ADD THIS
                net_due = ?
            WHERE id = ?
        ")->execute([$current_due, $balance, $row['id']]);
    }

    return $balance; 
}


public function recalculateOwnDue($owndue_id)
{
    $sql = "SELECT * FROM owndue_ledger 
            WHERE owndue_id = :id 
            ORDER BY id ASC";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute([':id' => $owndue_id]);

    $balance = 0;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $current_due = $balance; // ✅ THIS IS THE FIX

        if($row['type'] === 'ADD'){
            $balance += $row['bill_amount'];
            $balance -= $row['paid'];
        }
        else if($row['type'] === 'PAY'){
            $balance -= $row['paid'];
        }

        if($balance < 0) $balance = 0;

        $this->connection->prepare("
            UPDATE owndue_ledger 
            SET current_due = ?,  -- ✅ ADD THIS
                net_due = ?
            WHERE id = ?
        ")->execute([$current_due, $balance, $row['id']]);
    }

    return $balance; 
}




public function updateLedgerCurrentDue($id, $net_due)
{
    $sql = "UPDATE due_ledger 
            SET net_due = ? 
            WHERE id = ?";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $net_due,
        $id
    ]);
}


public function updateLedgerOwnCurrentDue($id, $net_due)
{
    $sql = "UPDATE owndue_ledger 
            SET net_due = ? 
            WHERE id = ?";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
        $net_due,
        $id
    ]);
}



function getLedgerById($id){

        $sql = "SELECT * FROM due_ledger WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

function getOwnLedgerById($id){

        $sql = "SELECT * FROM owndue_ledger WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
public function updateDueTransaction($id, $date, $bill_no, $bill_amount, $paid){

    $q = "UPDATE due_transaction 
          SET date=?, bill_no=?, bill_amount=?, paid=? 
          WHERE id=?";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $date,
        $bill_no,
        $bill_amount,
        $paid,
        $id
    ]);
}

public function updateOwnDueTransaction($id, $date, $bill_no, $bill_amount, $paid){

    $q = "UPDATE owndue_transaction 
          SET date=?, bill_no=?, bill_amount=?, paid=? 
          WHERE id=?";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $date,
        $bill_no,
        $bill_amount,
        $paid,
        $id
    ]);
}


public function updatePaymentTransaction($id, $date, $paid, $payment_detail){

    $q = "UPDATE payment_transaction 
          SET date=?, pay_amount=?, payment_method=? 
          WHERE id=?";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $date,
        $paid,
        $payment_detail,
        $id
    ]);
}


public function updateOWnPaymentTransaction($id, $date, $paid, $payment_detail){

    $q = "UPDATE ownpayment_transaction 
          SET date=?, pay_amount=?, payment_method=? 
          WHERE id=?";

    $stmt = $this->connection->prepare($q);

    return $stmt->execute([
        $date,
        $paid,
        $payment_detail,
        $id
    ]);
}


public function totalDue()
{
    $q = $this->connection->query("
        SELECT COALESCE(SUM(current_due),0) AS total 
        FROM due_customer
    ");

    return $q->fetch(PDO::FETCH_ASSOC);
}

public function totalOwnDue()
{
    $q = $this->connection->query("
        SELECT COALESCE(SUM(current_due),0) AS total 
        FROM owndue
    ");

    return $q->fetch(PDO::FETCH_ASSOC);
}


    function addproduct($productpic,$productname,$productdetail,$companyname,$productsize,$category,$productprice,$productquantity) {
        $this->productpic=$productpic;
        $this->productname=$productname;
        $this->productdetail=$productdetail;
        $this->companyname=$companyname;
        $this->productsize=$productsize;
        $this->category=$category;
        $this->productprice=$productprice;
        $this->productquantity=$productquantity;

        $productava = $productquantity;

       $q="INSERT INTO product (id,productpic,productname, productdetail, companyname, productsize, category, productprice,productquantity,productava,productorder)VALUES('','$productpic', '$productname', '$productdetail', '$companyname', '$productsize', '$category', '$productprice', '$productquantity','$productava',0)";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    function addadvanceorder($date,$customerselect,$name,$phone,$address,$advanceamount,$productselect,$quantity,$detail,$type,$couriername) {
        $this->date=$date;
        $this->customerselect=$customerselect;
        $this->name=$name;
        $this->phone=$phone;
        $this->address=$address;
        $this->advanceamount=$advanceamount;
        $this->productselect=$productselect;
        $this->quantity=$quantity;
        $this->detail=$detail;
        $this->type=$type;
        $this->couriername=$couriername;
        

       $q="INSERT INTO advance_order (id, date, customerselect, name, phone, address, advanceamount, productselect, quantity, detail, type, couriername)VALUES('','$date', '$customerselect', '$name', '$phone', '$address', '$advanceamount', '$productselect', '$quantity','$detail','$type','$couriername')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    function addcouriermemo($couriermemopic,$date,$courierename,$couriermemonumber,$courierphone,$courieraddress,$senderphone,$receivername,$receiverphone,$receiveraddress,$conditionamount,$couriercharge,$courierfeestatus) {
        $this->couriermemopic=$couriermemopic;
        $this->date=$date;
        $this->courierename=$courierename;
        $this->couriermemonumber=$couriermemonumber;
        $this->courierphone=$courierphone;
        $this->courieraddress=$courieraddress;
        $this->senderphone=$senderphone;
        $this->receivername=$receivername;
        $this->receiverphone=$receiverphone;
        $this->receiveraddress=$receiveraddress;
        $this->conditionamount=$conditionamount;
        $this->couriercharge=$couriercharge;
        $this->courierfeestatus=$courierfeestatus;

        

       $q="INSERT INTO courier_memo (id, couriermemopic, date, couriername, couriermemonumber, courierphone, courieraddress, senderphone, receivername, receiverphone, receiveraddress, conditionamount, couriercharge, courierfeestatus)VALUES('','$couriermemopic','$date', '$courierename', '$couriermemonumber', '$courierphone', '$courieraddress', '$senderphone', '$receivername', '$receiverphone','$receiveraddress','$conditionamount','$couriercharge','$courierfeestatus')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    public function addinvoicememo(
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
) {
    $q = $this->connection->prepare("
        INSERT INTO invoicememo
        (memo_number, date, customer_name, phone, address, totalquantity, grandtotal, paid, due, condition_amount)
        VALUES
        (:memo_number, :date, :customer_name, :phone, :address, :totalquantity, :grandtotal, :paid, :due, :condition_amount)
    ");

    return $q->execute([
        ':memo_number'      => $memo_number,
        ':date'             => $date,
        ':customer_name'    => $customername,
        ':phone'            => $phone,
        ':address'          => $address,
        ':totalquantity'    => $totalquantity,
        ':grandtotal'       => $grandtotal,
        ':paid'             => $paid,
        ':due'              => $due,
        ':condition_amount' => $conditionamount
    ]);
}

function addinvoicememoitems($memo_number, $products) {

    foreach ($products as $item) {

        $productname = $item['productname'];
        $quantity    = $item['quantity'];
        $price       = $item['price'];
        $total       = $item['total'];

        $q = "INSERT INTO invoicememo_items
        (id, memo_number, productname, quantity, price, total)
        VALUES
        ('','$memo_number','$productname','$quantity','$price','$total')";

        $this->connection->exec($q);
    }
}




   public function updateproduct($id, $productname, $productdetail, $companyname, $productsize, $category, $productprice, $productquantity, $productava, $productorder, $productphoto = null) {
    try {
        if ($productphoto) {
            $q = "UPDATE product SET 
                    productname=?, productdetail=?, companyname=?, productsize=?, category=?, 
                    productprice=?, productquantity=?, productava=?, productorder=?, productpic=?
                  WHERE id=?";
            $stmt = $this->connection->prepare($q);
            return $stmt->execute([$productname, $productdetail, $companyname, $productsize, $category, $productprice, $productquantity, $productava, $productorder, $productphoto, $id]);
        } else {
            $q = "UPDATE product SET 
                    productname=?, productdetail=?, companyname=?, productsize=?, category=?, 
                    productprice=?, productquantity=?, productava=?, productorder=?
                  WHERE id=?";
            $stmt = $this->connection->prepare($q);
            return $stmt->execute([$productname, $productdetail, $companyname, $productsize, $category, $productprice, $productquantity, $productava, $productorder, $id]);
        }


    } catch (PDOException $e) {
        echo "Update failed: " . $e->getMessage();
        return false;
    }
}




function updatecustomer($id, $name, $shopname, $pagename, $phone, $address, $email, $pass, $type){
    $q = "UPDATE customer SET 
            name='$name',
            shopname='$shopname',
            pagename='$pagename',
            phone='$phone',
            address='$address',
            email='$email',
            pass='$pass',
            type='$type'
          WHERE id='$id'";
    return $this->connection->exec($q);
}


function updateadvanceorder($id, $date, $customerselect, $name, $phone, $address, $advanceamount, $productselect, $quantity, $detail, $type, $couriername) {
    $q = "UPDATE advance_order SET 
            date='$date',
            customerselect='$customerselect',
            name='$name',
            phone='$phone',
            address='$address',
            advanceamount='$advanceamount',
            productselect='$productselect',
            quantity='$quantity',
            detail='$detail',
            type='$type',
            couriername='$couriername'
          WHERE id='$id'";

    return $this->connection->exec($q);
}


public function updateCourierMemo(
    $id, $date, $couriername, $couriermemonumber, $courierphone,
    $courieraddress, $senderphone, $receivername, $receiverphone,
    $receiveraddress, $conditionamount, $couriercharge,
    $courierfeestatus, $couriermemopic = null
) {
    try {

        if ($couriermemopic) {
            $q = "UPDATE courier_memo SET
                    date=?, couriername=?, couriermemonumber=?, courierphone=?,
                    courieraddress=?, senderphone=?, receivername=?, receiverphone=?,
                    receiveraddress=?, conditionamount=?, couriercharge=?,
                    courierfeestatus=?, couriermemopic=?
                  WHERE id=?";
            $stmt = $this->connection->prepare($q);
            return $stmt->execute([
                $date, $couriername, $couriermemonumber, $courierphone,
                $courieraddress, $senderphone, $receivername, $receiverphone,
                $receiveraddress, $conditionamount, $couriercharge,
                $courierfeestatus, $couriermemopic, $id
            ]);
        } else {
            $q = "UPDATE courier_memo SET
                    date=?, couriername=?, couriermemonumber=?, courierphone=?,
                    courieraddress=?, senderphone=?, receivername=?, receiverphone=?,
                    receiveraddress=?, conditionamount=?, couriercharge=?,
                    courierfeestatus=?
                  WHERE id=?";
            $stmt = $this->connection->prepare($q);
            return $stmt->execute([
                $date, $couriername, $couriermemonumber, $courierphone,
                $courieraddress, $senderphone, $receivername, $receiverphone,
                $receiveraddress, $conditionamount, $couriercharge,
                $courierfeestatus, $id
            ]);
        }

    } catch (PDOException $e) {
        echo "Update failed: " . $e->getMessage();
        return false;
    }
}




      // UPDATE INVOICE MEMO
    
    public function updateInvoiceMemo(
        $id, $date, $customer_name, $phone, $address,
        $totalquantity, $grandtotal, $paid, $due, $condition_amount
    ) {
        $q = "UPDATE invoicememo SET
                date=?,
                customer_name=?,
                phone=?,
                address=?,
                totalquantity=?,
                grandtotal=?,
                paid=?,
                due=?,
                condition_amount=?
              WHERE id=?";
        $stmt = $this->connection->prepare($q);
        return $stmt->execute([
            $date,
            $customer_name,
            $phone,
            $address,
            $totalquantity,
            $grandtotal,
            $paid,
            $due,
            $condition_amount,
            $id
        ]);
    }

    
      // DELETE REMOVED ITEMS
   
    public function deleteRemovedInvoiceItems($memo_number, $itemids) {
        $itemids = array_filter($itemids);

        if (!empty($itemids)) {
            $placeholders = implode(',', array_fill(0, count($itemids), '?'));
            $q = "DELETE FROM invoicememo_items
                  WHERE memo_number=? AND id NOT IN ($placeholders)";
            $stmt = $this->connection->prepare($q);
            $stmt->execute(array_merge([$memo_number], $itemids));
        } else {
            $stmt = $this->connection->prepare(
                "DELETE FROM invoicememo_items WHERE memo_number=?"
            );
            $stmt->execute([$memo_number]);
        }
    }

    
       //UPDATE ITEM
   
    public function updateInvoiceItem($id, $productname, $quantity, $price, $total) {
        $q = "UPDATE invoicememo_items SET
                productname=?,
                quantity=?,
                price=?,
                total=?
              WHERE id=?";
        $stmt = $this->connection->prepare($q);
        return $stmt->execute([
            $productname,
            $quantity,
            $price,
            $total,
            $id
        ]);
    }

    
      // ADD NEW ITEM

    public function addInvoiceItem($memo_number, $productname, $quantity, $price, $total) {
        $q = "INSERT INTO invoicememo_items
              (memo_number, productname, quantity, price, total)
              VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($q);
        return $stmt->execute([
            $memo_number,
            $productname,
            $quantity,
            $price,
            $total
        ]);
    }


     function addDailyReport($date, $salesData, $costData, $cashData){
    try {
        $this->connection->beginTransaction();

       
        //  TOTAL VARIABLES
        
        $total_qty = 0;
        $total_sales = 0;
        $total_due = 0;
        $total_cost = 0;
        $total_cash = 0;

        
        // INSERT SALES
        
        foreach($salesData as $s){

            if(empty($s['memo'])) continue;

            $q = "INSERT INTO daily_sales (date, memo_number, customer_name, quantity, amount, due_amount)
                  VALUES (:date, :memo, :name, :qty, :amount, :due)";
            $stmt = $this->connection->prepare($q);
            $stmt->execute([
                ':date' => $date,
                ':memo' => $s['memo'],
                ':name' => $s['name'],
                ':qty' => $s['qty'],
                ':amount' => $s['amount'],
                ':due' => $s['due']
            ]);

            //  TOTAL CALCULATION
            $total_qty += $s['qty'];
            $total_sales += $s['amount'];
            $total_due += $s['due'];
        }

       
        // INSERT COST
        
        foreach($costData as $c){

            if(empty($c['details'])) continue;

            $q = "INSERT INTO daily_cost (date, cost_details, cost_amount, payment_method)
                  VALUES (:date, :details, :amount, :method)";
            $stmt = $this->connection->prepare($q);
            $stmt->execute([
                ':date' => $date,
                ':details' => $c['details'],
                ':amount' => $c['amount'],
                ':method' => $c['method']
            ]);

            //  TOTAL COST
            $total_cost += $c['amount'];
        }

        
        // INSERT CASH
        
        foreach($cashData as $c){

            if(empty($c['details'])) continue;

            $q = "INSERT INTO daily_cash (date, cash_details, cash_amount)
                  VALUES (:date, :details, :amount)";
            $stmt = $this->connection->prepare($q);
            $stmt->execute([
                ':date' => $date,
                ':details' => $c['details'],
                ':amount' => $c['amount']
            ]);

            // TOTAL CASH
            $total_cash += $c['amount'];
        }

        
        //  NET CASH
        
        $net_cash = ($total_sales + $total_cash) - ($total_due + $total_cost);

        
        //  INSERT DAILY REPORT
        
        $q = "INSERT INTO daily_report 
              (date, total_quantity, total_sales_amount, total_due_amount, total_cost, total_cash, net_cash)
              VALUES (:date, :qty, :sales, :due, :cost, :cash, :net)";

        $stmt = $this->connection->prepare($q);
        $stmt->execute([
            ':date' => $date,
            ':qty' => $total_qty,
            ':sales' => $total_sales,
            ':due' => $total_due,
            ':cost' => $total_cost,
            ':cash' => $total_cash,
            ':net' => $net_cash
        ]);

        
        $this->connection->commit();
        return true;

    } catch (Exception $e) {
        $this->connection->rollback();
        echo $e->getMessage();
        return false;
    }



    // ADD DAILY REPORT (MAIN FUNCTION)

    function addDailyReport($date, $salesData, $costData, $cashData){

        try {
            $this->connection->beginTransaction();

            $total_qty = 0;
            $total_sales = 0;
            $total_due = 0;
            $total_cost = 0;
            $total_cash = 0;

            // ---------- SALES ----------
            foreach($salesData as $s){

                if(empty($s['memo'])) continue;

                $q = "INSERT INTO daily_sales 
                      (date, memo_number, customer_name, quantity, amount, due_amount)
                      VALUES (:date, :memo, :name, :qty, :amount, :due)";

                $stmt = $this->connection->prepare($q);
                $stmt->execute([
                    ':date' => $date,
                    ':memo' => $s['memo'],
                    ':name' => $s['name'],
                    ':qty' => $s['qty'],
                    ':amount' => $s['amount'],
                    ':due' => $s['due']
                ]);

                $total_qty += $s['qty'];
                $total_sales += $s['amount'];
                $total_due += $s['due'];
            }

            // ---------- COST ----------
            foreach($costData as $c){

                if(empty($c['details'])) continue;

                $q = "INSERT INTO daily_cost 
                      (date, cost_details, cost_amount, payment_method)
                      VALUES (:date, :details, :amount, :method)";

                $stmt = $this->connection->prepare($q);
                $stmt->execute([
                    ':date' => $date,
                    ':details' => $c['details'],
                    ':amount' => $c['amount'],
                    ':method' => $c['method']
                ]);

                $total_cost += $c['amount'];
            }

            // ---------- CASH ----------
            foreach($cashData as $c){

                if(empty($c['details'])) continue;

                $q = "INSERT INTO daily_cash 
                      (date, cash_details, cash_amount)
                      VALUES (:date, :details, :amount)";

                $stmt = $this->connection->prepare($q);
                $stmt->execute([
                    ':date' => $date,
                    ':details' => $c['details'],
                    ':amount' => $c['amount']
                ]);

                $total_cash += $c['amount'];
            }

            // ---------- SUMMARY ----------
            $net_cash = ($total_sales + $total_cash) - ($total_due + $total_cost);

            $q = "INSERT INTO daily_report 
                  (date, total_quantity, total_sales_amount, total_due_amount, total_cost, total_cash, net_cash)
                  VALUES (:date, :qty, :sales, :due, :cost, :cash, :net)";

            $stmt = $this->connection->prepare($q);
            $stmt->execute([
                ':date' => $date,
                ':qty' => $total_qty,
                ':sales' => $total_sales,
                ':due' => $total_due,
                ':cost' => $total_cost,
                ':cash' => $total_cash,
                ':net' => $net_cash
            ]);

            $this->connection->commit();
            return true;

        } catch (Exception $e) {
            $this->connection->rollback();
            echo $e->getMessage();
            return false;
        }

    }

}

    private $id;


    function duecustomer(){
    $q="SELECT * FROM due_customer";
    $data=$this->connection->query($q);
    return $data;
    }


    function owndue(){
    $q="SELECT * FROM owndue";
    $data=$this->connection->query($q);
    return $data;
    }

    function duecustomerdetail($id){
    $q="SELECT * FROM due_customer where id ='$id'";
    $data=$this->connection->query($q);
    return $data;
}
    function ownduedetail($id){
    $q="SELECT * FROM owndue where id ='$id'";
    $data=$this->connection->query($q);
    return $data;

    }

    function getproduct() {
        $q="SELECT * FROM product ";
        $data=$this->connection->query($q);
        return $data;
    }


    function geteditproduct($id){
        $q="SELECT * FROM product where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    

     function getproductdetail($id){
        $q="SELECT * FROM product where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function getproductorder(){
        $q="SELECT * FROM product where productava !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }

    function customer() {
        $q="SELECT * FROM customer ";
        $data=$this->connection->query($q);
        return $data;
    }

   
    function customerdetail($id){
        $q="SELECT * FROM customer where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }


    function geteditcustomer($id){
        $q = "SELECT * FROM customer WHERE id='$id'";
        return $this->connection->query($q);
    }

    function getadvance() {
        $q="SELECT * FROM advance_order ";
        $data=$this->connection->query($q);
        return $data;
    }

    function getorderdetail($id){
        $q="SELECT * FROM advance_order where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function geteditadvanceorder($id){
        $q = "SELECT * FROM advance_order WHERE id='$id'";
        return $this->connection->query($q);
    }

    function getcouriermemo() {
        $q="SELECT * FROM courier_memo ";
        $data=$this->connection->query($q);
        return $data;
    }

    function getcouriermemodetail($id){
        $q="SELECT * FROM courier_memo where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function geteditcouriermemo($id) {
        $q="SELECT * FROM courier_memo WHERE id='$id'";
        $data=$this->connection->query($q);
        return $data;
    }


    function getinvoicememo() {
        $q="SELECT * FROM invoicememo ";
        $data=$this->connection->query($q);
        return $data;
    }


    function getinvoicememodetail($memo_number){
        $q="SELECT * FROM invoicememo where memo_number ='$memo_number'";
        $data=$this->connection->query($q);
        return $data;
    }


    function getinvoicememoitems($memo_number){
        $q="SELECT * FROM invoicememo_items where memo_number ='$memo_number'";
        $data=$this->connection->query($q);
        return $data;
    }


    function getdailyreport(){
    $q = "SELECT * FROM daily_report ORDER BY date DESC";
    $recordset = $this->connection->query($q);
    return $recordset->fetchAll(PDO::FETCH_NUM);
}




function getdailyreportdetail($date){
    $q = "SELECT * FROM daily_report WHERE date = :date";
    $stmt = $this->connection->prepare($q);
    $stmt->execute([':date' => $date]);
    return $stmt;
}

function getdailysalesbydate($date){
    $q = "SELECT * FROM daily_sales WHERE date = :date";
    $stmt = $this->connection->prepare($q);
    $stmt->execute([':date' => $date]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getdailycostbydate($date){
    $q = "SELECT * FROM daily_cost WHERE date = :date";
    $stmt = $this->connection->prepare($q);
    $stmt->execute([':date' => $date]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getdailycashbydate($date){
    $q = "SELECT * FROM daily_cash WHERE date = :date";
    $stmt = $this->connection->prepare($q);
    $stmt->execute([':date' => $date]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function getMonthlyreport($month, $year){

    $q = "SELECT date,
                SUM(total_quantity) AS total_quantity,
                SUM(total_sales_amount) AS total_sales_amount,
                SUM(total_cash) AS total_cash,
                SUM(total_cost) AS total_cost,
                SUM(total_due_amount) AS total_due_amount,
                SUM(net_cash) AS net_cash
          FROM daily_report
          WHERE MONTH(date)='$month' AND YEAR(date)='$year'
          GROUP BY date
          ORDER BY date ASC";

    return $this->connection->query($q);
}

function getduebycustomer($id){
    $sql = "SELECT * FROM due_transaction WHERE duecustomer_id = '$id'";
    return $this->connection->query($sql);
}

function getduebyown($id){
    $sql = "SELECT * FROM owndue_transaction WHERE owndue_id = '$id'";
    return $this->connection->query($sql);
}

    function deletecustomer($id){
        $q="DELETE from customer where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function deleteproduct($id){
        $q="DELETE from product where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

 function deleteorderlist($id){
        $q="DELETE from advance_order where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }


    //DELETE COURIER MEMO 

    function deletecouriermemo($id){
        $q="DELETE from courier_memo where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    
  // DELETE INVOICE ITEMS

public function deleteInvoiceItemsByMemo($memo_number) {
    $q = "DELETE FROM invoicememo_items WHERE memo_number=?";
    $stmt = $this->connection->prepare($q);
    return $stmt->execute([$memo_number]);
}


    //DELETE INVOICE MEMO

public function deleteInvoiceMemoByMemoNumber($memo_number) {
    $q = "DELETE FROM invoicememo WHERE memo_number=?";
    $stmt = $this->connection->prepare($q);
    return $stmt->execute([$memo_number]);
}

 
   //DELETE DAILY REPORT

function deletedailyreport($date){
    try {
        $this->connection->beginTransaction();

        // Delete from tables 
        $q1 = "DELETE FROM daily_sales WHERE date = :date";
        $stmt1 = $this->connection->prepare($q1);
        $stmt1->execute([':date' => $date]);

        $q2 = "DELETE FROM daily_cost WHERE date = :date";
        $stmt2 = $this->connection->prepare($q2);
        $stmt2->execute([':date' => $date]);

        $q3 = "DELETE FROM daily_cash WHERE date = :date";
        $stmt3 = $this->connection->prepare($q3);
        $stmt3->execute([':date' => $date]);

        // Delete main report
        $q4 = "DELETE FROM daily_report WHERE date = :date";
        $stmt4 = $this->connection->prepare($q4);
        $stmt4->execute([':date' => $date]);

        $this->connection->commit();
        return true;

    } catch (Exception $e) {
        $this->connection->rollback();
        echo $e->getMessage();
        return false;
    }
}

public function deleteDueCustomer($id)
{
    // delete customer
    $this->connection->prepare("
        DELETE FROM due_customer 
        WHERE id = ?
    ")->execute([$id]);

    // delete ledger
    $this->connection->prepare("
        DELETE FROM due_ledger 
        WHERE duecustomer_id = ?
    ")->execute([$id]);

    // delete due transactions
    $this->connection->prepare("
        DELETE FROM due_transaction 
        WHERE duecustomer_id = ?
    ")->execute([$id]);

    // delete payment transactions
    $this->connection->prepare("
        DELETE FROM payment_transaction 
        WHERE duecustomer_id = ?
    ")->execute([$id]);
}

public function deleteOwnDue($id)
{
    // delete Client
    $this->connection->prepare("
        DELETE FROM owndue 
        WHERE id = ?
    ")->execute([$id]);

    // delete ledger
    $this->connection->prepare("
        DELETE FROM owndue_ledger 
        WHERE owndue_id = ?
    ")->execute([$id]);

    // delete due transactions
    $this->connection->prepare("
        DELETE FROM owndue_transaction 
        WHERE owndue_id = ?
    ")->execute([$id]);

    // delete payment transactions
    $this->connection->prepare("
        DELETE FROM ownpayment_transaction 
        WHERE owndue_id = ?
    ")->execute([$id]);
}

function deletecustomerorder($id){

$q = "DELETE FROM product_request WHERE id='$id'";

$result = $this->connection->query($q);

if($result){

    echo "Delete Success";

}else{

    echo "Delete Failed";

}

}

public function deleteStaff($id)
{
    // Delete salary history first
    $sql1 = "DELETE FROM salary_payments WHERE staff_id = ?";
    $stmt1 = $this->connection->prepare($sql1);
    $stmt1->execute([$id]);

    // Delete staff record
    $sql2 = "DELETE FROM staff_salary WHERE id = ?";
    $stmt2 = $this->connection->prepare($sql2);

    return $stmt2->execute([$id]);
}


}