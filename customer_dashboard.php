<?php

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Customer Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
            .innerright,label {
    color: rgb(16, 170, 16);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin:auto;
}

.innerdiv {
    text-align: left;
     width: 1250px; 
    margin: 0px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 20%;
}

.rightinnerdiv {
    float: right;
    width: 80%;
}

.innerright {
    background-color: lightgreen;
}

.greenbtn {
    background-color: lightgray;
    color: black;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: black;
    font-size: large;
}

th{
    background-color: #16DE52;
    color: black;
}
td{
    background-color:#b1fec7;
    color: black;
}
td, a{
    color:black;
}
    </style>
    <body>

    <?php
   include("data_class.php");
    ?>
           <div class="container">
            <div class="innerdiv">
            <h1 style="color: blue; text-align: center; font-weight: bold;">Customer Dashboard</h1><br>
            <div class="leftinnerdiv">
                <br>
                <Button class="greenbtn" onclick="openpart('myaccount')">  My Account</Button>
                <Button class="greenbtn" onclick="openpart('requestproduct')"> Request Product</Button>
                <Button class="greenbtn" onclick="openpart('orderlist')">  Order List</Button>
                <a href="index.php"><Button class="greenbtn" >< Logout</Button></a>
            </div>


            <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >My Account</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->customerdetail($userloginid);
            $recordset=$u->customerdetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $shopname= $row[2];
            $pagename= $row[3];
            $phone= $row[4];
            $address= $row[5];
            $email= $row[6];
            $pass= $row[7];
            $type= $row[8];
            }               
                ?>

            <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:black"><u>Shop Name:</u> &nbsp&nbsp<?php echo $shopname ?></p>
            <p style="color:black"><u>Page Name:</u> &nbsp&nbsp<?php echo $pagename ?></p>
            <p style="color:black"><u>Phone:</u> &nbsp&nbsp<?php echo $phone ?></p>
            <p style="color:black"><u>Address:</u> &nbsp&nbsp<?php echo $address ?></p>
            <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
            <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
        
            </div>
            </div>

            

            <div class="rightinnerdiv">   
            <div id="requestproduct" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Request Product</Button>


             <?php
            $u=new data;
            $u->setconnection();
            $u->getproduct();
            $recordset=$u->getproduct();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Image</th><th>Product Name</th><th>Company Name</th><th>Size</th><th>Price</th><th>Quantity</th><th>Available</th></th><th>Detail</th><th>Order</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='product_images/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[3]</td>";
               $table .= "<td>
        <button type='button' class='btn btn-primary btn-sm' onclick='showQuantityForm($row[0])'>Order</button>

        <form id='orderForm_$row[0]' action='requestproduct.php' method='post' style='display:none; margin-top:5px;'>

            <input type='hidden' name='productid' value='$row[0]'>
            <input type='hidden' name='customerid' value='$userloginid'>
            <input type='hidden' name='product_name' value='$row[2]'>
            <input type='hidden' name='price' value='$row[7]'>
            <input type='hidden' name='customer_name' value='$name'>
            <input type='hidden' name='phone' value='$phone'>
            <input type='hidden' name='image' value='$row[1]'>
            <input type='number' name='quantity' value='1' min='1' max='$row[8]' style='width:60px'>
            <button type='submit' class='btn btn-success btn-sm'>Confirm</button>
        </form>
    </td>";

    $table .= "</tr>";
}
$table .= "</table>";

echo $table;
?>

<script>
function showQuantityForm(productId) {
    document.getElementById("orderForm_" + productId).style.display = "block";
}
</script>

</div>
</div>


<div class="rightinnerdiv">   

<div id="orderlist" class="innerright portion" style="display:none">

<Button class="greenbtn">Order List</Button>

<?php

$u = new data;
$u->setconnection();

$recordset = $u->getproductrequest($userloginid);

$sl = 1;

foreach($recordset as $row){

echo "

<div style='
background:#b1fec7;
padding:10px;
margin:10px;
border:1px solid #aed9e4;
border-radius:8px;
width:300px;
color:black;
font-size:14px;
display:inline-block;
vertical-align:top;'>

<h5 style='color:black; margin-bottom:8px;'>
Order Number : $sl
</h5>

<img src='product_images/$row[2]' 
width='90px' 
height='90px'
style='border:1px solid #333;
border-radius:5px;'>

<p style='margin:5px 0; color:black;'>
<b>Product Name :</b> $row[4]
</p>

<p style='margin:5px 0; color:black;'>
<b>Price :</b> $row[5]
</p>

<p style='margin:5px 0; color:black;'>
<b>Quantity(Pcs) :</b> $row[6]
</p>

<p style='margin:5px 0; color:black;'>
<b>Date :</b> $row[1]
</p>

<p style='margin:5px 0; color:black;'>
<b>Status :</b> $row[7]
</p>



<a href='deletecustomerorder.php?id=$row[0]&userlogid=$userloginid'>
<button style='
background:red;
color:white;
border:none;
padding:5px 10px;
border-radius:5px;'>
Delete
</button>
</a>

</div>
";

$sl++;

}

?>

</div>

</div>

</div>
</div>


        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>