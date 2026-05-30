
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>



        .innerright,label {
    color: rgba(47, 20, 223, 1);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin: 0;
    width: 100%;
}

.innerdiv {
    text-align: left;
    width: 100%;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}



input{
    margin-left:20px;
}
.leftinnerdiv {
    float: left;
    width: 18%;
}

.rightinnerdiv {
    float: right;
    width: 82%;
}

.innerright {
    background-color: #94ef9fff;
}

.greenbtn {
    background-color: #3dcb89ff;
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
    background-color: #b1fec7;
    color: black;
}
td, a{
    color:black;
}


        /* * {
            box-sizing: border-box;
            font-family: 'Roboto';
        } */
        
        label {
            margin-left:50px;
            padding-Top:10px;
            /* display: block;
            text-align: left; */
            font-size: 18px;
            /* font-style:bold;
            padding-bottom: 0px; */
            color: rgb(51, 51, 51);
            /* font-weight: 300;
            margin-bottom: 0rem; */
        }
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type=text]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        input[type=pasword]:focus,

        select:focus,
        textarea:focus {
            outline: none;
        }
        
        input[type=text],
        input[type=email],
        input[type=number],
        input[type=pasword],
        select,
        textarea {
            
            width: 40%;
            padding: 2px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            margin-top: 2px;
            margin-bottom: 2px;
            resize: vertical;
        }
        


        
        body {
            font-family: 'Roboto';
            /* background-image: url('image.jpg'); */
         
        }
        


        
         ::placeholder {
            color: rgb(189, 184, 184);
            font-style: italic;
            font-size: 14px;
        }



        .table-box {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.table-box th,
.table-box td {
    padding: 8px;
    border: 1px solid #000;
    text-align: center;
}

.table-box th {
    background-color: #16DE52;
}

.table-box td {
    background-color: #b1fec7;
}
   

.summary-table {
    width: 60%;
    margin: auto;
    border-collapse: collapse;
    font-family: Arial, Helvetica, sans-serif;
}

.summary-table td {
    padding: 12px 16px;
    border: 1px solid #000;
    font-size: 17px;
    background-color: #b1fec7;
    color: black;
}


.print-btn {  
    background: #2196F3; 
    color: white; 
    padding: 8px 14px; 
    border: none; 
    border-radius: 4px; 
    margin-top: 10px; 
    cursor: pointer; 
}



 
    </style>
    <body >

    <?php
   include("data_class.php");

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>



    <div class="container-fluid" style="padding-left:10px; padding-right:80px;">
        <div class="innerdiv">
            <h1 style="color: blue; text-align: center; font-weight: bold;">Admin Dashboard</h1><br>
            <div class="row"></div>
            <div class="leftinnerdiv">
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
                <br>
                <Button class="greenbtn" onclick="openpart('addproduct')" > ADD PRODUCT</Button>
                <Button class="greenbtn" onclick="openpart('productlist')" > PRODUCT LIST</Button>
                <Button class="greenbtn" onclick="openpart('productorderapprove')"> ORDER REQUEST</Button>
                <Button class="greenbtn" onclick="openpart('addcustomer')">  ADD CUSTOMER</Button>
                <Button class="greenbtn" onclick="openpart('customerlist')">  CUSTOMER LIST</Button>
                <Button class="greenbtn"  onclick="openpart('addadvanceorder')">  ADVANCE ORDER</Button>
                <Button class="greenbtn"  onclick="openpart('orderlist')">A.ORDER LIST</Button>
                <Button class="greenbtn"  onclick="openpart('addcouriermemo')"> ADD C.MEMO</Button>
                <Button class="greenbtn"  onclick="openpart('couriermemolist')"> C.MEMO LIST</Button>
                <a href="invoicememo_page.php"><Button class="greenbtn" > INVOICE MEMO</Button></a>
                <Button class="greenbtn" onclick="openpart('invoicememolist')">  I.MEMO LIST</Button>
                <Button class="greenbtn" onclick="openpart('dailyreport')">  DAILY REPORT</Button>
                <Button class="greenbtn" onclick="openpart('dailyreportlist')"> D.REPORT LIST</Button>
                <Button class="greenbtn" onclick="openpart('monthlysales')"> MONTHLY SALES</Button>
                <Button class="greenbtn" onclick="openpart('adddue')">DUE CUSTOMER</Button>
                <Button class="greenbtn" onclick="openpart('duecustomerlist')">D.CUSTOMER LIST</Button>
                <Button class="greenbtn" onclick="openpart('addowndue')"> OWN DUE</Button>
                <Button class="greenbtn" onclick="openpart('ownduelist')">OWN DUE LIST</Button>
                <Button class="greenbtn" onclick="openpart('addstaff')">ADD STAFF</Button>
                <Button class="greenbtn" onclick="openpart('stafflist')">STAFF LIST</Button>
                <a href="index.php"><Button class="greenbtn" > LOGOUT</Button></a>
            </div>
        

 <!-- ORDER REQUEST APPROVE -->

<div class="rightinnerdiv">   
<div id="productorderapprove" class="innerright portion" style="display:none">
<Button class="greenbtn">CUSTOMER ORDER APPROVE</Button>


<div style="position: relative; width: 250px; margin:10px 0;">
<input type="text" id="orderrequestSearch" placeholder="Search Order Request..." style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
<span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
</div>



<?php

$u = new data;
$u->setconnection();
$recordset = $u->getallproductrequest();

$pending = 0;
$approved = 0;
$dataArray = [];

foreach($recordset as $countrow){

    $dataArray[] = $countrow;

    if($countrow[9] == "Pending"){
        $pending++;
    }

    if($countrow[9] == "Approved"){
        $approved++;
    }

}


$sl = 1;

$table = "

<table style='
width:100%;
border-collapse:collapse;
font-family:Arial;'>

<tr style='background:#16DE52;color:black;'>

<th style='padding:10px;border:1px solid #ccc;'>SL</th>
<th style='padding:10px;border:1px solid #ccc;'>Date & Time</th>
<th style='padding:10px;border:1px solid #ccc;'>Customer Name</th>
<th style='padding:10px;border:1px solid #ccc;'>Phone</th>
<th style='padding:10px;border:1px solid #ccc;'>Image</th>
<th style='padding:10px;border:1px solid #ccc;'>Product Name</th>
<th style='padding:10px;border:1px solid #ccc;'>Price</th>
<th style='padding:10px;border:1px solid #ccc;'>Quantity</th>
<th style='padding:10px;border:1px solid #ccc;'>Status</th>
<th style='padding:10px;border:1px solid #ccc;'>Approve</th>
<th style='padding:10px;border:1px solid #ccc;'>Delete</th>
</tr>";

foreach($dataArray as $row){

$table .= "

<tr style='background:#b1fec7;color:black;text-align:center;'>

<td style='padding:10px;border:1px solid #ccc;'>
$sl
</td>

<td style='padding:10px;border:1px solid #ccc;'>
$row[10]
</td>

<td style='padding:10px;border:1px solid #ccc;'>
$row[3]
</td>

<td style='padding:10px;border:1px solid #ccc;'>
$row[5]
</td>

<td style='padding:10px;border:1px solid #ccc;'>

<img src='product_images/$row[8]'
width='80'
height='80'
style='border-radius:8px;border:1px solid #333;'>

</td>

<td style='padding:10px;border:1px solid #ccc;'>
$row[4]
</td>

<td style='padding:10px;border:1px solid #ccc;'>
$row[6]
</td>

<td style='padding:10px;border:1px solid #ccc;'>
$row[7]
</td>

<td style='padding:10px;border:1px solid #ccc;'>

<span style='
background:orange;
color:white;
padding:5px 10px;
border-radius:5px;'>

$row[9]

</span>

</td>

<td style='padding:10px;border:1px solid #ccc;'>

<a href='approveproductrequest.php?id=$row[0]'>

<button style='
background:green;
color:white;
border:none;
padding:8px 10px;
border-radius:5px;
cursor:pointer;'>

Approve

</button>

</a>

<td style='padding:10px;border:1px solid #ccc;'>

<a href='deleteproductrequest.php?id=$row[0]'>

<button style='
background:blue;
color:white;
border:none;
padding:8px 8px;
border-radius:5px;
cursor:pointer;'>

Delete

</button>

</a>

</td>
</td>

</tr>";

$sl++;

}

$table .= "</table>";




echo "

<div style='margin-bottom:15px;'>

<span style='
background:orange;
color:white;
padding:10px 20px;
border-radius:5px;
margin-right:10px;
font-weight:bold;'>

Pending : $pending

</span>

<span style='
background:green;
color:white;
padding:10px 20px;
border-radius:5px;
font-weight:bold;'>

Approved : $approved

</span>

</div>

";



echo $table;

?>

</div>

</div>

<script>

document.getElementById("orderrequestSearch").addEventListener("keyup", function () {

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll("#productorderapprove table tr");

    rows.forEach((row, index) => {

        if(index === 0){
            return;
        }

        let text = row.innerText.toLowerCase();

        if(text.includes(value)){

            row.style.display = "";

        }else{

            row.style.display = "none";

        }

    });

});

</script>

            <!-- Add Product -->

             <div class="rightinnerdiv">   
            <div id="addproduct" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD NEW PRODUCT</Button>
            <br>
            <form action="addproductserver_page.php" method="post" enctype="multipart/form-data">
            <label>Product Name:</label><input type="text" name="productname"/>
            </br>
            <label>Detail:</label><input  type="text" name="productdetail"/></br>
            <label for="typw">Company Name:</label>
            <select name="companyname" >
                <option value="Home Bedding Ltd">Home Bedding Ltd</option>
                <option value="Hometex Ltd">Hometex Ltd</option>
                <option value="Pakiza Textiles Ltd">Pakiza Textiles Ltd</option>
                <option value="Yamin Accessories Ltd">Yamin Accessories Ltd</option>
                <option value="Momtex Expo Ltd">Momtex Expo Ltd</option>
                <option value="Taslima Textile">Taslima Textile</option>
                <option value="Quality Textile">Quality Textile</option>
                <option value="Digital Hometex Ltd">Digital Hometax Ltd</option>
                <option value="M/S Tisha Textile Ltd">M/S Tisha Textile Ltd</option>
                <option value="Other">Other</option>
            </select><br>
            <label for="typw">Product Size:</label>
            <select name="productsize" >
                <option value="King Size">King Size</option>
                <option value="Queen Size">Queen Size</option>
                <option value="Single Size">Single Size</option>
                <option value="Large Size">Large Size</option>
                <option value="Small Size">Small Size</option>

            </select>
            <div><label>Category:</label><input type="radio" name="category" value="bedsheet"/>Bedsheet<input type="radio" name="category" value="nokshikatha"/>Nokshi Katha<div style="margin-left:80px"><input type="radio" name="category" value="tablemat"/>Table Mat<input type="radio" name="category" value="comforter"/>Comforter<input type="radio" name="category" value="other"/>Other</div>
            </div>   
            <label>Price:</label><input  type="text" name="productprice"/></br>
            <label>Quantity:</label><input type="number" name="productquantity"/></br>
            <label>Product Photo</label><input  type="file" name="productphoto"/></br>
            </br>
   
            <input type="submit" value="SUBMIT"/>
            </br>
            

            </form>
            </div>
            </div>

            <!-- Peoduct List -->

            <div class="rightinnerdiv">   
            <div id="productlist" class="innerright portion" style="display:none">
            <Button class="greenbtn" >PRODUCT LIST</Button>


            <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="productSearch" placeholder="Search Product..." style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
            </div>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getproduct();
            $recordset=$u->getproduct();

            

            $table = "<table class='table-box'>
            <tr>
                <th>Product Name</th>
                <th>Company Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Available</th>
                <th>Order</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";

            foreach($recordset as $row){
            $table .= "<tr>
                <td>$row[2]</td>
                <td>$row[4]</td>
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td>$row[9]</td>
                <td>$row[10]</td>
                
               <td><a href='admin_service_dashboard.php?productid=$row[0]'><button type='button' class='btn btn-primary'>View Product</button></a></td>
               <td><a href='admin_service_dashboard.php?editproductid=$row[0]'style='color:blue;'>Edit</a></td>
               <td><a href='deleteproduct.php?deleteproductid=$row[0]'style='color:blue;'>Delete</a></td>
             </tr>";
            }

            $table .= "</table>";
            echo $table;
            ?>
            </div>
            </div>


        <script>
              document.getElementById("productSearch").addEventListener("keyup", function () {
              let value = this.value.toLowerCase();
              let rows = document.querySelectorAll(".table-box tr");

            rows.forEach((row, index) => {
             if (index === 0) return;
             row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
             });
             });
        </script>

            <!-- Edit Peoduct -->

            <div class="rightinnerdiv">   
            <div id="editproduct" class="innerright portion" style="<?php  if(!empty($_REQUEST['editproductid'])){ $editproductid=$_REQUEST['editproductid'];} else {echo "display:none"; }?>">
            <Button class="greenbtn" >EDIT PRODUCT</Button>
            <br>

            <?php

            if (!empty($_REQUEST['editproductid'])) {
                $editproductid = $_REQUEST['editproductid'];

            $u = new data;
            $u->setconnection();
            $recordset = $u->geteditproduct($editproductid);
            $product = $recordset->fetch(PDO::FETCH_ASSOC);
            }

            if (!empty($product)) {
                
                
           ?>
        <form action="editproduct.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <label>Product Name:</label>
        <input type="text" name="productname" value="<?php echo ($product['productname']); ?>"/>
        <br>

        <label>Detail:</label>
        <input type="text" name="productdetail" value="<?php echo ($product['productdetail']); ?>"/>
        <br>

        <label for="companyname">Company Name:</label>
        <select name="companyname">
            <option value="Home Bedding Ltd" <?php if($product['companyname']=="Home Bedding Ltd") echo "selected"; ?>>Home Bedding Ltd</option>
            <option value="Hometex Ltd" <?php if($product['companyname']=="Hometex Ltd") echo "selected"; ?>>Hometex Ltd</option>
            <option value="Pakiza Textiles Ltd" <?php if($product['companyname']=="Pakiza Textiles Ltd") echo "selected"; ?>>Pakiza Textiles Ltd</option>
        </select>
        <br>

        <label for="productsize">Product Size:</label>
        <select name="productsize">
            <option value="King Size" <?php if($product['productsize']=="King Size") echo "selected"; ?>>King Size</option>
            <option value="Queen Size" <?php if($product['productsize']=="Queen Size") echo "selected"; ?>>Queen Size</option>
            <option value="Single Size" <?php if($product['productsize']=="Single Size") echo "selected"; ?>>Single Size</option>
        </select>
        <br>

        <label>Category:</label>
        <input type="radio" name="category" value="bedsheet" <?php if($product['category']=="bedsheet") echo "checked"; ?>>Bedsheet
        <input type="radio" name="category" value="nokshikatha" <?php if($product['category']=="nokshikatha") echo "checked"; ?>>Nokshi Katha
        <input type="radio" name="category" value="tablemat" <?php if($product['category']=="tablemat") echo "checked"; ?>>Table Mat
        <input type="radio" name="category" value="comforter" <?php if($product['category']=="comforter") echo "checked"; ?>>Comforter
        <input type="radio" name="category" value="other" <?php if($product['category']=="other") echo "checked"; ?>>Other
        <br>

        <label>Price:</label>
        <input type="text" name="productprice" value="<?php echo $product['productprice']; ?>"/>
        <br>

        <label>Quantity:</label>
        <input type="number" name="productquantity" value="<?php echo $product['productquantity']; ?>"/>
        <br>
        <?php
        $productava = $product['productquantity'] - $product['productorder'];
?>
        <label>Product Available:</label>
        <input type="number" name="aroductava" value="<?php echo $product['productava']; ?>"/>
        <br>

        <label>Order:</label>
        <input type="number" name="productorder" value="<?php echo $product['productorder']; ?>"/>
        <br>

        <label>Product Photo:</label>
        <input type="file" name="productpic"/>
        
        <br>
        <?php if (!empty($product['productpic'])) { ?>
        <img src="product_images/<?php echo ($product['productpic']); ?>"  width="100">
        <?php } else { ?>
        <p>No image uploaded</p>
        <?php } ?>


        <input type="submit" value="SUBMIT"/>
        </form>
        <?php
        }   
        else {
        echo "<p>Product not found!</p>";
       }
       ?>

        </div>
        </div>

            <!-- Peoduct detail -->

            <div class="rightinnerdiv">   
            <div id="productdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['productid'])){ $productid=$_REQUEST['productid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >PRODUCT DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getproductdetail($productid);
            $recordset=$u->getproductdetail($productid);
            foreach($recordset as $row){

               $productid= $row[0];
               $productimg= $row[1];
               $productname= $row[2];
               $productdetail= $row[3];
               $companyname= $row[4];
               $produtsize= $row[5];
               $category= $row[6];
               $productprice= $row[7];
               $productquantity= $row[8];
               $productava= $row[9];
               $productorder= $row[10];

            }            
?>
            

            <img width='350px' height='320px' style='border:5px solid #333333; float:left;margin-left:30px' src="product_images/<?php echo $productimg?> "/>
            </br>
            
            <p style="color:black"><u>Product Name:</u> &nbsp&nbsp<?php echo $productname ?></p>
            <p style="color:black"><u>Product Detail:</u> &nbsp&nbsp<?php echo $productdetail ?></p>
            <p style="color:black"><u>Company Name:</u> &nbsp&nbsp<?php echo $companyname ?></p>
            <p style="color:black"><u>Product size:</u> &nbsp&nbsp<?php echo $produtsize ?></p>
            <p style="color:black"><u>Category:</u> &nbsp&nbsp<?php echo $category ?></p>
            <p style="color:black"><u>Product Price:</u> &nbsp&nbsp<?php echo $productprice ?></p>
            <p style="color:black"><u>Product Available:</u> &nbsp&nbsp<?php echo $productava ?></p>
            <p style="color:black"><u>Product Order:</u> &nbsp&nbsp<?php echo $productorder ?></p>


            </div>
            </div>



            <!-- PRODUCT ORDER REQUEST APPROVE -->

            <div class="rightinnerdiv">   
            <div id="productrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" >PRODUCT ORDER REQUEST APPROVE</Button>

            </div>
            </div>

            <!-- Add Customer -->

            <div class="rightinnerdiv">   
            <div id="addcustomer" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD CUSTOMER</Button>
            <form action="addcustomerserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Shop Name:</label><input type="text" name="addshopname"/>
            </br>
            <label>Page Name:</label><input type="text" name="addpagename"/>
            </br>
            <label>Phone:</label><input type="number" name="addphone"/>
            </br>
            <label>Address:</label><input type="text" name="addaddress"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/>
            </br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="Wholesale Customer">Wholesale Customer</option>
                <option value="Retail Customer">Retail Customer</option>
                <option value="Online Customer">Online Customer</option>
                <option value="Offline Customer">Offline Customer</option>
            </select>

            <input type="submit" value="SUBMIT"/>
            </form>

            
            </div>
            </div>

            
          <!-- Customer List -->
<div class="rightinnerdiv">   
    <div id="customerlist" class="innerright portion" style="display:none">
        <button class="greenbtn">CUSTOMER LIST</button>

        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="customerSearch" placeholder="Search Customer..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
        </div>

        <?php
        $u = new data;
        $u->setconnection();
        $recordset = $u->customer();

        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Name</th>
                    <th>Shop Name</th>
                    <th>Page Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>";
            $table .= "<td>$row[1]</td>";
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[3]</td>";
            $table .= "<td>$row[4]</td>";
            $table .= "<td>$row[5]</td>";
            $table .= "<td>$row[6]</td>";
            $table .= "<td>$row[8]</td>";
            $table .= "<td><a href='admin_service_dashboard.php?editcustomerid=$row[0]'style='color:blue;'>Edit</a></td>";
            $table .= "<td><a href='deletecustomer.php?customeriddelete=$row[0]'style='color:blue;'>Delete</a></td>";
            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;
        ?>
    </div>
</div>


<script>
document.getElementById("dueCustomerSearch").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#dueCustomerTable tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>


            <!-- Edit Customer -->

        <div class="rightinnerdiv">   
        <div id="editcustomer" class="innerright portion" style="<?php  if(!empty($_REQUEST['editcustomerid'])){ $editcustomerid=$_REQUEST['editcustomerid'];} else {echo "display:none"; }?>">
        <Button class="greenbtn">EDIT CUSTOMER</Button>
        <br>

        <?php
        if (!empty($_REQUEST['editcustomerid'])) {
            $editcustomerid = $_REQUEST['editcustomerid'];

            $u = new data();
            $u->setconnection();
            $recordset = $u->geteditcustomer($editcustomerid);
            $customer = $recordset->fetch(PDO::FETCH_ASSOC);

            if (!empty($customer)) {
        ?>

        <form action="editcustomer.php" method="post">
            <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">

            <label>Name:</label>
            <input type="text" name="addname" value="<?php echo ($customer['name']); ?>"/>
            <br>

            <label>Shop Name:</label>
            <input type="text" name="addshopname" value="<?php echo ($customer['shopname']); ?>"/>
            <br>

            <label>Page Name:</label>
            <input type="text" name="addpagename" value="<?php echo ($customer['pagename']); ?>"/>
            <br>

            <label>Phone:</label>
            <input type="number" name="addphone" value="<?php echo ($customer['phone']); ?>"/>
            <br>

            <label>Address:</label>
            <input type="text" name="addaddress" value="<?php echo ($customer['address']); ?>"/>
            <br>

            <label>Email:</label>
            <input type="email" name="addemail" value="<?php echo ($customer['email']); ?>"/>
            <br>

            <label>Password:</label>
            <input type="password" name="addpass" value="<?php echo ($customer['pass']); ?>"/>
            <br>
            <label>Choose type:</label>
            <select name="type">
                <option value="Wholesale Customer" <?php if($customer['type']=="Wholesale Customer") echo "selected"; ?>>Wholesale Customer</option>
                <option value="Retail Customer" <?php if($customer['type']=="Retail Customer") echo "selected"; ?>>Retail Customer</option>
                <option value="Online Customer" <?php if($customer['type']=="Online Customer") echo "selected"; ?>>Online Customer</option>
                <option value="Offline Customer" <?php if($customer['type']=="Offline Customer") echo "selected"; ?>>Offline Customer</option>
            </select>
            <br><br>

            <input type="submit" value="UPDATE"/>
        </form>

        <?php
            } else {
                echo "<p>Customer not found!</p>";
            }
        } else {
            echo "<p>No customer selected to edit.</p>";
        }
        ?>

    </div>
</div>


            <!-- Add Addvance Order -->

            <div class="rightinnerdiv">   
            <div id="addadvanceorder" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD ADVANCE ORDER</Button>
            <form action="addadvanceorder_server_page.php" method="post" enctype="multipart/form-data">
            <label>Date:</label><input type="date" name="adddate"/>
            </br>
            <label for="Select Customer">Select Customer:</label>
            <select name="customerselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->customer();
            $recordset=$u->customer();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";

            }
            $othercustomers = ["Other"];
            foreach($othercustomers as $other){
             echo "<option value='". $other ."'>".$other."</option>";
            }  
            
            ?>
            </select>
            <br>
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Phone:</label><input type="number" name="addphone"/>
            </br>
            <label>Address:</label><input type="text" name="addaddress"/>
            </br>
            <label>Advance Amount:</label><input type="text" name="addadvanceamount"/>
            </br>

            <label for="Select Product">Choose Product:</label>
           
            <select name="productselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getproduct();
            $recordset=$u->getproduct();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }  
            
            $otherproduct = ["Other"];
            foreach($otherproduct as $other){
             echo "<option value='". $other ."'>".$other."</option>";
            }  
            ?>
            </select>
            <br>
            <label>Product Quantity:</label><input type="number" name="addquantity"/>
            </br>
            <label>Order Detail:</label><input type="text" name="adddetail"/>
            </br>

            <label for="typw">Customer type:</label>
            <select name="type" >
                <option value="Wholesale Customer">Wholesale Customer</option>
                <option value="Retail Customer">Retail Customer</option>
                <option value="Online Customer">Online Customer</option>
                <option value="Offline Customer">Offline Customer</option>
            </select>
        </br>
            <label for="typw">Courier Name:</label>
            <select name="couriername" >
                <option value="Sundarban Courier Service">Sundarban Courier Service</option>
                <option value="SA Paribahan">SA Paribahan</option>
                <option value="Janani Express Parcel Service">Janani Express Parcel Service</option>
                <option value="Pathao Courier">Pathao Courier</option>
                <option value="RedX">RedX</option>
                <option value="FedEx">FedEx</option>
                <option value="Karatoa Courier Service">Karatoa Courier Service</option>
                <option value="Rainbow Courier Service">Rainbow Courier Service</option>
                <option value="Other">Other</option>

            </select>

            <input type="submit" value="SUBMIT"/>
            </form>

            
            </div>
         </div>

         <!-- Advance Order List -->

        <div class="rightinnerdiv">   
        <div id="orderlist" class="innerright portion" style="display:none">
        <button class="greenbtn">ADVANCE ORDER LIST</button>

        
        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="advanceOrderSearch" placeholder="Search Advance Orders..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
        </div>

        <?php
        $u = new data;
        $u->setconnection();
        $recordset = $u->getadvance();

        
        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Date</th>
                    <th>Select Customer</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Advance Amount</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>";
            $table .= "<td>$row[1]</td>";
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[3]</td>";
            $table .= "<td>$row[4]</td>";
            $table .= "<td>$row[5]</td>";
            $table .= "<td>$row[6]</td>";
            $table .= "<td><a href='admin_service_dashboard.php?advance_orderid=$row[0]'><button type='button' class='btn btn-primary'>Order Details</button></a></td>";
            $table .= "<td><a href='admin_service_dashboard.php?editadvance_orderid=$row[0]'style='color:blue;'>Edit</a></td>";
            $table .= "<td><a href='deleteorderlist.php?deleteadvance_orderid=$row[0]'style='color:blue;'>Delete</a></td>";
            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;
        ?>
    </div>
