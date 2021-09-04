<?php
include_once "include/session.inc.php";
include_once "include/goods.inc.php";
$page="stock";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Available stock</title>
    <link rel="stylesheet" href="home.css">
    <style>

        *{
            margin: 0;
            padding: 0;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
        .head{
            margin-top: 20px;
            text-align: center;
        }
        .tab{
             border-collapse: collapse;
              width: 90%;
            text-align: center;
            margin-left: 100px;
            margin-top: 30px;
        }
.tab td,.tab th{
    border: 1px solid black;
}
/*matches eevery element that is the 
nth child regarless of type of its parent*/
.tab tr:nth-child(even){
    background-color: #f2f2f2;
}
.tab tr:hover{
    background-color: #ddd;
}
.tab th{
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
color: white;
text-align: center;
}
.btn{
    /*create a smooth transition between two or more colors*/
    /* A gradient tilted 315 deg degrees,
   starting blackand finishing blue*/
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
    text-transform: uppercase;
    margin-top: 20px;
    margin-bottom: 5px;
    color: white;
    padding :10px; 
    margin-left: 100px;

}
.search{
    float: right;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-right: 10px;
   

}


        </style>
</head>
<body>
<!-- loading the menu file -->
<?php
include_once "include/menu.inc.php";

?>

<div class="search">
<form  action="available stock.php"  method="get" >
         <input type="text" name="search" class="form-1">    
         <button type="submit" id="btn" >search</button>  
</form>
</div>

<table class="tab">

 <tr>
     <th>No:</th>
     <th>Product ID</th>
     <th>Product Name</th>
     <th>Quantity</th>
     <th>Price</th>
     <th>Date delivered</th>
     <th>Expiry Date</th>
     <th>Category</th>
 </tr>
 <?php
 //$_REQUEST used to collect data after submitting a form
 //isset -check if the variable is set i.e declared and not null
if(isset($_REQUEST['search'])){
    $searchq=$_REQUEST['search'];
    //'%$searchq%-looks for anything that contains the string that one has entered
    //%-wildcard used to execute one or more characters-
    //%-look for any value that contains that string
    $sql="SELECT * FROM GOODS WHERE product_id LIKE '%$searchq%' OR product_name LIKE '%$searchq%'";

    $stid=ociparse($conn,$sql);
ociexecute($stid);
    
} 


 $count=1;
 //returns an array that corresponds to the fetched row
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    ?>
        <tr>
            <td><?php echo $count; $count++;?></td>
            <td><?= $row['PRODUCT_ID']?></td>
            <td><?=$row['PRODUCT_NAME']?></td>
            <td><?=$row['QUANTITY']?></td>
            <td><?=$row['PRICE']?></td>
            <td><?=$row['DATE_DELIVERED']?></td>
            <td><?=isset($row['EXPIRY_DATE'])?$row['EXPIRY_DATE']:''?></td>
            <td><?=$row['CATEGORY']?></td>
        </tr>
 <?php
    }
 ?>
</table>
<form action="registernewstock.php" method="GET">
    <button class="btn" name="Register" type="submit">Register new stock</button>
    
</form>

<form action="sell.php" method="GET">
<button class="btn" name="Register" type="submit">Sell</button>
</form>

</body>
</html>