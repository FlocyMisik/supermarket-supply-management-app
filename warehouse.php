<?php
include_once "include/session.inc.php";
include_once "include/warehouse.inc.php";

//Check if user is allowed to access this page
$designation=ucwords($_SESSION['designation']);
if($designation=='Warehouse Manager'||$designation=='Manager'||$designation=='Purchasing Admin'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Warehouse data</title>
    <link href="home.css" rel="stylesheet">
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
/*nth-child-matches every element that is the nth child
n-can be a number,keyword*/
.tab tr:nth-child(even){
    /* very light shade of gray*/
    background-color: #f2f2f2;
}
.tab tr:hover{
    /*light shade of grey */
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
    background:linear-gradient(315deg, #7ed6df 0%, #000000 100%);
    text-transform: uppercase;
    margin-top: 20px;
    margin-bottom: 5px;
    color: white;
    padding :10px; 
    margin-left: 100px;

}
.search{
    /*places an element on the right or right side of the container */
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
<form  action="warehouse.php"  method="get" >
         <input type="text" name="search" class="form-1">    
         <button type="submit" id="btn" >search</button>  
</form>
</div>
<table class="tab">
    <tr>
    <th>No:</th>
        <th> ID</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Date Delivered</th>
    </tr>
    <?php
    //search
    //$_REQUEST used to collect data after submitting a form
    
    if(isset($_REQUEST['search'])){
        $searchq=$_REQUEST['search'];
        //'%$searchq%-looks for anything that contains the string that one has entered
    //%-wildcard used to execute one or more characters-
    //%-look for any value that contains that string
        $sql="SELECT * FROM GOODS WHERE PRODUCT_id LIKE '%$searchq%' OR product_name LIKE '%$searchq%'";
    
        $stid=ociparse($conn,$sql);
    ociexecute($stid);
        
    } 
    $count=1;
    //returns an array that corresponds to the fetched row
    //OCI_BOTH-returns an array with both numeric and associative indexex
    //associative array is an array where each key has its own specific value

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        ?>
            <td><?=$count++?></td>
            <td><?=$row['PRODUCT_ID']?></td>
            <td><?=$row['PRODUCT_NAME']?></td>
            <td><?=$row['WAREHOUSE_QUANTITY']?></td>
            <td><?=$row['DATE_DELIVERED']?></td>
        </tr>
 <?php
    }
 ?>
 </table>
<form action="registerwarehousestock.php" method="GET">
    <button class="btn" name="Register" type="submit">Register new stock</button>
</form>

<form action="transferwarehousestock.php" method="GET">
    <button class="btn" name="transfer" type="submit">Transfer warehouse stock</button>
</form>

</body>
</html>
<?php
}
else{
    header("location:home.php");
}
?>