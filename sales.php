<?php
include_once "include/connection.inc.php";
include_once "include/sales.inc.php";
include_once "include/session.inc.php";

$page='sales';
?>
<html>
<html lang="en">
<head>
    
    <title>Sales</title>
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
    /*create a smooth transition between two or more colors*/
    /* A gradient tilted 315 deg degrees,
   starting blackand finishing blue*/
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
color: white;
text-align: center;
}
.btn{
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
    text-transform: uppercase;
    margin-top: 20px;
    margin-bottom: 5px;
    color: white;
    padding :10px; 
    margin-left: 100px;

}

</style>
</head>
<body>
    <!-- loading the menu file -->
        <?php
        include_once "include/menu.inc.php";

        ?>
        </nav>
          <table class="tab">
          <tr>
    <th>No:</th>
     <th>Sales ID</th>
     <th>Product ID</th>
     <th>Product Name</th>
     <th>Category</th>
     <th>Sales date</th>
     <th>Quantity</th>
     <th>Price</th>
 </tr>
 <?php
 
 $count =1;
 //returns an array that corresponds to the fetched row or false 
 //OCI_BOTH-returns an array with both numeric and associative indexex
 //if there are no more rows
 //associative array is an array where each key has its own specific value
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    ?>
        <tr>
        <td><?php echo $count; $count++;?></td>
            <td><?= $row['ID']?></td>
            <td><?=$row['PRODUCT_ID']?></td>
            <td><?=$row['PRODUCT_NAME']?></td>
            <td><?=$row['CATEGORY']?></td>
            <td><?=$row['SALES_DATE']?></td>
            <td><?=$row['QUANTITY']?></td>
            <td><?=$row['PRICE']?></td>
        </tr>
 <?php
    }
 ?>

          </table>
          
</body>
</html>