</div>


<script>
document.getElementById("advanceOrderSearch").addEventListener("keyup", function () {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll(".table-box tbody tr"); 
    rows.forEach((row) => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

   

            <!-- Advance Order detail -->

            <div class="rightinnerdiv">   
            <div id="orderdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['advance_orderid'])){ $advance_orderid=$_REQUEST['advance_orderid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >ADVANCE ORDER DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getorderdetail($advance_orderid);
            $recordset=$u->getorderdetail($advance_orderid);
            foreach($recordset as $row){

               $advance_orderid= $row[0];
               $date= $row[1];
               $customerselect= $row[2];
               $name= $row[3];
               $phone= $row[4];
               $address= $row[5];
               $advanceamount= $row[6];
               $productselect= $row[7];
               $quantity= $row[8];
               $detail= $row[9];
               $type= $row[10];
               $couriername= $row[11];

            }            
?>
            

            
            <p style="color:black"><u>Date:</u> &nbsp&nbsp<?php echo $date ?></p>
            <p style="color:black"><u>Select Customer:</u> &nbsp&nbsp<?php echo $customerselect ?></p>
            <p style="color:black"><u>Name:</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:black"><u>Phone:</u> &nbsp&nbsp<?php echo $phone ?></p>
            <p style="color:black"><u>Address:</u> &nbsp&nbsp<?php echo $address ?></p>
            <p style="color:black"><u>Advance Amount:</u> &nbsp&nbsp<?php echo $advanceamount ?></p>
            <p style="color:black"><u>Select Product:</u> &nbsp&nbsp<?php echo $productselect ?></p>
            <p style="color:black"><u>Quantity:</u> &nbsp&nbsp<?php echo $quantity ?></p>
            <p style="color:black"><u>Odrer Detail:</u> &nbsp&nbsp<?php echo $detail ?></p>
            <p style="color:black"><u>Customer Type:</u> &nbsp&nbsp<?php echo $type ?></p>
            <p style="color:black"><u>Courier Service Name:</u> &nbsp&nbsp<?php echo $couriername ?></p>


            </div>
            </div>

           
            <!-- Edit Advance Order -->

           <div class="rightinnerdiv">   
           <div id="editadvanceorder" class="innerright portion" style="<?php if(!empty($_REQUEST['editadvance_orderid'])) { $editadvance_orderid=$_REQUEST['editadvance_orderid']; } else { echo 'display:none'; } ?>">
           <Button class="greenbtn">EDIT ADVANCE ORDER</Button>
           <br>

           <?php
            if (!empty($_REQUEST['editadvance_orderid'])) {
               $editadvance_orderid = $_REQUEST['editadvance_orderid'];

               $u = new data();
               $u->setconnection();
               $recordset = $u->geteditadvanceorder($editadvance_orderid); 
               $advance_order = $recordset->fetch(PDO::FETCH_ASSOC);

            if (!empty($advance_order)) {
        ?>

        <form action="editadvanceorder.php" method="post">
            <input type="hidden" name="id" value="<?php echo $advance_order['id']; ?>">

            <label>Date:</label>
            <input type="date" name="adddate" value="<?php echo $advance_order['date']; ?>"/>
            <br>

            <label for="Select Customer">Select Customer:</label>
            <select name="customerselect">
            <?php
            $u = new data();
            $u->setconnection();
            $recordset = $u->customer();

            foreach ($recordset as $row) {
            $id = $row[0];
            $selected = ($row[1] == $advance_order['customerselect']) ? "selected" : "";
            echo "<option value='" . $row[1] . "' $selected>" . $row[1] . "</option>";
            }

            $othercustomers = ["Other"];
            foreach ($othercustomers as $other) {
             $selected = ($other == $advance_order['customerselect']) ? "selected" : "";
            echo "<option value='" . $other . "' $selected>" . $other . "</option>";
            }
            ?>
           </select>
            <br>

            <label>Name:</label>
            <input type="text" name="addname" value="<?php echo $advance_order['name']; ?>"/>
            <br>

            <label>Phone:</label>
            <input type="number" name="addphone" value="<?php echo $advance_order['phone']; ?>"/>
            <br>

            <label>Address:</label>
            <input type="text" name="addaddress" value="<?php echo $advance_order['address']; ?>"/>
            <br>

            <label>Advance Amount:</label>
            <input type="text" name="addadvanceamount" value="<?php echo $advance_order['advanceamount']; ?>"/>
            <br>

            <label for="Select Product">Choose Product:</label>
            <select name="productselect">
            <?php
            $u = new data();
            $u->setconnection();
            $recordset = $u->getproduct();

           foreach ($recordset as $row) {
           $selected = ($row[2] == $advance_order['productselect']) ? "selected" : "";
           echo "<option value='" . $row[2] . "' $selected>" . $row[2] . "</option>";
           }
           $otherproduct = ["Other"];
           foreach ($otherproduct as $other) {
           $selected = ($other == $advance_order['productselect']) ? "selected" : "";
           echo "<option value='" . $other . "' $selected>" . $other . "</option>";
           }
           ?>
           </select>
            <br>

            <label>Quantity:</label>
            <input type="number" name="addquantity" value="<?php echo $advance_order['quantity']; ?>"/>
            <br>

            <label>Order Detail:</label>
            <input type="text" name="adddetail" value="<?php echo $advance_order['detail']; ?>"/>
            <br>

            <label>Customer Type:</label>
            <select name="type">
                <option value="Wholesale Customer" <?php if($advance_order['type']=="Wholesale Customer") echo "selected"; ?>>Wholesale Customer</option>
                <option value="Retail Customer" <?php if($advance_order['type']=="Retail Customer") echo "selected"; ?>>Retail Customer</option>
                <option value="Online Customer" <?php if($advance_order['type']=="Online Customer") echo "selected"; ?>>Online Customer</option>
                <option value="Offline Customer" <?php if($advance_order['type']=="Offline Customer") echo "selected"; ?>>Offline Customer</option>
            </select>
            <br>

            <label for="typw">Courier Name:</label>
            <select name="couriername">
               <option value="Sundarban Courier Service" <?php if($advance_order['couriername']=="Sundarban Courier Service") echo "selected"; ?>>Sundarban Courier Service</option>
               <option value="SA Paribahan" <?php if($advance_order['couriername']=="SA Paribahan") echo "selected"; ?>>SA Paribahan</option>
               <option value="Janani Express Parcel Service" <?php if($advance_order['couriername']=="Janani Express Parcel Service") echo "selected"; ?>>Janani Express Parcel Service</option>
               <option value="Pathao Courier" <?php if($advance_order['couriername']=="Pathao Courier") echo "selected"; ?>>Pathao Courier</option>
               <option value="RedX" <?php if($advance_order['couriername']=="RedX") echo "selected"; ?>>RedX</option>
               <option value="FedEx" <?php if($advance_order['couriername']=="FedEx") echo "selected"; ?>>FedEx</option>
               <option value="Karatoa Courier Service" <?php if($advance_order['couriername']=="Karatoa Courier Service") echo "selected"; ?>>Karatoa Courier Service</option>
               <option value="Rainbow Courier Service" <?php if($advance_order['couriername']=="Rainbow Courier Service") echo "selected"; ?>>Rainbow Courier Service</option>
               <option value="Other" <?php if($advance_order['couriername']=="Other") echo "selected"; ?>>Other</option>
           </select>
        

            <input type="submit" value="UPDATE"/>
        </form>

        <?php
            } else {
                echo "<p>Order not found!</p>";
            }
        } else {
            echo "<p>No order selected to edit.</p>";
        }
        ?>

    </div>
</div>


<!-- Monthly Sales Report -->

<div class="rightinnerdiv">   
<div id="monthlysales" class="innerright portion" style="display:none">

<Button class="greenbtn">MONTHLY SALES REPORT</Button>

<form action="monthlysales_report.php" method="post">

<label><b>Select Month:</b></label>
<select name="month" required>
    <option value="">-- Select Month --</option>
    <option value="01">January</option>
    <option value="02">February</option>
    <option value="03">March</option>
    <option value="04">April</option>
    <option value="05">May</option>
    <option value="06">June</option>
    <option value="07">July</option>
    <option value="08">August</option>
    <option value="09">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select>

<br><br>

<label><b>Select Year:</b></label>
<select name="year" required>
    <option value="">-- Select Year --</option>
    <?php
    $currentYear = date("Y");
    for($i = 0; $i < 20; $i++){
        echo "<option value='".($currentYear-$i)."'>".($currentYear-$i)."</option>";
    }
    ?>
</select>

<br><br>

<input type="submit" value="SUBMIT" class="greenbtn"/>

</form>

</div>
</div>


            <!-- Add Courier Memo -->

            <div class="rightinnerdiv">   
            <div id="addcouriermemo" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD COURIER MEMO</Button>
            <form action="addcouriermemo_server_page.php" method="post" enctype="multipart/form-data">
            <label>Date:</label><input type="date" name="date"/>
            </br>
            <label for="typw">Courier Name:</label>
            <select name="couriername" >
                <option value="Sundarban Courier Service">Sundarban Courier Service</option>
                <option value="SA Paribahan">SA Paribahan</option>
                <option value="Janani Express Parcel Service">Janani Express Parcel Service</option>
                <option value="Pathao Courier">Pathao Courier</option>
                <option value="RedX">RedX</option>
                <option value="FedEx">FedEx</option>
                <option value="Karatoa Courier Service">Karatoa Courier Service</option>
                <option value="Rainbow Courier Service">Rainbow Courier Service</option>
                <option value="Other">Other</option>

            </select>
            </br>
            <label>Courier Memo Number:</label><input type="text" name="couriermemonumber"/>
            </br>
            <label>Courier Phone:</label><input type="number" name="courierphone"/>
            </br>
            <label>Courier Address:</label><input type="text" name="courieraddress"/>
            </br>
            <label for="typw">Sender Phone:</label>
            <select name="senderphone" >
                <option value="01712895018">01712895018</option>
                <option value="01721399446">01721399446</option>
                <option value="01690280710">01690280710</option>
                <option value="01963760510">01963760510</option>
            </select>
            </br>
            <label>Receiver Name:</label><input type="text" name="receivername"/>
            </br>
            <label>Receiver Phone:</label><input type="number" name="receiverphone"/>
            </br>
            <label>Receiver Address:</label><input type="text" name="receiveraddress"/>
            </br>
            <label>Condition Amount:</label><input type="text" name="conditionamount"/>
            </br>
            <label>Courier Charge:</label><input type="text" name="couriercharge"/>
            </br>
            <label for="typw">Courier Fee Status:</label>
            <select name="courierfeestatus" >
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
            </br>
            <label>Courier Memo Photo</label><input  type="file" name="couriermemophoto"/></br>
            </br>
            <input type="submit" value="SUBMIT"/>
            </form>

            
            </div>
            </div>


         <!-- Courier Memo List -->
<div class="rightinnerdiv">   
    <div id="couriermemolist" class="innerright portion" style="display:none">
        <button class="greenbtn">COURIER MEMO LIST</button>

        
        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="courierMemoSearch" placeholder="Search Courier Memo..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
        </div>

        <?php
        $u = new data;
        $u->setconnection();
        $recordset = $u->getcouriermemo();

        
        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Date</th>
                    <th>Receiver Name</th>
                    <th>Receiver Phone</th>
                    <th>Memo Number</th>
                    <th>Condition Amount</th>
                    <th>Courier Name</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>"; 
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[8]</td>";
            $table .= "<td>$row[9]</td>";
            $table .= "<td>$row[4]</td>";
            $table .= "<td>$row[11]</td>";
            $table .= "<td>$row[3]</td>";
            $table .= "<td><a href='admin_service_dashboard.php?courier_memoid=$row[0]'><button type='button' class='btn btn-primary'>Detail</button></a></td>";
            $table .= "<td><a href='admin_service_dashboard.php?editcouriermemoid=$row[0]'style='color:blue;'>Edit</a></td>";
            $table .= "<td><a href='deletecouriermemo.php?deletecourier_memoid=$row[0]'style='color:blue;'>Delete</a></td>";
            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;
        ?>
    </div>
</div>

<script>
document.getElementById("courierMemoSearch").addEventListener("keyup", function () {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll(".table-box tbody tr"); 
    rows.forEach((row) => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

            <!-- Courier Memo detail -->

            <div class="rightinnerdiv">   
            <div id="couriermemodetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['courier_memoid'])){ $courier_memoid=$_REQUEST['courier_memoid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >COURIER MEMO DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getcouriermemodetail($courier_memoid);
            $recordset=$u->getcouriermemodetail($courier_memoid);
            foreach($recordset as $row){

               $courier_memoid= $row[0];
               $couriermemopic= $row[1];
               $date= $row[2];
               $courierename= $row[3];
               $couriermemonumber= $row[4];
               $courierphone= $row[5];
               $courieraddress= $row[6];
               $senderphone= $row[7];
               $receivername= $row[8];
               $receiverphone= $row[9];
               $receiveraddress= $row[10];
               $conditionamount= $row[11];
               $couriercharge= $row[12];
               $courierfeestatus= $row[13];
               
            }            
?>
            

            <img width='500px' height='470px' style='border:5px solid #333333; float:left;margin-left:30px' src="courier_memo_images/<?php echo $couriermemopic?> "/>
            </br>
            
            <p style="color:black"><u>Date:</u> &nbsp&nbsp<?php echo $date ?></p>
            <p style="color:black"><u>Courier Name:</u> &nbsp&nbsp<?php echo $courierename ?></p>
            <p style="color:black"><u>Courier Memo Number:</u> &nbsp&nbsp<?php echo $couriermemonumber ?></p>
            <p style="color:black"><u>Courier Phone:</u> &nbsp&nbsp<?php echo $courierphone ?></p>
            <p style="color:black"><u>Courier Address:</u> &nbsp&nbsp<?php echo $courieraddress ?></p>
            <p style="color:black"><u>Sender Phone:</u> &nbsp&nbsp<?php echo $senderphone ?></p>
            <p style="color:black"><u>Receiver Name:</u> &nbsp&nbsp<?php echo $receivername ?></p>
            <p style="color:black"><u>Receiver Phone:</u> &nbsp&nbsp<?php echo $receiverphone ?></p>
            <p style="color:black"><u>Receiver Address:</u> &nbsp&nbsp<?php echo $receiveraddress ?></p>
            <p style="color:black"><u>Condition Amount:</u> &nbsp&nbsp<?php echo $conditionamount ?></p>
            <p style="color:black"><u>Courier Charge:</u> &nbsp&nbsp<?php echo $couriercharge ?></p>
            <p style="color:black"><u>Courier Fee Status:</u> &nbsp&nbsp<?php echo $courierfeestatus ?></p>


            </div>
            </div>



            <!-- Edit Courier Memo -->

           <div class="rightinnerdiv">   
           <div id="editcouriermemo" class="innerright portion" 
                style="<?php if(!empty($_REQUEST['editcouriermemoid'])) { $editcouriermemoid = $_REQUEST['editcouriermemoid']; } else { echo 'display:none'; } ?>">
           <Button class="greenbtn">EDIT COURIER MEMO</Button>
           <br>

        <?php
            if (!empty($_REQUEST['editcouriermemoid'])) {
               $editcouriermemoid = $_REQUEST['editcouriermemoid'];

               $u = new data();
               $u->setconnection();
               $recordset = $u->geteditcouriermemo($editcouriermemoid); 
               $courier_memo = $recordset->fetch(PDO::FETCH_ASSOC);

            if (!empty($courier_memo)) {
        ?>

        <form action="editcouriermemo.php" method="post">
            <input type="hidden" name="id" value="<?php echo $courier_memo['id']; ?>">

            <label>Date:</label>
            <input type="date" name="date" value="<?php echo $courier_memo['date']; ?>"/>
            <br>

            <label>Courier Name:</label>
            <select name="couriername">
                <?php
                $couriers = ["Sundarban Courier Service", "SA Paribahan", "Janani Express Parcel Service", "Pathao Courier", "RedX", "FedEx", "Karatoa Courier Service", "Rainbow Courier Service", "Other"];
                foreach ($couriers as $c) {
                    $selected = ($c == $courier_memo['couriername']) ? "selected" : "";
                    echo "<option value='$c' $selected>$c</option>";
                }
                ?>
            </select>
            <br>

            <label>Courier Memo Number:</label>
            <input type="text" name="couriermemonumber" value="<?php echo $courier_memo['couriermemonumber']; ?>"/>
            <br>

            <label>Courier Phone:</label>
            <input type="number" name="courierphone" value="<?php echo $courier_memo['courierphone']; ?>"/>
            <br>

            <label>Courier Address:</label>
            <input type="text" name="courieraddress" value="<?php echo $courier_memo['courieraddress']; ?>"/>
            <br>

            <label>Sender Phone:</label>
            <select name="senderphone">
                <?php
                $senders = ["01712895018", "01721399446", "01690280710", "01963760510"];
                foreach ($senders as $s) {
                    $selected = ($s == $courier_memo['senderphone']) ? "selected" : "";
                    echo "<option value='$s' $selected>$s</option>";
                }
                ?>
            </select>
            <br>

            <label>Receiver Name:</label>
            <input type="text" name="receivername" value="<?php echo $courier_memo['receivername']; ?>"/>
            <br>

            <label>Receiver Phone:</label>
            <input type="number" name="receiverphone" value="<?php echo $courier_memo['receiverphone']; ?>"/>
            <br>

            <label>Receiver Address:</label>
            <input type="text" name="receiveraddress" value="<?php echo $courier_memo['receiveraddress']; ?>"/>
            <br>

            <label>Condition Amount:</label>
            <input type="text" name="conditionamount" value="<?php echo $courier_memo['conditionamount']; ?>"/>
            <br>

            <label>Courier Charge:</label>
            <input type="text" name="couriercharge" value="<?php echo $courier_memo['couriercharge']; ?>"/>
            <br>

            <label>Courier Fee Status:</label>
            <select name="courierfeestatus">
                <option value="Paid" <?php if($courier_memo['courierfeestatus']=="Paid") echo "selected"; ?>>Paid</option>
                <option value="Unpaid" <?php if($courier_memo['courierfeestatus']=="Unpaid") echo "selected"; ?>>Unpaid</option>
            </select>
            <br>

            <label>Courier Memo Photo:</label>
            <input type="file" name="couriermempic"/>
            <br>
            <?php if (!empty($courier_memo['couriermemopic'])) { ?>
                <img src="courier_memo_images/<?php echo $courier_memo['couriermemopic']; ?>" width="100">
            <?php } else { ?>
                <p>No image uploaded</p>
            <?php } ?>
            <br>

            <input type="submit" value="UPDATE"/>
        </form>

        <?php
        } else {
            echo "<p>Courier Memo not found!</p>";
        }
    }
        ?>
    </div>
    </div>


    <!-- ADD SHOP STAFF -->

<div class="rightinnerdiv"> 

<div id="addstaff" class="innerright portion" style="display:none">

<Button class="greenbtn">ADD STAFF PAGE</Button>

<form action="addstaff.php" method="post" enctype="multipart/form-data">

<label>Staff Name:</label>
<input type="text" name="staff_name" required>
<br>

<label>Phone:</label>
<input type="text" name="phone" required>
<br>

<label>Address:</label>
<input type="text" name="address" required>
<br>

<label>Designation:</label>

<select name="designation" required>

<option value="">Select Designation</option>

<option value="Manager">Manager</option>

<option value="Salesman">Salesman</option>

<option value="Accountant">Accountant</option>

<option value="Cashier">Cashier</option>

<option value="Supervisor">Supervisor</option>

<option value="Delivery Man">Delivery Man</option>

<option value="Marketing Officer">Marketing Officer</option>

<option value="Staff">Staff</option>

</select>
<br>


<label>Monthly Salary:</label>
<input type="text" name="salary" required>
<br>

<label>Join Date:</label>
<input type="date" name="join_date" required>
<br>

<label>National ID Image:</label>
<input type="file" name="nid_image">
<br><br>

<label>Staff Photo:</label>
<input type="file" name="photo">
<br><br>

<label>CV Upload (Photo/PDF/DOC):</label>
<input type="file" name="cv">
<br><br>

<label>CV Link:</label>
<input type="text" 
name="cv_link" 
placeholder="Paste Google Drive or CV link">
<br><br>

<label>Other Documents:</label>
<input type="file" 
name="other_document[]" 
multiple>
<br><br>

<div style="text-align:center;">

<input type="submit" value="SAVE" class="greenbtn">

</div>

</form>

</div>  

</div>


<!-- STAFF LIST -->
<div class="rightinnerdiv">   
    <div id="stafflist" class="innerright portion" style="display:none">

        <button class="greenbtn">STAFF LIST</button>

        <?php
        $u = new data();
        $u->setconnection();
        $recordset = $u->stafflist();

        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
        <thead style='background:#f2f2f2;'>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Post</th>
                <th>Salary</th>
                <th>NID</th>
                <th>Photo</th>
                <th>CV</th>
                <th>CV Link</th>
                <th>Other Docs</th>
                <th>Pay</th>
                <th> History</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>";

        foreach($recordset as $row){

            // decode documents safely
            $docs = json_decode($row['other_document'], true);

            $table .= "<tr>";

            $table .= "<td>{$row['staff_name']}</td>";
            $table .= "<td>{$row['phone']}</td>";
            $table .= "<td>{$row['address']}</td>";
            $table .= "<td>{$row['designation']}</td>";
            $table .= "<td>{$row['salary']}</td>";
            

            // NID
            $table .= "<td><a href='staff_files/{$row['nid_image']}' target='_blank'>View</a></td>";

            // Photo
            $table .= "<td><a href='staff_files/{$row['photo']}' target='_blank'>View</a></td>";

            // CV file
            $table .= "<td><a href='staff_files/{$row['cv']}' target='_blank'>View</a></td>";

            // CV link
            $table .= "<td><a href='{$row['cv_link']}' target='_blank'>Open</a></td>";

            // Other documents
            $table .= "<td>";

            if(!empty($docs)){
                foreach($docs as $doc){
                    $table .= "<a href='staff_files/$doc' target='_blank' style='display:block;'>File</a>";
                }
            } else {
                $table .= "No Docs";
            }

            $table .= "</td>";

            // PAY SALARY BUTTON
            $table .= "<td>
                <a href='admin_service_dashboard.php?paysalary_id={$row['id']}' style='color:blue;'>
                Pay</a>
            </td>";

            // SALARY HISTORY BUTTON
            $table .= "<td>
                <a href='admin_service_dashboard.php?salaryhistory_id={$row['id']}' style='color:blue;'>
                History</a>
            </td>";

            // EDIT
            $table .= "<td>
                <a href='admin_service_dashboard.php?editstaff_id={$row['id']}' style='color:blue;'>
                Edit</a>
            </td>";

            // DELETE
            $table .= "<td>
                <a href='deletestaff.php?id={$row['id']}' 
                   onclick=\"return confirm('Delete this staff?')\" 
                   style='color:red;'>
                Delete</a>
            </td>";

            $table .= "</tr>";
        }

        $table .= "</tbody></table>";

        echo $table;
        ?>


<?php
$u = new data();
$u->setconnection();

$total = $u->totalstaffsalary();
?>

<h4 style="color:blue; margin:10px 0; text-align:center;">
    Total Monthly Salary: <?php echo $total['total']; ?>Tk
</h4>

    </div>
</div>


<!-- STAFF SALARY PAY -->
<div class="rightinnerdiv">

<div id="paysalary" class="innerright portion"
style="<?php echo isset($_GET['paysalary_id']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn">PAY SALARY PAGE</button>

<?php

$u = new data();
$u->setconnection();

$staff_id = $_GET['paysalary_id'] ?? 0;

$staff = $u->getStaffById($staff_id);
?>

<form action="paysalary.php" method="post">

<input type="hidden" name="staff_id" value="<?= $staff_id ?>">

<!-- STAFF INFO -->

 <h4>Staff Info</h4>
<?php
$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
<thead style='background:#f2f2f2;'>
<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Designation</th>
    <th>Salary</th>
    <th>Joining date</th>
    
</tr>
</thead>
<tbody>";

if($staff){
    $table .= "<tr>";
    $table .= "<td>".$staff['staff_name']."</td>";
    $table .= "<td>".$staff['phone']."</td>";
    $table .= "<td>".$staff['address']."</td>";
    $table .= "<td>".$staff['designation']."</td>";
    $table .= "<td>".$staff['salary']."</td>";
    $table .= "<td>".$staff['join_date']."</td>";
    $table .= "</tr>";
}



$table .= "</tbody></table>";


echo $table;
?>

<br><br>

<?php
$lastRecord = $u->getLastSalaryBalance($staff_id);

$last_due = 0;

if($lastRecord){

    if($lastRecord['status'] == 'Due'){
        $last_due = $lastRecord['balance'];
    }
    elseif($lastRecord['status'] == 'Extra Paid'){
        $last_due = -$lastRecord['balance'];
    }
    else{
        $last_due = 0;
    }
}
?>


<h4>Salary Payment Statement</h4>

<table border="1" width="100%" id="salaryTable" style="border-collapse:collapse;text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
    <th>Date</th>
    <th>Month</th>
    <th>Base Salary</th>
    <th>Bonus</th>
    <th>Last Due</th>
    <th>Pay Amount</th>
    <th>Due</th>
    <th>Payment Method</th>
</tr>
</thead>


<tbody>
<tr>
    <td>
        <input type="date" name="date" required style="width:140px;">
    </td>

    <td>
        <input type="month" name="month" style="width:140px;">
    </td>

    <td>
    <input type="text" 
           id="salary"
           name="salary"
           value="<?php echo $staff['salary']; ?>" 
           style="width:100px;">
    </td>

    <td>
        <input type="number"
               id="bonus"
               name="bonus"
               value="0"
               oninput="calcSalary()"
               style="width:100px;">
    </td>

    <td>
        <input type="number"
               id="last_due"
               name="last_due"
               value="<?php echo $last_due; ?>"
               readonly
               style="width:100px;">
    </td>

    <td>
        <input type="number" id="pay_amount" name="pay_amount"
        oninput="calcSalary()" required style="width:100px;">
    </td>

    <td>
        <input type="text" id="salary_balance" name="balance" 
        readonly style="width:130px;">
    </td>

    <td>
        <input type="text" name="note" placeholder=""
        style="width:180px;">
    </td>
</tr>

</tbody>

</table>

<br>

<div style="text-align:center;">
    <input type="submit" value="PAY SALARY" class="greenbtn">
</div>

</form>

</div>
</div>



<script>
function calcSalary(){

    let salary = parseFloat(document.getElementById("salary").value) || 0;
    let bonus = parseFloat(document.getElementById("bonus").value) || 0;
    let lastDue = parseFloat(document.getElementById("last_due").value) || 0;
    let pay = parseFloat(document.getElementById("pay_amount").value) || 0;

    // Total payable amount
    let totalSalary = salary + bonus + lastDue;

    let due = totalSalary - pay;

    let output = document.getElementById("salary_balance");

    if(pay === 0){
        output.value = "";
        return;
    }

    if(due > 0){
        output.value = "Due: " + due;
    }
    else if(due < 0){
        output.value = "Extra Paid: " + Math.abs(due);
    }
    else{
        output.value = "Full Paid";
    }
}
</script>

<!-- SALARY RECORDS -->
<div class="rightinnerdiv">   
<div id="salaryrecords" class="innerright portion"
style="<?php echo !empty($_REQUEST['salaryhistory_id']) ? '' : 'display:none'; ?>">

<Button class="greenbtn">SALARY RECORDS</Button><br>

<?php
$u = new data();
$u->setconnection();

$staff_id = $_GET['salaryhistory_id'] ?? 0;


$staff = $u->getStaffById($staff_id);

$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
<thead style='background:#f2f2f2;'>
<tr>
    <th>Staff Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Designation</th>
    <th>Joining Date</th>
</tr>
</thead>
<tbody>";

if($staff){
    $table .= "<tr>";
    $table .= "<td>".$staff['staff_name']."</td>";
    $table .= "<td>".$staff['phone']."</td>";
    $table .= "<td>".$staff['address']."</td>";
    $table .= "<td>".$staff['designation']."</td>";
    $table .= "<td>".$staff['join_date']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;

echo "<br><br>";

// ✅ SALARY HISTORY
$stmt = $u->getSalaryRecords($staff_id);

echo "<h4>Salary Records</h4>";

echo "<table border='1' width='100%' style='border-collapse:collapse;text-align:center;'>
<thead style='background:#e6ffe6;'>
<tr>
    <th>Date</th>
    <th>Month</th>
    <th>Salary</th>
    <th>Bonus</th>
    <th>Last Due</th>
    <th>Total</th>
    <th>Paid</th>
    <th>Balance</th>
    <th>Status</th>
    <th>Note</th>
</tr>
</thead>
<tbody>";

$final_due = 0;
$final_status = "";


// SAFE CHECK
if($stmt && $stmt instanceof PDOStatement){

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $total = $row['salary'] + $row['bonus'] + $row['last_due'];

        echo "<tr>
            <td>".$row['date']."</td>
            <td>".$row['month']."</td>
            <td>".$row['salary']."</td>
            <td>".$row['bonus']."</td>
            <td>".$row['last_due']."</td>
            <td>".$total."</td>
            <td>".$row['pay_amount']."</td>
            <td>".$row['balance']."</td>
            <td>".$row['status']."</td>
            <td>".($row['note'] ?? '-')."</td>
        </tr>";

      
            $final_due = $row['balance'];
            $final_status = $row['status'];
        
        
    }

}else{

    echo "<tr><td colspan='10'>No Data Found</td></tr>";
}

echo "</tbody></table>";


echo "<div style='text-align:center;margin-top:10px;'>";

$status = trim($final_status);

if($status == 'Due'){

    echo "<p><strong style='color:red;'>Due: ".$final_due." Tk</strong></p>";

}elseif($status == 'Extra Pay' || $status == 'Extra Paid'){

    echo "<p><strong style='color:green;'>Extra Pay: ".$final_due." Tk</strong></p>";

}elseif($status == 'Full Paid'){

    echo "<p><strong style='color:blue;'>Full Paid</strong></p>";

}else{

    echo "<p><strong style='color:gray;'>No Salary Record</strong></p>";
}
echo "</div>";
?>

</div>
</div>


<!-- EDIT STAFF PAGE -->

<div class="rightinnerdiv">

<div id="editstaff" class="innerright portion"
style="<?php echo !empty($_REQUEST['editstaff_id']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn">EDIT STAFF PAGE</button>
<br>

<?php
if (!empty($_REQUEST['editstaff_id'])) {

    $editstaff_id = $_REQUEST['editstaff_id'];

    $u = new data();
    $u->setconnection();

   $staff = $u->getStaffById($editstaff_id);
   $salaryStmt = $u->getSalaryRecords($editstaff_id);

}
?>

<form action="editstaffpage.php" method="post" enctype="multipart/form-data" style="padding:10px;">

<input type="hidden" name="staff_id" value="<?= $editstaff_id ?>">

<h4>Staff Information</h4>

<label>Staff Name:</label>
<input type="text" name="staff_name" value="<?= $staff['staff_name'] ?>" required>
<br>

<label>Phone:</label>
<input type="text" name="phone" value="<?= $staff['phone'] ?>" required>
<br>

<label>Address:</label>
<input type="text" name="address" value="<?= $staff['address'] ?>" required>
<br>

<label>Designation:</label>

<select name="designation" required>
    <option value="">Select Designation</option>

    <option value="Manager" <?= ($staff['designation'] == 'Manager') ? 'selected' : '' ?>>Manager</option>

    <option value="Salesman" <?= ($staff['designation'] == 'Salesman') ? 'selected' : '' ?>>Salesman</option>

    <option value="Accountant" <?= ($staff['designation'] == 'Accountant') ? 'selected' : '' ?>>Accountant</option>

    <option value="Cashier" <?= ($staff['designation'] == 'Cashier') ? 'selected' : '' ?>>Cashier</option>

    <option value="Supervisor" <?= ($staff['designation'] == 'Supervisor') ? 'selected' : '' ?>>Supervisor</option>

    <option value="Delivery Man" <?= ($staff['designation'] == 'Delivery Man') ? 'selected' : '' ?>>Delivery Man</option>

    <option value="Marketing Officer" <?= ($staff['designation'] == 'Marketing Officer') ? 'selected' : '' ?>>Marketing Officer</option>

    <option value="Staff" <?= ($staff['designation'] == 'Staff') ? 'selected' : '' ?>>Staff</option>
</select>

<br>

<label>Monthly Salary:</label>
<input type="text" name="salary" value="<?= $staff['salary'] ?>" required>
<br>

<label>Join Date:</label>
<input type="date" name="join_date" value="<?= $staff['join_date'] ?>" required>
<br>

<label>National ID Image:</label>
<input type="file" name="nid_image">

<?php if (!empty($staff['nid_image'])) { ?>
    <img src="staff_files/<?php echo $staff['nid_image']; ?>" width="100">
<?php } else { ?>
    <p>No NID uploaded</p>
<?php } ?>

<br><br>

<label>Staff Photo:</label>
<input type="file" name="photo">

<?php if (!empty($staff['photo'])) { ?>
    <img src="staff_files/<?php echo $staff['photo']; ?>" width="80">
<?php } else { ?>
    <p>No photo uploaded</p>
<?php } ?>

<br><br>

<label>CV Upload:</label>
<input type="file" name="cv">

<?php if (!empty($staff['cv'])) { ?>
    <a href="staff_files/<?php echo $staff['cv']; ?>" target="_blank" style="color: red;">
        View CV
    </a>
<?php } else { ?>
    <p>No CV uploaded</p>
<?php } ?>

<br><br>

<label>CV Link:</label>
<input type="text" name="cv_link" value="<?= htmlspecialchars($staff['cv_link'] ?? '') ?>">

<?php if (!empty($staff['cv_link'])) { ?>
    <a href="<?= htmlspecialchars($staff['cv_link']) ?>" target="_blank" style="color: red;">
        CV Link
    </a>
<?php } ?>

<br><br>
<label>Other Documents:</label>
<input type="file" name="other_document[]" multiple>

<?php
$docs = json_decode($staff['other_document'] ?? '', true);

if (!empty($docs) && is_array($docs)) {

    foreach ($docs as $doc) {
        if (!empty($doc)) {
?>
            <a href="staff_files/<?= htmlspecialchars($doc) ?>" target="_blank" style="color: red;">
                View Document
            </a><br>
<?php
        }
    }

} elseif (!empty($staff['other_document'])) { ?>
    
    <a href="staff_files/<?= htmlspecialchars($staff['other_document']) ?>" target="_blank">
        View Document
    </a>

<?php } else { ?>

    <p>No documents uploaded</p>

<?php } ?>


<br><br>

<hr>

<h4>Salary Record Edit</h4>

<table border="1" width="100%" style="border-collapse:collapse;text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
    <th>Date</th>
    <th>Month</th>
    <th>Salary</th>
    <th>Bonus</th>
    <th>Last Due</th>
    <th>Paid</th>
    <th>Balance</th>
    <th>Status</th>
    <th>Note</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
if($salaryStmt && $salaryStmt instanceof PDOStatement){

while($row = $salaryStmt->fetch(PDO::FETCH_ASSOC)){

echo "

<form action='editstaffpage.php' method='post'>

<tr>

<input type='hidden' name='salary_id' value='".$row['id']."'>
<input type='hidden' name='staff_id' value='".$editstaff_id."'>

<td>
<input type='date' name='date' value='".$row['date']."' style='width:110px;'>
</td>

<td>
<input type='month' name='month' value='".$row['month']."' style='width:120px;'>
</td>

<td>
<input type='text' name='row_salary' value='".$row['salary']."' style='width:90px;'>
</td>

<td>
<input type='number' name='bonus' value='".$row['bonus']."' style='width:80px;'>
</td>

<td>
<input type='number' name='last_due' value='".$row['last_due']."' style='width:80px;'>
</td>

<td>
<input type='number' name='paid' value='".$row['pay_amount']."' style='width:80px;'>
</td>

<td style='font-weight:bold;'>
".$row['balance']."
</td>

<td>
<input type='text' name='status' value='".$row['status']."' style='width:100px;'>
</td>

<td>
<input type='text' name='note' value='".$row['note']."' style='width:120px;'>
</td>

<td>
<button type='submit' name='update_salary'>Update</button>
</td>

</tr>

</form>";
}
}
?>

</tbody>
</table>

<br>

<div style="text-align:center;">
<input type="submit" value="UPDATE STAFF" class="greenbtn">
</div>

</form>

</div>
</div>


    <!--ADD OWN DUE -->

<div class="rightinnerdiv"> 
<div id="addowndue" class="innerright portion" style="display:none">
<Button class="greenbtn">ADD OWN DUE</Button>
<form action="addowndue.php" method="post">

<label>Client / Company Name:</label>
<input type="text" name="company_name" required>
<br>
<label style="margin-left:50px;">Phone:</label>
<input type="text" name="phone">
<br>
<label>Address:</label>
<input type="text" name="address" required>
<br>

<div style="text-align:center;">
    <input type="submit" value="SAVE" class="greenbtn">
</div>

</form>
</div>  
</div>


<!--OWN DUE LIST -->
<div class="rightinnerdiv">   
    <div id="ownduelist" class="innerright portion" style="display:none">
        <button class="greenbtn">OWN DUE LIST</button>

        <!-- Search -->
        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="owndueSearch" placeholder="Search Own Due ..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%);">🔎</span>
        </div>

        <?php
        $u = new data;
        $u->setconnection();
        $recordset = $u->owndue();

        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Client / Company Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Current Due</th>
                    <th>View</th>
                    <th>Add Due</th>
                    <th>Pay</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>";
            $table .= "<td>$row[1]</td>";
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[3]</td>";
            $table .= "<td>$row[4]</td>";
           
        

           $table .= "<td><a href='admin_service_dashboard.php?viewowndue_id=" . $row['id'] . "' style='color:blue;'>Details</a></td>";
           $table .= "<td><a href='admin_service_dashboard.php?addowndue_id=$row[id]' style='color:blue;'>Add Due</a></td>";
           $table .= "<td><a href='admin_service_dashboard.php?payowndue_id=$row[id]' style='color:blue;'>Pay</a></td>";
           $table .= "<td><a href='admin_service_dashboard.php?editowndue_id=".$row['id']."' style='color:blue;'>Edit</a></td>";
           $table .= "<td><a href='deleteowndue.php?id={$row['id']}' style='color:blue; onclick=\"return confirm('Delete this customer?')\">Delete</a></td>";
            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;

        ?>

<?php
$u = new data();
$u->setconnection();

$total = $u->totalOwnDue();
?>

<h4 style="color:blue; margin:10px 0; text-align:center;">
    Total Own Current Due: <?php echo $total['total']; ?> Tk
</h4>


    </div>
</div>




<!-- ADD OWN DUE -->
 <?php
$owndue_id = isset($_GET['addowndue_id']) ? $_GET['addowndue_id'] : 0;
?>

<div class="rightinnerdiv">
<div id="addowndue" class="innerright portion"
style="<?php echo isset($_GET['addowndue_id']) ? 'display:block' : 'display:none'; ?>">

<Button class="greenbtn">ADD OWN DUE PAGE</Button>
<form action="addownduepage.php" method="post">
<input type="hidden" name="owndue_id" value="<?= $owndue_id ?>">


<?php
$u = new data();
$u->setconnection();

$owndue_id = $_GET['addowndue_id'] ?? 0;

$result = $u->ownduedetail($owndue_id);
$owndue = $result->fetch(PDO::FETCH_ASSOC);

$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Client / Company Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>";

if($owndue){
    $table .= "<tr>";
    $table .= "<td>".$owndue['company_name']."</td>";
    $table .= "<td>".$owndue['phone']."</td>";
    $table .= "<td>".$owndue['address']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;
?>
<br><br>

<?php
$lastDue = $u->getOwnCurrentDue($owndue_id);
?>

<h4>Own Due Statement</h4>

<table border="1" width="100%" id="owndueTable"
style="border-collapse:collapse;text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
    
    <th>Date</th>
    <th>Bill No</th>
    <th>Bill Amount</th>
    <th>Prev Due</th>
    <th>Total</th>
    <th>Paid</th>
    <th>Due</th>
    
</tr>
</thead>

<tbody>

<tr>
   
    <td><input type="date" name="date[]" required style="width:110px;"></td>
    <td><input type="text" name="bill_no[]" required style="width:150px;"></td>
    <td><input type="number" name="bill_amount[]" class="bill_amount" oninput="calcOwnDue()" required style="width:100px;"></td>
    <td><input type="number" name="prev_due[]" class="prev_due"value="<?= $lastDue ?>" required style="width:100px;" readonly></td>
    <td><input type="number" name="total[]" class="total" oninput="calcOwnDue()" required style="width:100px;"></td>
    <td><input type="number" name="paid[]" class="paid" oninput="calcOwnDue()" required style="width:100px;"></td>
    <td><input type="number" name="due[]" class="due" required style="width:100px;" readonly></td>
    
</tr>

</tbody>

</table>

<br>

<div style="text-align:center;">
    <input type="submit" value="SAVE" class="greenbtn">
</div>

</form>

</div>
</div>


<!--OWN PAY DUE -->
<div class="rightinnerdiv">

<div id="payowndue" class="innerright portion"
style="<?php echo isset($_GET['payowndue_id']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn"> PAY OWN DUE PAGE</button>

<?php

$u = new data();
$u->setconnection();

$owndue_id = $_GET['payowndue_id'] ?? 0;

$result = $u->ownduedetail($owndue_id);
$owndue = $result->fetch(PDO::FETCH_ASSOC);
?>

<form action="payownduepage.php" method="post">

<input type="hidden" name="owndue_id" value="<?= $owndue_id ?>">


<!-- CUSTOMER INFO -->
<?php
$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
<thead style='background:#f2f2f2;'>
<tr>
    <th>Client / Company Name</th>
    <th>Phone</th>
    <th>Address</th>
</tr>
</thead>
<tbody>";

if($owndue){
    $table .= "<tr>";
    $table .= "<td>".$owndue['company_name']."</td>";
    $table .= "<td>".$owndue['phone']."</td>";
    $table .= "<td>".$owndue['address']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;
?>

<br><br>

<?php
$lastDue = $u->getOwnCurrentDue($owndue_id);
?>

<h4>Pay Own Due Statement</h4>

<table border="1" width="100%" id="ownpayTable" style="border-collapse:collapse;text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
    <th>Date</th>
    <th>Current Due</th>
    <th>Pay Amount</th>
    <th>New Due</th>
    <th>Payment Method</th>
</tr>
</thead>

<tbody>

<tr>
    <td><input type="date" name="pay_date" required style="width:120px;"></td>
    <td><input type="number" id="own_current_due" name="current_due" value="<?= $lastDue ?>" required style="width:100px;" readonly></td>
    <td><input type="number" id="own_pay_amount" name="pay_amount" oninput="calcOwnPay()" required style="width:100px;"></td>
    <td><input type="number" id="own_new_due" name="new_due" required style="width:100px;" readonly></td>
    <td><input type="text" name="payment_method" required style="width:200px;"></td>
</tr>

</tbody>

</table>

<br>

<div style="text-align:center;">
    <input type="submit" value="PAY NOW" class="greenbtn">
</div>

</form>

</div>
</div>



<script>
function calcOwnDue() {
    let rows = document.querySelectorAll("#owndueTable tbody tr");

    rows.forEach(row => {

        let bill = parseFloat(row.querySelector(".bill_amount").value) || 0;
        let prevDue = parseFloat(row.querySelector(".prev_due")?.value) || 0;
        let paid = parseFloat(row.querySelector(".paid").value) || 0;

        let total = bill + prevDue;
        let due = total - paid;

        row.querySelector(".total").value = total;
        row.querySelector(".due").value = due;
    });
}
</script>

<script>
function calcOwnPay() {

    var current = parseFloat(document.getElementById("own_current_due").value) || 0;
    var pay     = parseFloat(document.getElementById("own_pay_amount").value) || 0;

    var newDue = current - pay;

    if(newDue < 0){
        newDue = 0;
    }

    document.getElementById("own_new_due").value = newDue;
}
</script>



<script>
document.getElementById("owndueSearch").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#ownduelist table tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

<!--Own Due Details -->
<div class="rightinnerdiv">   
<div id="ownduedetail" class="innerright portion"
style="<?php echo !empty($_REQUEST['viewowndue_id']) ? '' : 'display:none'; ?>">

<Button class="greenbtn">OWN DUE DETAILS</Button><br>

<?php
$u = new data();
$u->setconnection();

$owndue_id = $_GET['viewowndue_id'] ?? 0;

// ✅ CUSTOMER INFO
$result = $u->ownduedetail($owndue_id);
$owndue = $result->fetch(PDO::FETCH_ASSOC);

$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
<thead style='background:#f2f2f2;'>
<tr>
    <th>Company Name</th>
    <th>Phone</th>
    <th>Address</th>
</tr>
</thead>
<tbody>";

if($owndue){
    $table .= "<tr>";
    $table .= "<td>".$owndue['company_name']."</td>";
    $table .= "<td>".$owndue['phone']."</td>";
    $table .= "<td>".$owndue['address']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;

echo "<br><br>";

// ✅ DUE HISTORY (LEDGER)
$stmt = $u->getOwnDueLedger($owndue_id);

echo "<h4>Due History</h4>";

echo "<table border='1' width='100%' style='border-collapse:collapse;text-align:center;'>
<thead style='background:#e6ffe6;'>
<tr>
    <th>Date</th>
    <th>Type</th>
    <th>Bill No</th>
    <th>Amount</th>
    <th>Cur.Due</th>
    <th>Paid</th>
    <th>Net Due</th>
    <th>Payment Detail</th>
</tr>
</thead>
<tbody>";

$final_due = 0;

// ✅ SAFE CHECK
if($stmt && $stmt instanceof PDOStatement){

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        echo "<tr>
            <td>".$row['date']."</td>
            <td>".$row['type']."</td>
            <td>".($row['bill_no'] ?? '-')."</td>
            <td>".$row['bill_amount']."</td>
            <td>".$row['current_due']."</td>
            <td>".$row['paid']."</td>
            <td>".$row['net_due']."</td>
            <td>".($row['payment_detail'] ?? '-')."</td>
        </tr>";

        $final_due = $row['net_due'];
    }

}else{
    echo "<tr><td colspan='8'>No Data Found</td></tr>";
}

echo "</tbody></table>";

// ✅ FINAL DUE
echo "<div style='text-align:center;margin-top:10px;'>
<p><strong>Final Due: ".$final_due." Tk</strong></p>
</div>";
?>

</div>
</div>


<!-- EDIT DUE PAGE -->

<div class="rightinnerdiv">
<div id="editowndue" class="innerright portion"
     style="<?php echo !empty($_REQUEST['editowndue_id']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn">EDIT OWN DUE PAGE</button>
<br>

<?php
if (!empty($_REQUEST['editowndue_id'])) {

    $editowndue_id = $_REQUEST['editowndue_id'];

    $u = new data();
    $u->setconnection();

    $owndue = $u->ownduedetail($editowndue_id)->fetch(PDO::FETCH_ASSOC);
    $editowndue = $u->getduebyown($editowndue_id);
}
?>

<form action="editownduepage.php" method="post" style="padding:10px;">

<input type="hidden" name="owndue_id" value="<?= $editowndue_id ?>">

<!-- CUSTOMER INFO -->
<h4>Customer Info</h4>

<label>Client / Company Name:</label>
<input type="text" name="company_name" value="<?= $owndue['company_name'] ?>" required>
<br>

<label>Phone:</label>
<input type="text" name="phone" value="<?= $owndue['phone'] ?>">
<br>

<label>Address:</label>
<input type="text" name="address" value="<?= $owndue['address'] ?>" required>

<br><br>

<hr>

<hr>

<h4> Due History Edit </h4>

<?php
// load ledger rows
$ledgerStmt = $u->getOwnDueLedger($editowndue_id);
?>

<table border="1" width="100%" style="border-collapse:collapse;text-align:center;">
<thead style="background:#e6ffe6;">
<tr>
    <th>Date</th>
    <th>Bill No</th>
    <th>Bill Amount</th>
    <th>Paid</th>
    <th>Payment Detail</th>
    <th>Net Due</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
if($ledgerStmt && $ledgerStmt instanceof PDOStatement){

    while($row = $ledgerStmt->fetch(PDO::FETCH_ASSOC)){

    echo "<form action='editownduepage.php' method='post'>   

    <tr>
        
        <input type='hidden' name='id' value='".$row['id']."'>
        <input type='hidden' name='owndue_id' value='".$editowndue_id."'>

        <td><input type='date' name='date' value='".$row['date']."' style='width:110px;'></td>
        <td><input type='text' name='bill_no' value='".$row['bill_no']."' style='width:160px;'></td>
        <td><input type='number' name='bill_amount' value='".$row['bill_amount']."' style='width:80px;'></td>
        <td><input type='number' name='paid' value='".$row['paid']."' style='width:80px;'></td>
        <td><input type='text' name='payment_detail' value='".($row['payment_detail'] ?? '')."' style='width:200px;'></td>
        <td style='font-weight:bold;'>".$row['net_due']."</td>

        <td>
            <button type='submit' name='update_ledger'>Update</button>
        </td>

    </tr>

    </form>";   
}
}
?>

</tbody>
</table>

<div style="text-align:center;">
    <input type="submit" value="UPDATE DUE" class="greenbtn">
</div>
</div>
</div>




<!--ADD DUE CUSTOMER -->

<div class="rightinnerdiv"> 
<div id="adddue" class="innerright portion" style="display:none">
<Button class="greenbtn">ADD DUE CUSTOMER</Button>
<form action="addduecustomer.php" method="post">

<label>Customer Name:</label>
<input type="text" name="customer_name" required>
<br>
<label>Shop Name:</label>
<input type="text" name="shop_name" required>
<br>
<label style="margin-left:50px;">Phone:</label>
<input type="text" name="phone">
<br>
<label>Address:</label>
<input type="text" name="address" required>
<br>

<div style="text-align:center;">
    <input type="submit" value="SAVE" class="greenbtn">
</div>

</form>
</div>  
</div>


<!-- DUE CUSTOMER LIST -->
<div class="rightinnerdiv">   
    <div id="duecustomerlist" class="innerright portion" style="display:none">
        <button class="greenbtn">DUE CUSTOMER LIST</button>

        <!-- Search -->
        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="dueCustomerSearch" placeholder="Search Due Customer..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%);">🔎</span>
        </div>

        <?php
        $u = new data;
        $u->setconnection();
        $recordset = $u->duecustomer();

        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Name</th>
                    <th>Shop Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Current Due</th>
                    <th>View</th>
                    <th>Add Due</th>
                    <th>Pay</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>";
            $table .= "<td>$row[1]</td>";
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[3]</td>";
            $table .= "<td>$row[4]</td>";
            $table .= "<td>$row[5]</td>";
        

           $table .= "<td><a href='admin_service_dashboard.php?view_id=" . $row['id'] . "' style='color:blue;'>Details</a></td>";
           $table .= "<td><a href='admin_service_dashboard.php?adddue_id=$row[id]' style='color:blue;'>Add Due</a></td>";
           $table .= "<td><a href='admin_service_dashboard.php?pay_id=$row[id]' style='color:blue;'>Pay</a></td>";
           $table .= "<td><a href='admin_service_dashboard.php?editdue_id=".$row['id']."' style='color:blue;'>Edit</a></td>";
           $table .= "<td><a href='deleteduecustomer.php?id={$row['id']}' style='color:blue; onclick=\"return confirm('Delete this customer?')\">Delete</a></td>";
            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;

        ?>

<?php
$u = new data();
$u->setconnection();

$total = $u->totalDue();
?>

<h4 style="color:blue; margin:10px 0; text-align:center;">
    Total Current Due: <?php echo $total['total']; ?> Tk
</h4>


    </div>
</div>


<!-- ADD DUE -->
 <?php
$duecustomer_id = isset($_GET['adddue_id']) ? $_GET['adddue_id'] : 0;
?>

<div class="rightinnerdiv">
<div id="adddue" class="innerright portion"
style="<?php echo isset($_GET['adddue_id']) ? 'display:block' : 'display:none'; ?>">

<Button class="greenbtn">ADD DUE PAGE</Button>
<form action="addduepage.php" method="post">
<input type="hidden" name="duecustomer_id" value="<?= $duecustomer_id ?>">


<?php
$u = new data();
$u->setconnection();

$duecustomer_id = $_GET['adddue_id'] ?? 0;

$result = $u->duecustomerdetail($duecustomer_id);
$duecustomer = $result->fetch(PDO::FETCH_ASSOC);

$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Customer Name</th>
                    <th>Shop Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>";

if($duecustomer){
    $table .= "<tr>";
    $table .= "<td>".$duecustomer['customer_name']."</td>";
    $table .= "<td>".$duecustomer['shop_name']."</td>";
    $table .= "<td>".$duecustomer['phone']."</td>";
    $table .= "<td>".$duecustomer['address']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;
?>
<br><br>

<?php
$lastDue = $u->getCurrentDue($duecustomer_id);
?>

<h4>Due Statement</h4>

<table border="1" width="100%" id="dueTable"
style="border-collapse:collapse;text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
    
    <th>Date</th>
    <th>Bill No</th>
    <th>Bill Amount</th>
    <th>Prev Due</th>
    <th>Total</th>
    <th>Paid</th>
    <th>Due</th>
    
</tr>
</thead>

<tbody>

<tr>
   
    <td><input type="date" name="date[]" required style="width:110px;"></td>
    <td><input type="text" name="bill_no[]" required style="width:150px;"></td>
    <td><input type="number" name="bill_amount[]" class="bill_amount" oninput="calcDue()" required style="width:100px;"></td>
    <td><input type="number" name="prev_due[]" class="prev_due"value="<?= $lastDue ?>" required style="width:100px;" readonly></td>
    <td><input type="number" name="total[]" class="total" oninput="calcDue()" required style="width:100px;"></td>
    <td><input type="number" name="paid[]" class="paid" oninput="calcDue()" required style="width:100px;"></td>
    <td><input type="number" name="due[]" class="due" required style="width:100px;" readonly></td>
    
</tr>

</tbody>

</table>

<br>

<div style="text-align:center;">
    <input type="submit" value="SAVE" class="greenbtn">
</div>

</form>

</div>
</div>



<!-- Due Details -->
<div class="rightinnerdiv">   
<div id="duedetail" class="innerright portion"
style="<?php echo !empty($_REQUEST['view_id']) ? '' : 'display:none'; ?>">

<Button class="greenbtn">DUE DETAILS</Button><br>

<?php
$u = new data();
$u->setconnection();

$duecustomer_id = $_GET['view_id'] ?? 0;

// ✅ CUSTOMER INFO
$result = $u->duecustomerdetail($duecustomer_id);
$duecustomer = $result->fetch(PDO::FETCH_ASSOC);

$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
<thead style='background:#f2f2f2;'>
<tr>
    <th>Customer Name</th>
    <th>Shop Name</th>
    <th>Phone</th>
    <th>Address</th>
</tr>
</thead>
<tbody>";

if($duecustomer){
    $table .= "<tr>";
    $table .= "<td>".$duecustomer['customer_name']."</td>";
    $table .= "<td>".$duecustomer['shop_name']."</td>";
    $table .= "<td>".$duecustomer['phone']."</td>";
    $table .= "<td>".$duecustomer['address']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;

echo "<br><br>";

// ✅ DUE HISTORY (LEDGER)
$stmt = $u->getDueLedger($duecustomer_id);

echo "<h4>Due History</h4>";

echo "<table border='1' width='100%' style='border-collapse:collapse;text-align:center;'>
<thead style='background:#e6ffe6;'>
<tr>
    <th>Date</th>
    <th>Type</th>
    <th>Bill No</th>
    <th>Amount</th>
    <th>Cur.Due</th>
    <th>Paid</th>
    <th>Net Due</th>
    <th>Payment Detail</th>
</tr>
</thead>
<tbody>";

$final_due = 0;

// ✅ SAFE CHECK
if($stmt && $stmt instanceof PDOStatement){

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        echo "<tr>
            <td>".$row['date']."</td>
            <td>".$row['type']."</td>
            <td>".($row['bill_no'] ?? '-')."</td>
            <td>".$row['bill_amount']."</td>
            <td>".$row['current_due']."</td>
            <td>".$row['paid']."</td>
            <td>".$row['net_due']."</td>
            <td>".($row['payment_detail'] ?? '-')."</td>
        </tr>";

        $final_due = $row['net_due'];
    }

}else{
    echo "<tr><td colspan='8'>No Data Found</td></tr>";
}

echo "</tbody></table>";

// ✅ FINAL DUE
echo "<div style='text-align:center;margin-top:10px;'>
<p><strong>Final Due: ".$final_due." Tk</strong></p>
</div>";
?>

</div>
</div>



<!-- PAY DUE -->
<div class="rightinnerdiv">

<div id="paydue" class="innerright portion"
style="<?php echo isset($_GET['pay_id']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn">PAY DUE PAGE</button>

<?php

$u = new data();
$u->setconnection();

$duecustomer_id = $_GET['pay_id'] ?? 0;

$result = $u->duecustomerdetail($duecustomer_id);
$duecustomer = $result->fetch(PDO::FETCH_ASSOC);
?>

<form action="payduepage.php" method="post">

<input type="hidden" name="duecustomer_id" value="<?= $duecustomer_id ?>">


<!-- CUSTOMER INFO -->
<?php
$table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
<thead style='background:#f2f2f2;'>
<tr>
    <th>Customer Name</th>
    <th>Shop Name</th>
    <th>Phone</th>
    <th>Address</th>
</tr>
</thead>
<tbody>";

if($duecustomer){
    $table .= "<tr>";
    $table .= "<td>".$duecustomer['customer_name']."</td>";
    $table .= "<td>".$duecustomer['shop_name']."</td>";
    $table .= "<td>".$duecustomer['phone']."</td>";
    $table .= "<td>".$duecustomer['address']."</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";

echo $table;
?>

<br><br>

<?php
$lastDue = $u->getCurrentDue($duecustomer_id);
?>

<h4>Pay Statement</h4>

<table border="1" width="100%" id="payTable" style="border-collapse:collapse;text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
    <th>Date</th>
    <th>Current Due</th>
    <th>Pay Amount</th>
    <th>New Due</th>
    <th>Payment Method</th>
</tr>
</thead>

<tbody>

<tr>
    <td><input type="date" name="pay_date" required style="width:120px;"></td>
    <td><input type="number" id="current_due" name="current_due" value="<?= $lastDue ?>" required style="width:100px;" readonly></td>
    <td><input type="number" id="pay_amount" name="pay_amount" oninput="calcPay()" required style="width:100px;"></td>
    <td><input type="number" id="new_due" name="new_due" required style="width:100px;" readonly></td>
    <td><input type="text" name="payment_method" required style="width:200px;"></td>
</tr>

</tbody>

</table>

<br>

<div style="text-align:center;">
    <input type="submit" value="PAY NOW" class="greenbtn">
</div>

</form>

</div>
</div>

<script>
function calcDue() {
    let rows = document.querySelectorAll("#dueTable tbody tr");

    rows.forEach(row => {

        let bill = parseFloat(row.querySelector(".bill_amount").value) || 0;
        let prevDue = parseFloat(row.querySelector(".prev_due")?.value) || 0;
        let paid = parseFloat(row.querySelector(".paid").value) || 0;

        let total = bill + prevDue;
        let due = total - paid;

        row.querySelector(".total").value = total;
        row.querySelector(".due").value = due;
    });
}
</script>

<script>
function calcPay() {

    var current = parseFloat(document.getElementById("current_due").value) || 0;
    var pay     = parseFloat(document.getElementById("pay_amount").value) || 0;

    var newDue = current - pay;

    if(newDue < 0){
        newDue = 0;
    }

    document.getElementById("new_due").value = newDue;
}
</script>

<script>
document.getElementById("dueCustomerSearch").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#duecustomerlist table tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>


<!-- EDIT DUE PAGE -->

<div class="rightinnerdiv">
<div id="editdue" class="innerright portion"
     style="<?php echo !empty($_REQUEST['editdue_id']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn">EDIT DUE PAGE</button>
<br>

<?php
if (!empty($_REQUEST['editdue_id'])) {

    $editdue_id = $_REQUEST['editdue_id'];

    $u = new data();
    $u->setconnection();

    $duecustomer = $u->duecustomerdetail($editdue_id)->fetch(PDO::FETCH_ASSOC);
    $editdue = $u->getduebycustomer($editdue_id);
}
?>

<form action="editduepage.php" method="post" style="padding:10px;">

<input type="hidden" name="duecustomer_id" value="<?= $editdue_id ?>">

<!-- CUSTOMER INFO -->
<h4>Customer Info</h4>

<label>Customer Name:</label>
<input type="text" name="customer_name" value="<?= $duecustomer['customer_name'] ?>" required>
<br>

<label>Shop Name:</label>
<input type="text" name="shop_name" value="<?= $duecustomer['shop_name'] ?>" required>
<br>

<label>Phone:</label>
<input type="text" name="phone" value="<?= $duecustomer['phone'] ?>">
<br>

<label>Address:</label>
<input type="text" name="address" value="<?= $duecustomer['address'] ?>" required>

<br><br>

<hr>

<hr>

<h4> Due History Edit </h4>

<?php
// load ledger rows
$ledgerStmt = $u->getDueLedger($editdue_id);
?>

<table border="1" width="100%" style="border-collapse:collapse;text-align:center;">
<thead style="background:#e6ffe6;">
<tr>
    <th>Date</th>
    <th>Bill No</th>
    <th>Bill Amount</th>
    <th>Paid</th>
    <th>Payment Detail</th>
    <th>Net Due</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
if($ledgerStmt && $ledgerStmt instanceof PDOStatement){

    while($row = $ledgerStmt->fetch(PDO::FETCH_ASSOC)){

    echo "<form action='editduepage.php' method='post'>   <!-- ✅ ADD THIS LINE -->

    <tr>
        
        <input type='hidden' name='id' value='".$row['id']."'>
        <input type='hidden' name='duecustomer_id' value='".$editdue_id."'>

        <td><input type='date' name='date' value='".$row['date']."' style='width:110px;'></td>
        <td><input type='text' name='bill_no' value='".$row['bill_no']."' style='width:160px;'></td>
        <td><input type='number' name='bill_amount' value='".$row['bill_amount']."' style='width:80px;'></td>
        <td><input type='number' name='paid' value='".$row['paid']."' style='width:80px;'></td>
        <td><input type='text' name='payment_detail' value='".($row['payment_detail'] ?? '')."' style='width:200px;'></td>
        <td style='font-weight:bold;'>".$row['net_due']."</td>

        <td>
            <button type='submit' name='update_ledger'>Update</button>
        </td>

    </tr>

    </form>";   
}
}
?>

</tbody>
</table>

<div style="text-align:center;">
    <input type="submit" value="UPDATE DUE" class="greenbtn">
</div>
</div>
</div>

   <!-- Invoice Memo List -->
<div class="rightinnerdiv">   
    <div id="invoicememolist" class="innerright portion" style="display:none">
        <button class="greenbtn">INVOICE MEMO LIST</button>

        <!-- Search -->
        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="invoiceMemoSearch" placeholder="Search Invoice Memo..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
        </div>

        <?php
        $u = new data();
        $u->setconnection();
        $recordset = $u->getinvoicememo(); 

        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Date</th>
                    <th>Memo Number</th>
                    <th>Customer Name</th>
                    <th>Phone</th>
                    <th>Total Quantity</th>
                    <th>Grand Total</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>"; 
            $table .= "<td>$row[2]</td>"; 
            $table .= "<td>$row[1]</td>"; 
            $table .= "<td>$row[3]</td>"; 
            $table .= "<td>$row[4]</td>"; 
            $table .= "<td>$row[6]</td>"; 
            $table .= "<td>$row[7]</td>"; 
            $table .= "<td>$row[8]</td>";
            $table .= "<td>$row[9]</td>"; 
            $table .= "<td><a href='admin_service_dashboard.php?memo_number=$row[1]'><button type='button' class='btn btn-primary'>Detail</button></a></td>";
            $table .= "<td><a href='admin_service_dashboard.php?editmemo_number=$row[1]'>Edit</a></td>";
            $table .= "<td><a href='deleteinvoicememo.php?memo_number=$row[1]' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;
        ?>
    </div>
</div>


<script>
document.getElementById("invoiceMemoSearch").addEventListener("keyup", function () {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll(".table-box tbody tr"); 
    rows.forEach((row) => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>



<!-- Invoice Memo Detail -->
<div class="rightinnerdiv">   
<div id="invoicememodetail" class="innerright portion"
style="<?php echo !empty($_REQUEST['memo_number']) ? '' : 'display:none'; ?>">

<Button class="greenbtn">INVOICE MEMO DETAIL</Button><br>

<?php
if(!empty($_REQUEST['memo_number'])){
    $memo_number = $_REQUEST['memo_number'];

    $u = new data;
    $u->setconnection();

    $stmt = $u->getinvoicememodetail($memo_number);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $memo_number     = $row['memo_number'];
    $date            = $row['date'];
    $customername    = $row['customer_name'];
    $phone           = $row['phone'];
    $address         = $row['address'];
    $totalquantity     = $row['totalquantity'];
    $grandtotal      = $row['grandtotal'];
    $paid            = $row['paid'];
    $due             = $row['due'];
    $conditionamount = $row['condition_amount'];
}
?>

<p style="color:black; text-align:center"><u>Date:</u> <?= $date ?></p>
<p style="color:black; text-align:center"><u>Memo No:</u> <?= $memo_number ?></p>
<p style="color:black; text-align:center"><u>Customer Name:</u> <?= $customername ?></p>
<p style="color:black; text-align:center"><u>Phone:</u> <?= $phone ?></p>
<p style="color:black; text-align:center"><u>Address:</u> <?= $address ?></p>

<h3>Items List</h3>

<table border="1" cellpadding="6" cellspacing="0" width="95%" style="text-align:center">
<thead style="background:#e6ffe6">
<tr>
<th>SL</th>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
</tr>
</thead>
<tbody>

<?php
$itemlist = $u->getinvoicememoitems($memo_number);
$sl = 1;

foreach($itemlist as $item){
    echo "<tr>
        <td>".$sl++."</td>
        <td>".$item['productname']."</td>
        <td>".$item['quantity']."</td>
        <td>".$item['price']."</td>
        <td>".$item['total']."</td>
    </tr>";
}
?>

</tbody>
</table>

<div style="text-align:center;margin-top:10px; color:black;">
<p><u>Total Quantity:</u> <?= $totalquantity ?> Pcs</p>
<p><u>Grand Total:</u> <?= $grandtotal ?> Tk</p>
<p><u>Paid:</u> <?= $paid ?> Tk</p>
<p><u>Due:</u> <?= $due ?> Tk</p>
<p><u>Condition Amount:</u> <?= $conditionamount ?> Tk</p>
</div>

</div>
</div>
    
 <!-- Edit Invoice Memo -->
<div class="rightinnerdiv">
<div id="editinvoicememo" class="innerright portion"
     style="<?php if (!empty($_REQUEST['editmemo_number'])) { $editmemo_number = $_REQUEST['editmemo_number']; } else { echo 'display:none'; } ?>">

<button class="greenbtn">EDIT INVOICE MEMO</button>
<br>

<?php
if (!empty($_REQUEST['editmemo_number'])) {

    $editmemo_number = $_REQUEST['editmemo_number'];

    $u = new data();
    $u->setconnection();

    // Memo info
    $memoStmt = $u->getinvoicememodetail($editmemo_number);
    $memo = $memoStmt->fetch(PDO::FETCH_ASSOC);

    // Items
    $itemStmt = $u->getinvoicememoitems($editmemo_number);
    $items = $itemStmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<form action="editinvoicememo.php" method="post" style="padding:10px;">

<input type="hidden" name="invoice_memoid" value="<?= $memo['id'] ?>">

<label><b>Memo No:</b></label>
<input type="text" name="memo_number" value="<?= $memo['memo_number'] ?>" readonly style="width:390px;">

<label><b>Date:</b></label>
<input type="date" name="date" value="<?= $memo['date'] ?>" required><br>

<label><b>Customer Name:</b></label>
<input type="text" name="customer_name" value="<?= $memo['customer_name'] ?>" required style="width:390px;">

<label><b>Phone:</b></label>
<input type="number" name="phone" value="<?= $memo['phone'] ?>" required style="width:200px;"><br>

<label><b>Address:</b></label>
<input type="text" name="address" value="<?= $memo['address'] ?>" required style="width:780px;"><br>

<hr style="border:2px solid black; margin:20px 0;">

<!-- ITEM TABLE -->
<h4>Items</h4>
<table border="1" cellpadding="6" cellspacing="0" width="90%" id="billingTable" align="center"
       style="border-collapse:collapse; text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
<th>SL</th>
<th>Product Description</th>
<th>Quantity</th>
<th>Price(Tk)</th>
<th>Amount (Tk)</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ($items as $i => $item): ?>
<tr>
<td><?= $i + 1 ?></td>

<td>
<input type="text" name="productname[]" value="<?= $item['productname'] ?>" required style="width:200px;">
<input type="hidden" name="itemid[]" value="<?= $item['id'] ?>">
</td>

<td><input type="number" name="quantity[]" class="quantity" value="<?= $item['quantity'] ?>" required></td>
<td><input type="number" name="price[]" class="price" value="<?= $item['price'] ?>" required></td>
<td><input type="number" name="total[]" class="total" value="<?= $item['total'] ?>" readonly></td>

<td><button type="button" onclick="removeRow(this)">X</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<div style="text-align:center; margin:10px;">
<button type="button" onclick="addRow()">➕ Add Row</button>
</div>

<!-- TOTALS -->
<div style="padding:10px 20px;">
<label><b>Total Quantity(Pcs):</b></label>
<input type="number" name="totalquantity" id="totalquantity" value="<?= $memo['totalquantity'] ?>" readonly><br>

<label><b>Grand Total(Tk):</b></label>
<input type="number" name="grandtotal" id="grandtotal" value="<?= $memo['grandtotal'] ?>" readonly><br>

<label><b>Paid(Tk):</b></label>
<input type="number" name="paid" id="paid" value="<?= $memo['paid'] ?>" oninput="calculateDue()" required><br>

<label><b>Due(Tk):</b></label>
<input type="number" name="due" id="due" value="<?= $memo['due'] ?>" readonly><br>

<label><b>Condition Amount(Tk):</b></label>
<input type="text" name="condition_amount" value="<?= $memo['condition_amount'] ?>" style="width:370px;"><br>

<input type="submit" value="Update Memo" class="print-btn">
<button type="button" class="print-btn" onclick="window.print()">🖨 Print</button>
</div>

</form>
</div>
</div>


<script>

// ADD NEW ROW

function addRow() {
    const tbody = document.querySelector("#billingTable tbody");
    const rowCount = tbody.rows.length + 1;

    const row = tbody.insertRow();
    row.innerHTML = `
        <td>${rowCount}</td>
        <td>
            <input type="text" name="productname[]" required style="width:200px;">
            <input type="hidden" name="itemid[]" value="">
        </td>
        <td><input type="number" name="quantity[]" class="quantity" required></td>
        <td><input type="number" step="0.01" name="price[]" class="price" required></td>
        <td><input type="number" step="0.01" name="total[]" class="total" readonly></td>
        <td><button type="button" onclick="removeRow(this)">X</button></td>
    `;

    bindEvents();
}


// REMOVE ROW

function removeRow(btn) {
    const row = btn.closest("tr");
    row.remove();
    updateSerial();
    calculateGrandTotal();
}


// UPDATE SERIAL NUMBERS

function updateSerial() {
    document.querySelectorAll("#billingTable tbody tr").forEach((row, i) => {
        row.cells[0].innerText = i + 1;
    });
}


// BIND INPUT EVENTS

function bindEvents() {
    document.querySelectorAll(".quantity, .price").forEach(input => {
        input.oninput = function () {
            const row = input.closest("tr");
            const qty = parseFloat(row.querySelector(".quantity").value) || 0;
            const price = parseFloat(row.querySelector(".price").value) || 0;
            row.querySelector(".total").value = (qty * price).toFixed(2);
            calculateGrandTotal();
        };
    });
}


// CALCULATE GRAND TOTAL

function calculateGrandTotal() {
    let grand = 0;
    let totalQty = 0;

    document.querySelectorAll(".total").forEach(t => {
        grand += parseFloat(t.value) || 0;
    });

    document.querySelectorAll(".quantity").forEach(q => {
        totalQty += parseFloat(q.value) || 0;
    });

    document.getElementById("grandtotal").value = grand.toFixed(2);
    document.getElementById("totalquantity").value = totalQty;
    calculateDue();
}


// CALCULATE DUE
function calculateDue() {
    const grand = parseFloat(document.getElementById("grandtotal").value) || 0;
    const paid = parseFloat(document.getElementById("paid").value) || 0;
    document.getElementById("due").value = (grand - paid).toFixed(2);
}


bindEvents();
calculateGrandTotal();
</script>


 <!--ADD DAILY REPORT -->
<div class="rightinnerdiv">
  <div id="dailyreport" class="innerright portion" style="display:none">
    <Button class="greenbtn">ADD DAILY REPORT</Button>

    <form action="adddailyreport.php" method="post">
      <label><b>Date:</b></label>
      <input type="date" name="date" required style="width:200px;">
      <br><br>

      <!-- SALES STATEMENT -->
      <h4>Sales Statement</h4>
      <table border="1" cellpadding="7" cellspacing="0" width="95%" id="salesTable" align="center" style="border-collapse:collapse; text-align:center;">
        <thead style="background:#e6ffe6;">
          <tr>
            <th>SL</th>
            <th>Memo Number</th>
            <th>Customer Name</th>
            <th>Quantity</th>
            <th>Amount (Tk)</th>
            <th>Due Amount (Tk)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><input type="text" name="memonumber[]" class="memonumber" required style="width:200px;"></td>
            <td><input type="text" name="customername[]" class="customername" required style="width:200px;"></td>
            <td><input type="number" name="quantity[]" class="quantity" oninput="calculateAll(); saveSalesTable()" required></td>
            <td><input type="number" name="amount[]" class="amount" oninput="calculateAll(); saveSalesTable()" required></td>
            <td><input type="number" name="dueamount[]" class="dueamount" oninput="calculateAll(); saveSalesTable()" required></td>
            <td><button type="button" onclick="removeRow(this)">X</button></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" style="text-align:right;"><b>Totals:</b></td>
            <td id="totalQuantity">0</td>
            <td id="totalAmount">0</td>
            <td id="totalDueAmount">0</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
      <button type="button" onclick="addSalesRow()">➕ Add Sales Row</button>

      <br><br>

      <!-- COST STATEMENT -->
      <h4>Cost Statement</h4>
      <table border="1" cellpadding="5" cellspacing="0" width="95%" id="costTable" align="center" style="border-collapse:collapse; text-align:center;">
        <thead style="background:#e6ffe6;">
          <tr>
            <th>SL</th>
            <th>Cost Details</th>
            <th>Cost Amount (Tk)</th>
            <th>Payment Method</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><input type="text" name="costdetails[]" required style="width:200px;"></td>
            <td><input type="number" name="costamount[]" class="costamount" oninput="calculateAll(); saveCostTable()" required></td>
            <td><input type="text" name="paymentmethod[]" required></td>
            <td><button type="button" onclick="removeRow(this)">X</button></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" style="text-align:right;"><b>Total Cost:</b></td>
            <td id="costGrandTotal">0</td>
            <td colspan="2"></td>
          </tr>
        </tfoot>
      </table>
      <button type="button" onclick="addCostRow()">➕ Add Cost Row</button>

      <br><br>

      <!-- CASH STATEMENT -->
      <h4>Cash Statement</h4>
      <table border="1" cellpadding="4" cellspacing="0" width="95%" id="cashTable" align="center" style="border-collapse:collapse; text-align:center;">
        <thead style="background:#e6ffe6;">
          <tr>
            <th>SL</th>
            <th>Cash Details</th>
            <th>Cash Amount (Tk)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><input type="text" name="cashdetails[]" required style="width:200px;"></td>
            <td><input type="number" name="cashamount[]" class="cashamount" oninput="calculateAll(); saveCashTable()" required></td>
            <td><button type="button" onclick="removeRow(this)">X</button></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" style="text-align:right;"><b>Total Cash:</b></td>
            <td id="cashGrandTotal">0</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
      <button type="button" onclick="addCashRow()">➕ Add Cash Row</button>

      <br><br>

      <!-- SUMMARY -->
<h4 style="text-align:center;">Daily Summary</h4><br>
<table class="summary-table">
  <tbody>
    <tr><td><b>Total Quantity (Pcs)</b></td><td id="summaryTotalQuantity">0</td></tr>
    <tr><td><b>Total Sales Amount (Tk)</b></td><td id="summaryTotalAmount">0</td></tr>
    <tr><td><b>Total Cash (Tk)</b></td><td id="summaryTotalCash">0</td></tr>
    <tr><td><b>Total Due Amount (Tk)</b></td><td id="summaryTotalDueAmount">0</td></tr>
    <tr><td><b>Total Cost (Tk)</b></td><td id="summaryTotalCost">0</td></tr>
    <tr><td><b>Net Cash (Tk)</b></td><td id="summaryNet">0</td></tr>
  </tbody>
</table>


      <br>
      <button type="submit" class="greenbtn">SAVE DAILY SALES</button>
    </form>
  </div>
</div>

<script>

   // Row Management

function removeRow(btn) {
  const tr = btn.closest('tr');
  const tbody = tr.closest('tbody');
  tr.remove();
  renumberSL(tbody);
  calculateAll();
  saveAllTables();
}

function renumberSL(tbody) {
  Array.from(tbody.rows).forEach((row, i) => {
    row.cells[0].innerText = i + 1;
  });
}

function addSalesRow() {
  const tbody = document.querySelector('#salesTable tbody');
  const newIndex = tbody.rows.length + 1;
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>${newIndex}</td>
    <td><input type="text" name="memonumber[]" class="memonumber" oninput="saveSalesTable()" required style="width:200px;"></td>
    <td><input type="text" name="customername[]" class="customername" oninput="saveSalesTable()" required style="width:200px;"></td>
    <td><input type="number" name="quantity[]" class="quantity" oninput="calculateAll(); saveSalesTable()" required></td>
    <td><input type="number" name="amount[]" class="amount" oninput="calculateAll(); saveSalesTable()" required></td>
    <td><input type="number" name="dueamount[]" class="dueamount" oninput="calculateAll(); saveSalesTable()" required></td>
    <td><button type="button" onclick="removeRow(this)">X</button></td>
  `;
  tbody.appendChild(tr);
  saveSalesTable();
}

function addCostRow() {
  const tbody = document.querySelector('#costTable tbody');
  const newIndex = tbody.rows.length + 1;
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>${newIndex}</td>
    <td><input type="text" name="costdetails[]" oninput="saveCostTable()" required style="width:200px;"></td>
    <td><input type="number" name="costamount[]" class="costamount" oninput="calculateAll(); saveCostTable()" required></td>
    <td><input type="text" name="paymentmethod[]" oninput="saveCostTable()" required></td>
    <td><button type="button" onclick="removeRow(this)">X</button></td>
  `;
  tbody.appendChild(tr);
  saveCostTable();
}

function addCashRow() {
  const tbody = document.querySelector('#cashTable tbody');
  const newIndex = tbody.rows.length + 1;
  const tr = document.createElement('tr');
  tr.innerHTML = `
    <td>${newIndex}</td>
    <td><input type="text" name="cashdetails[]" oninput="saveCashTable()" required style="width:200px;"></td>
    <td><input type="number" name="cashamount[]" class="cashamount" oninput="calculateAll(); saveCashTable()" required></td>
    <td><button type="button" onclick="removeRow(this)">X</button></td>
  `;
  tbody.appendChild(tr);
  saveCashTable();
}


   // Calculations

function calculateAll() {
  calculateSalesTotals();
  calculateCostTotal();
  calculateCashTotal();
  calculateSummary();
}

function calculateSalesTotals() {
  let totalQty = 0, totalAmt = 0, totalDue = 0;
  document.querySelectorAll('#salesTable tbody tr').forEach(row => {
    totalQty += Number(row.querySelector('.quantity').value) || 0;
    totalAmt += Number(row.querySelector('.amount').value) || 0;
    totalDue += Number(row.querySelector('.dueamount').value) || 0;
  });
  document.getElementById('totalQuantity').innerText = totalQty;
  document.getElementById('totalAmount').innerText = totalAmt.toFixed(2);
  document.getElementById('totalDueAmount').innerText = totalDue.toFixed(2);
}

function calculateCostTotal() {
  let total = 0;
  document.querySelectorAll('.costamount').forEach(inp => {
    total += Number(inp.value) || 0;
  });
  document.getElementById('costGrandTotal').innerText = total.toFixed(2);
}

function calculateCashTotal() {
  let total = 0;
  document.querySelectorAll('.cashamount').forEach(inp => {
    total += Number(inp.value) || 0;
  });
  document.getElementById('cashGrandTotal').innerText = total.toFixed(2);
}

function calculateSummary() {
  const totalQty = Number(document.getElementById('totalQuantity').innerText) || 0;
  const totalAmt = Number(document.getElementById('totalAmount').innerText) || 0;
  const totalDue = Number(document.getElementById('totalDueAmount').innerText) || 0;
  const totalCost = Number(document.getElementById('costGrandTotal').innerText) || 0;
  const totalCash = Number(document.getElementById('cashGrandTotal').innerText) || 0;

  document.getElementById('summaryTotalQuantity').innerText = totalQty;
  document.getElementById('summaryTotalAmount').innerText = totalAmt.toFixed(2);
  document.getElementById('summaryTotalDueAmount').innerText = totalDue.toFixed(2);
  document.getElementById('summaryTotalCost').innerText = totalCost.toFixed(2);
  document.getElementById('summaryTotalCash').innerText = totalCash.toFixed(2);

  const net = (totalAmt + totalCash) - (totalDue + totalCost);
  document.getElementById('summaryNet').innerText = net.toFixed(2);
}


  // LocalStorage Save 

function saveSalesTable() {
  const arr = [];
  document.querySelectorAll('#salesTable tbody tr').forEach(row => {
    arr.push({
      memo: row.querySelector('.memonumber').value,
      name: row.querySelector('.customername').value,
      qty: row.querySelector('.quantity').value,
      amount: row.querySelector('.amount').value,
      due: row.querySelector('.dueamount').value
    });
  });
  localStorage.setItem('salesTableData', JSON.stringify(arr));
}

function loadSalesTable() {
  const data = JSON.parse(localStorage.getItem('salesTableData'));
  if (!data) return;
  const tbody = document.querySelector('#salesTable tbody');
  tbody.innerHTML = '';
  data.forEach((r, i) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${i + 1}</td>
      <td><input type="text" class="memonumber" name="memonumber[]" value="${r.memo}" oninput="saveSalesTable()" required style="width:200px;"></td>
      <td><input type="text" class="customername" name="customername[]" value="${r.name}" oninput="saveSalesTable()" required style="width:200px;"></td>
      <td><input type="number" class="quantity" name="quantity[]" value="${r.qty}" oninput="calculateAll(); saveSalesTable()" required></td>
      <td><input type="number" class="amount" name="amount[]" value="${r.amount}" oninput="calculateAll(); saveSalesTable()" required></td>
      <td><input type="number" class="dueamount" name="dueamount[]" value="${r.due}" oninput="calculateAll(); saveSalesTable()" required></td>
      <td><button type="button" onclick="removeRow(this)">X</button></td>
    `;
    tbody.appendChild(tr);
  });
  calculateAll();
}

function saveCostTable() {
  const arr = [];
  document.querySelectorAll('#costTable tbody tr').forEach(row => {
    arr.push({
      details: row.querySelector('input[name="costdetails[]"]').value,
      amount: row.querySelector('.costamount').value,
      method: row.querySelector('input[name="paymentmethod[]"]').value
    });
  });
  localStorage.setItem('costTableData', JSON.stringify(arr));
}

function loadCostTable() {
  const data = JSON.parse(localStorage.getItem('costTableData'));
  if (!data) return;
  const tbody = document.querySelector('#costTable tbody');
  tbody.innerHTML = '';
  data.forEach((r, i) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${i + 1}</td>
      <td><input type="text" name="costdetails[]" value="${r.details}" oninput="saveCostTable()" required style="width:200px;"></td>
      <td><input type="number" name="costamount[]" class="costamount" value="${r.amount}" oninput="calculateAll(); saveCostTable()" required></td>
      <td><input type="text" name="paymentmethod[]" value="${r.method}" oninput="saveCostTable()" required></td>
      <td><button type="button" onclick="removeRow(this)">X</button></td>
    `;
    tbody.appendChild(tr);
  });
  calculateAll();
}

function saveCashTable() {
  const arr = [];
  document.querySelectorAll('#cashTable tbody tr').forEach(row => {
    arr.push({
      details: row.querySelector('input[name="cashdetails[]"]').value,
      amount: row.querySelector('.cashamount').value
    });
  });
  localStorage.setItem('cashTableData', JSON.stringify(arr));
}

function loadCashTable() {
  const data = JSON.parse(localStorage.getItem('cashTableData'));
  if (!data) return;
  const tbody = document.querySelector('#cashTable tbody');
  tbody.innerHTML = '';
  data.forEach((r, i) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${i + 1}</td>
      <td><input type="text" name="cashdetails[]" value="${r.details}" oninput="saveCashTable()" required style="width:200px;"></td>
      <td><input type="number" name="cashamount[]" class="cashamount" value="${r.amount}" oninput="calculateAll(); saveCashTable()" required></td>
      <td><button type="button" onclick="removeRow(this)">X</button></td>
    `;
    tbody.appendChild(tr);
  });
  calculateAll();
}

function saveAllTables() {
  saveSalesTable();
  saveCostTable();
  saveCashTable();
}

/* Clear localStorage when form submitted */
document.querySelector('form').addEventListener('submit', function () {
  localStorage.removeItem('salesTableData');
  localStorage.removeItem('costTableData');
  localStorage.removeItem('cashTableData');
});

/* Load saved data on page load */
window.addEventListener('DOMContentLoaded', function () {
  loadSalesTable();
  loadCostTable();
  loadCashTable();
  calculateAll();
});
</script>


<!-- Daily Report List -->
<div class="rightinnerdiv">   
    <div id="dailyreportlist" class="innerright portion" style="display:none">
        <button class="greenbtn">DAILY REPORT LIST</button>

        <!-- Search -->
        <div style="position: relative; width: 250px; margin:10px 0;">
            <input type="text" id="dailyReportSearch" placeholder="Search Daily Report..." 
                   style="width:100%; padding:8px 30px 8px 10px; border-radius:4px; border:1px solid #ccc;">
            <span style="position:absolute; right:8px; top:50%; transform:translateY(-50%); pointer-events:none;">🔎</span>
        </div>

        <?php
        $u = new data();
        $u->setconnection();
        $recordset = $u->getdailyreport(); 

        $table = "<table class='table-box' style='width:100%; border-collapse: collapse;'>
            <thead style='background:#f2f2f2;'>
                <tr>
                    <th>Date</th>
                    <th>Total Qty</th>
                    <th>Total Sales</th>
                    <th>Total Cash</th>
                    <th>Total Due</th>
                    <th>Total Cost</th>
                    <th>Net Cash</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

        foreach($recordset as $row){
            $table .= "<tr>"; 
            $table .= "<td>$row[1]</td>"; 
            $table .= "<td>$row[2]</td>";
            $table .= "<td>$row[3]</td>"; 
            $table .= "<td>$row[6]</td>"; 
            $table .= "<td>$row[4]</td>";
            $table .= "<td>$row[5]</td>"; 
            $table .= "<td>$row[7]</td>"; 

            $table .= "<td><a href='admin_service_dashboard.php?report_date=$row[1]'>
                        <button class='btn btn-primary'>Detail</button></a></td>";

            $table .= "<td><a href='admin_service_dashboard.php?editreport_date=$row[1]'>
                        <button class='btn btn-primary'>Edit</button></a></td>";

            $table .= "<td><a href='deletedailyreport.php?date=$row[1]' 
                        onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";

            $table .= "</tr>";
        }

        $table .= "</tbody></table>";
        echo $table;
        ?>
    </div>
</div>


<!-- Daily Report Detail -->
<div class="rightinnerdiv">   
<div id="dailyreportdetail" class="innerright portion"
style="<?php echo !empty($_REQUEST['report_date']) ? '' : 'display:none'; ?>">

<button class="greenbtn">DAILY REPORT DETAIL</button><br>

<?php
if(!empty($_REQUEST['report_date'])){
    $date = $_REQUEST['report_date'];

    $u = new data;
    $u->setconnection();

    $stmt = $u->getdailyreportdetail($date);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $total_qty   = $row['total_quantity'];
    $total_sales = $row['total_sales_amount'];
    $total_due   = $row['total_due_amount'];
    $total_cost  = $row['total_cost'];
    $total_cash  = $row['total_cash'];
    $net_cash    = $row['net_cash'];
}
?>

<p style="text-align:center;  font-size:25px;"><u>Date:</u> <?= $date ?></p>

<!-- SALES -->
<h3>Sales List</h3>
<table border="1" width="95%" style="text-align:center">
<tr>
<th>Memo</th>
<th>Customer</th>
<th>Qty</th>
<th>Amount</th>
<th>Due</th>
</tr>

<?php
$sales = $u->getdailysalesbydate($date);
foreach($sales as $s){
    echo "<tr>
        <td>{$s['memo_number']}</td>
        <td>{$s['customer_name']}</td>
        <td>{$s['quantity']}</td>
        <td>{$s['amount']}</td>
        <td>{$s['due_amount']}</td>
    </tr>";
}
?>
</table>

<!-- COST -->
<h3>Cost List</h3>
<table border="1" width="95%" style="text-align:center">
<tr>
<th>Details</th>
<th>Amount</th>
<th>Method</th>
</tr>

<?php
$cost = $u->getdailycostbydate($date);
foreach($cost as $c){
    echo "<tr>
        <td>{$c['cost_details']}</td>
        <td>{$c['cost_amount']}</td>
        <td>{$c['payment_method']}</td>
    </tr>";
}
?>
</table>

<!-- CASH -->
<h3>Cash List</h3>
<table border="1" width="95%" style="text-align:center">
<tr>
<th>Details</th>
<th>Amount</th>
</tr>

<?php
$cash = $u->getdailycashbydate($date);
foreach($cash as $c){
    echo "<tr>
        <td>{$c['cash_details']}</td>
        <td>{$c['cash_amount']}</td>
    </tr>";
}
?>
</table><br>

<h4 style="text-align:center;">Daily Summary</h4><br>

<table class="summary-table" border="1" cellpadding="8" cellspacing="0" align="center" style="border-collapse:collapse; width:50%; text-align:center;">
  <tbody>
    <tr><td><b>Total Quantity (Pcs)</b></td><td><?= $total_qty ?></td></tr>
    <tr><td><b>Total Sales Amount (Tk)</b></td><td><?= $total_sales ?></td></tr>
    <tr><td><b>Total Cash (Tk)</b></td><td><?= $total_cash ?></td></tr>
    <tr><td><b>Total Due Amount (Tk)</b></td><td><?= $total_due ?></td></tr>
    <tr><td><b>Total Cost (Tk)</b></td><td><?= $total_cost ?></td></tr>
    <tr><td><b>Net Cash (Tk)</b></td><td><?= $net_cash ?></td></tr>
  </tbody>
</table>
</div>
</div>


<!-- EDIT DAILY REPORT -->
<div class="rightinnerdiv">
<div id="editdailyreport" class="innerright portion"
     style="<?php echo !empty($_REQUEST['editreport_date']) ? 'display:block' : 'display:none'; ?>">

<button class="greenbtn">EDIT DAILY REPORT</button>
<br>

<?php
if (!empty($_REQUEST['editreport_date'])) {

    $editreport_date = $_REQUEST['editreport_date'];

    $u = new data();
    $u->setconnection();

    $report = $u->getdailyreportdetail($editreport_date)->fetch(PDO::FETCH_ASSOC);
    $editsales = $u->getdailysalesbydate($editreport_date);
    $editcost = $u->getdailycostbydate($editreport_date);
    $editcash = $u->getdailycashbydate($editreport_date);
}
?>

<form action="editdailyreport.php" method="post" style="padding:10px;">

<input type="hidden" name="report_id" value="<?= $editreport_date ?>">

<label><b>Date:</b></label>
<input type="date" name="date" value="<?= $report['date'] ?>" required style="width:200px;">
<br><br>

<hr style="border:2px solid black;">

<!-- SALES -->
<h4>Sales Statement</h4>

<table border="1" cellpadding="7" cellspacing="0" width="95%"
       id="editsalesTable"
       align="center"
       style="border-collapse:collapse; text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
<th>SL</th>
<th>Memo Number</th>
<th>Customer Name</th>
<th>Quantity</th>
<th>Amount (Tk)</th>
<th>Due Amount (Tk)</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ($editsales as $i => $row): ?>
<tr>
<td><?= $i+1 ?></td>

<td><input type="text" name="memonumber[]" value="<?= $row['memo_number'] ?>" required style="width:180px;"></td>
<td><input type="text" name="customername[]" value="<?= $row['customer_name'] ?>" required style="width:150px;"></td>
<td><input type="number" class="edit_qty" name="quantity[]" value="<?= $row['quantity'] ?>" required></td>
<td><input type="number" class="edit_amount" name="amount[]" value="<?= $row['amount'] ?>" required style="width:80px;"></td>
<td><input type="number" class="edit_due" name="dueamount[]" value="<?= $row['due_amount'] ?>" required></td>
<td><button type="button" onclick="editremoveRow(this)">X</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<br>
<button type="button" onclick="editaddSalesRow()">➕ Add Sales Row</button>

<br><br>

<!-- COST -->
<h4>Cost Statement</h4>

<table border="1" cellpadding="5" cellspacing="0" width="95%"
       id="editcostTable"
       align="center"
       style="border-collapse:collapse; text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
<th>SL</th>
<th>Cost Details</th>
<th>Cost Amount (Tk)</th>
<th>Payment Method</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ($editcost as $i => $row): ?>
<tr>
<td><?= $i+1 ?></td>

<td><input type="text" name="costdetails[]" value="<?= $row['cost_details'] ?>" required style="width:250px;"></td>
<td><input type="number" class="edit_costamount" name="costamount[]" value="<?= $row['cost_amount'] ?>" required></td>
<td><input type="text" name="paymentmethod[]" value="<?= $row['payment_method'] ?>" required></td>

<td><button type="button" onclick="editremoveRow(this)">X</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<br>
<button type="button" onclick="editaddCostRow()">➕ Add Cost Row</button>

<br><br>

<!-- CASH -->
<h4>Cash Statement</h4>

<table border="1" cellpadding="4" cellspacing="0" width="95%"
       id="editcashTable"
       align="center"
       style="border-collapse:collapse; text-align:center;">

<thead style="background:#e6ffe6;">
<tr>
<th>SL</th>
<th>Cash Details</th>
<th>Cash Amount (Tk)</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ($editcash as $i => $row): ?>
<tr>
<td><?= $i+1 ?></td>

<td><input type="text" name="cashdetails[]" value="<?= $row['cash_details'] ?>" required style="width:250px;"></td>
<td><input type="number" class="edit_cashamount" name="cashamount[]" value="<?= $row['cash_amount'] ?>" required></td>
<td><button type="button" onclick="editremoveRow(this)">X</button></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<br>
<button type="button" onclick="editaddCashRow()">➕ Add Cash Row</button>

<br><br>

<!-- SUMMARY -->
<h3 style="text-align:center;">Daily Summary</h3>

<div style="padding:10px 20px; text-align:center;">

<label><b>Total Quantity (Pcs)</b></label>
<input id="edittotalQty" readonly style="width:200px; text-align:center;"><br>

<label><b>Total Sales (Tk)</b></label>
<input id="edittotalSales" readonly style="width:200px; text-align:center;"><br>

<label><b>Total Cash (Tk)</b></label>
<input id="edittotalCash" readonly style="width:200px; text-align:center;"><br>

<label><b>Total Due (Tk)</b></label>
<input id="edittotalDue" readonly style="width:200px; text-align:center;"><br>

<label><b>Total Cost (Tk)</b></label>
<input id="edittotalCost" readonly style="width:200px; text-align:center;"><br>

<label><b>Net Cash (Tk)</b></label>
<input id="editnet" readonly style="width:200px; text-align:center;"><br>

</div>
<input type="submit" value="UPDATE REPORT" class="greenbtn">

</div>

</form>
</div>
</div>



<script>

function editremoveRow(btn){
    btn.closest("tr").remove();
    editCalculateAll();
}

// ADD SALES ROW
function editaddSalesRow(){
    const tbody = document.querySelector("#editsalesTable tbody");
    const tr = document.createElement("tr");

    tr.innerHTML = `
    <td></td>
    <td><input type="text" name="memonumber[]" required style="width:180px;"></td>
    <td><input type="text" name="customername[]" required style="width:150px;"></td>
    <td><input type="number" class="edit_qty" name="quantity[]"></td>
    <td><input type="number" class="edit_amount" name="amount[]" required style="width:80px;"></td>
    <td><input type="number" class="edit_due" name="dueamount[]"></td>
    <td><button type="button" onclick="editremoveRow(this)">X</button></td>
    `;
    tbody.appendChild(tr);
}

// COST ROW
function editaddCostRow(){
    const tbody = document.querySelector("#editcostTable tbody");
    const tr = document.createElement("tr");

    tr.innerHTML = `
    <td></td>
    <td><input type="text" name="costdetails[]" required style="width:250px;"></td>
    <td><input type="number" class="edit_costamount" name="costamount[]"></td>
    <td><input type="text" name="paymentmethod[]"></td>
    <td><button type="button" onclick="editremoveRow(this)">X</button></td>
    `;
    tbody.appendChild(tr);
}

// CASH ROW
function editaddCashRow(){
    const tbody = document.querySelector("#editcashTable tbody");
    const tr = document.createElement("tr");

    tr.innerHTML = `
    <td></td>
    <td><input type="text" name="cashdetails[]" required style="width:250px;"></td>
    <td><input type="number" class="edit_cashamount" name="cashamount[]"></td>
    <td><button type="button" onclick="editremoveRow(this)">X</button></td>
    `;
    tbody.appendChild(tr);
}

// MAIN CALCULATION (FIXED)
function editCalculateAll(){

    let qty = 0, sales = 0, due = 0, cost = 0, cash = 0;

    document.querySelectorAll(".edit_qty").forEach(e => qty += +e.value || 0);
    document.querySelectorAll(".edit_amount").forEach(e => sales += +e.value || 0);
    document.querySelectorAll(".edit_due").forEach(e => due += +e.value || 0);
    document.querySelectorAll(".edit_costamount").forEach(e => cost += +e.value || 0);
    document.querySelectorAll(".edit_cashamount").forEach(e => cash += +e.value || 0);

    document.getElementById("edittotalQty").value = qty;
    document.getElementById("edittotalSales").value = sales.toFixed(2);
    document.getElementById("edittotalDue").value = due.toFixed(2);
    document.getElementById("edittotalCost").value = cost.toFixed(2);
    document.getElementById("edittotalCash").value = cash.toFixed(2);
    const net = (sales + cash) - (due + cost);
    document.getElementById("editnet").value = net.toFixed(2);
}

// AUTO BIND (SAFE)
document.addEventListener("input", function(e){
    if (e.target.closest("#editdailyreport")) {
        editCalculateAll();
    }
});

// INIT
editCalculateAll();

</script>



<script>
document.getElementById("dailyReportSearch").addEventListener("keyup", function () {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll(".table-box tbody tr"); 
    rows.forEach((row) => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>


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