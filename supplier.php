<?php
include_once "include/session.inc.php";
include_once "include/supplier.inc.php";
$page="supplier";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Supplier Data</title>
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
<?php
include_once "include/menu.inc.php";

?>
<!-- search button -->
<div class="search">
<form  action="supplier.php"  method="get" >
         <input type="text" name="search" class="form-1">    
         <button type="submit" id="btn" >search</button>  
</form>
</div>


<table class="tab">
    <tr>
    <th>NO:</th>
        <th>Supplier ID</th>
        <th>Supplier Name</th>
        <th>Contact Number</th>
        <th>Email Address</th>
    </tr>
    <?php
    //search
    //$_REQUEST used to collect data after submitting a form
    //'%$searchq%-looks for anything that contains the string that one has entered
    //%-wildcard used to execute one or more characters-
    //%-look for any value that contains that string
    if(isset($_REQUEST['search'])){
        $searchq=$_REQUEST['search'];
        
        $sql="SELECT * FROM SUPPLIER WHERE supplier_id LIKE '%$searchq%' OR supplier_name LIKE '%$searchq%'";
    
        $stid=ociparse($conn,$sql);
    ociexecute($stid);
        
    } 


    $count=1;
    //returns an array that correspond to the fetched row
    //OCI_BOTH-returns an array with both numeric and associative indexex
    //associative array is an array where each key has its own specific value
    
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    ?>
        <tr>
        <td><?php echo $count; $count++;?></td>
            <td><?= $row['SUPPLIER_ID']?></td>
            <td><?=$row['SUPPLIER_NAME']?></td>
            <td><?=$row['CONTACT_NUMBER']?></td>
            <td><?=$row['EMAIL_ADDRESS']?></td>
        </tr>
 <?php
    }
 ?>

</table>
<form action="registernewsuppliers.php" method="GET">
<button type="menu" class="btn">Register New Supplier</button>
</form>
</body>
</html>