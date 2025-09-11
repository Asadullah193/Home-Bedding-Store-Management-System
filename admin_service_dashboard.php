
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
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
        .innerright,label {
    color: rgba(47, 20, 223, 1);
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
    width: 15%;
}

.rightinnerdiv {
    float: right;
    width: 85%;
}

.innerright {
    background-color: #f3bd7e;
}

.greenbtn {
    background-color: #ffe3e3;
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



    <div class="container">
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
                <Button class="greenbtn"  onclick="openpart('orderlist')"> ORDER LIST</Button>
                <Button class="greenbtn"  onclick="openpart('addcouriermemo')"> ADD C.MEMO</Button>
                <Button class="greenbtn"  onclick="openpart('couriermemolist')"> C.MEMO LIST</Button>
                <Button class="greenbtn"  onclick="openpart('addinvoicememo')">  INVOICE MEMO</Button>
                <Button class="greenbtn" onclick="openpart('orderproductlist')">  ORDER LIST</Button>
                <a href="index.php"><Button class="greenbtn" > LOGOUT</Button></a>
            </div>
        
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

            <?php
            $u=new data;
            $u->setconnection();
            $u->getproduct();
            $recordset=$u->getproduct();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Product Name</th><th>Company Name</th><th>Price</th><th>Quantity</th><th>Available</th><th>Order</th></th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?productid=$row[0]'><button type='button' class='btn btn-primary'>View Product</button></a></td>";
                $table.="<td><a href='admin_service_dashboard.php?editproductid=$row[0]'>Edit</a></td>";
                $table.="<td><a href='deleteproduct.php?deleteproductid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>
            </div>
            </div>


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
            <Button class="greenbtn" >CUSTOMER LIST</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->customer();
            $recordset=$u->customer();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Shop Name</th><th>Page Name</th><th>Phone</th><th>Address</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='admin_service_dashboard.php?editcustomerid=$row[0]'>Edit</a></td>";
                $table.="<td><a href='deletecustomer.php?customeriddelete=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>
            </div>
            </div>


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
            <Button class="greenbtn" >ADVANCE ORDER LIST</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getadvance();
            $recordset=$u->getadvance();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Date</th><th>Select Customer</th><th>Name</th><th>Phone</th><th>Address</th><th>Advance Amount</th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td><a href='admin_service_dashboard.php?advance_orderid=$row[0]'><button type='button' class='btn btn-primary'>Order Detail</button></a></td>";
                $table.="<td><a href='admin_service_dashboard.php?editadvance_orderid=$row[0]'>Edit</a></td>";
                $table.="<td><a href='deleteorderlist.php?deleteadvance_orderid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>
            </div>
            </div>

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
            <Button class="greenbtn" >COURIER MEME LIST</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getcouriermemo();
            $recordset=$u->getcouriermemo();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Date</th><th>Receiver Name</th><th>Receiver Phone</th><th>Memo Number</th><th>Condition Amount</th><th>Courier Name</th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[11]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td><a href='admin_service_dashboard.php?courier_memoid=$row[0]'><button type='button' class='btn btn-primary'>Detail</button></a></td>";
                $table.="<td><a href='admin_service_dashboard.php?editcouriermemoid=$row[0]'>Edit</a></td>";
                $table.="<td><a href='deletecouriermemo.php?deletecourier_memoid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>
            </div>
            </div>


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
           <div id="editcouriermemo" class="innerright portion" style="<?php if(!empty($_REQUEST['editcouriermemoid'])) { $editcouriermemoid = $_REQUEST['editcouriermemoid']; } else { echo 'display:none'; } ?>">
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


<!-- Add Invoice Memo -->

<div class="rightinnerdiv">   
  <div id="addinvoicememo" class="innerright portion" style="display:none">
    <Button class="greenbtn">ADD INVOICE MEMO</Button>
    <br><br>

    <form action="invoicememo_page.php" method="post">
<?php
$memo_number = "Home-" . date("dmy") . "-" . rand(1,9999);
?>
  <label>Memo Number:</label>
  <input type="text" name="memo_number" value="<?php echo $memo_number; ?>" 1+ />
      <label>Date:</label>
      <input type="date" name="date" required />
      <br>

      <label>Customer Name:</label>
      <input type="text" name="customername" required />
      <br>
      <label>Phone:</label>
      <input type="number" name="phone" required />
      <br>
      <label>Address:</label>
      <input type="text" name="address" required />
      <br>

      <h4>Items</h4>
      <table border="1" cellpadding="8" id="billingTable">
        <tr>
          <th>SL</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>1</td>
          <td><input type="text" name="productname[]" required></td>
          <td><input type="number" name="quantity[]" class="quantity" required></td>
          <td><input type="number" step="0.01" name="price[]" class="price" required></td>
          <td><input type="number" step="0.01" name="total[]" class="total" readonly></td>
          <td><button type="button" onclick="removeRow(this)">X</button></td>
        </tr>
      </table>
      <br>
      <button type="button" onclick="addRow()">+ Add Row</button>
      <br>

      <label>Grand Total:</label>
      <input type="number" step="0.01" name="grandtotal" id="grandtotal" readonly />
      <br>

      <label>Paid:</label>
      <input type="number" step="0.01" name="paid" id="paid" oninput="calculateDue()" required />
      <br>

      <label>Due:</label>
      <input type="number" step="0.01" name="due" id="due" readonly />
      <br>

      <input type="submit" value="SAVE" class="greenbtn"/>
    </form>
  </div>
</div>

<script>
function addRow() {
    var table = document.getElementById("billingTable");
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    row.innerHTML = `
      <td>${rowCount}</td>
      <td><input type="text" name="productname[]" required></td>
      <td><input type="number" name="quantity[]" class="quantity" required></td>
      <td><input type="number" step="0.01" name="price[]" class="price" required></td>
      <td><input type="number" step="0.01" name="total[]" class="total" readonly></td>
      <td><button type="button" onclick="removeRow(this)">X</button></td>
    `;
    bindEvents();
}

function removeRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    calculateGrandTotal();
}

function bindEvents() {
    document.querySelectorAll(".quantity, .price").forEach(el => {
        el.oninput = function() {
            var row = el.closest("tr");
            var qty = row.querySelector(".quantity").value || 0;
            var price = row.querySelector(".price").value || 0;
            row.querySelector(".total").value = (qty * price).toFixed(2);
            calculateGrandTotal();
        }
    });
}

function calculateGrandTotal() {
    let totals = document.querySelectorAll(".total");
    let grand = 0;
    totals.forEach(t => {
        grand += parseFloat(t.value) || 0;
    });
    document.getElementById("grandtotal").value = grand.toFixed(2);
    calculateDue();
}

function calculateDue() {
    let grand = parseFloat(document.getElementById("grandtotal").value) || 0;
    let paid = parseFloat(document.getElementById("paid").value) || 0;
    let due = grand - paid;
    document.getElementById("due").value = due.toFixed(2);
}

bindEvents();
</script>


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