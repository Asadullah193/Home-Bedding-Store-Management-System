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

        

       $q="INSERT INTO courier_memo (id, couriermemopic, date, courierename, couriermemonumber, courierphone, courieraddress, senderphone, receivername, receiverphone, receiveraddress, conditionamount, couriercharge, courierfeestatus)VALUES('','$couriermemopic','$date', '$courierename', '$couriermemonumber', '$courierphone', '$courieraddress', '$senderphone', '$receivername', '$receiverphone','$receiveraddress','$conditionamount','$couriercharge','$courierfeestatus')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
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


    private $id;



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

    function geteditcouriermemo() {
        $q="SELECT * FROM courier_memo ";
        $data=$this->connection->query($q);
        return $data;
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


    function deletecouriermemo($id){
        $q="DELETE from courier_memo where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }
}