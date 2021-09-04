<?php
include_once "include/session.inc.php";
include_once "include/connection.inc.php";



// declare it to null
$month="";
$year="";
//request-gets data sent to the url
//Check if the user has selected month and year
    if(isset($_REQUEST['month']))
    {
        $month=$_REQUEST['month'];
    }
    if(isset($_REQUEST['year']))
    {
        $year=$_REQUEST['year'];
    }

//Filtering
//Check if both inputs are not empty
if($month!="" && $year!=""){
    //output the sales date between the entered month and year
    $sql="SELECT * FROM GOODS WHERE EXTRACT(MONTH FROM DATE_DELIVERED)  ='$month' AND  EXTRACT(YEAR FROM  DATE_DELIVERED)  = '$year'";
}

    else {
    if($month!=""){
        //if only month is selected output only sales from that month
        // extract-extracts and return the value of a specified datetime field 
        $sql="SELECT * FROM GOODS WHERE EXTRACT(MONTH FROM DATE_DELIVERED)  = '$month'";
    } else if($year!=""){
        ////if only year is selected output only sales upto that selected year
        $sql="SELECT * FROM GOODS WHERE EXTRACT(YEAR FROM DATE_DELIVERED)  = '$year'";
    }
    else{
        //if none is selected, output all
        $sql="SELECT * FROM GOODS";
    }
    }

    $stid=ociparse($conn,$sql);
    ociexecute($stid);


?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Delivery Date</title>
    <link href="home.css" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
         /*allows us to include padding and border in an elements total width
        and height */
        box-sizing: border-box;
    }

    body {
        max-height: 50%;
        font-family: sans-serif;
        /* background-color: #7ed6df;
        background-image: linear-gradient(315deg, #7ed6df 0%, #000000 100%); */
    }

    .container {
        background-color: white;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 50px;
        max-width: 90%;
        max-height: 50%;
        width: 80%;
        border: 1px solid black;
        text-align: center;
    }

    .container2 {
        background-color: white;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 50px;
        max-width: 90%;
        max-height: 50%;
        width: 80%;
        text-align: center;
    }

    form {
        width: 100%;
        height: 70%;
        padding: 20px;
        background: white;
    }

    .container-1 {
        width: 48%;
        height: 70%;
        padding: 20px;
        background: white;
        display: inline-block;
    }

    .container h2 {
        text-align: center;
        margin-bottom: 10px;
        color: #222;
        margin-top: 30px;
        text-transform: uppercase;
    }

    .container p {
        text-align: center;
        margin-bottom: 24px;
        color: #222;
    }

    .form-1 {
        width: 100%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border: 1px, silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
        text-align: center;
        margin-bottom: 10px;


    }

    .container-1 .form-1 {
        width: 100%;
        height: 40px;
        background: white;
        border-radius: 4px;
        border: 1px, silver;
        margin: 10px 0 18px 0;
        padding: 0 10px;
        text-align: center;
        margin-bottom: 10px;


    }

    .btn {
        
        width: 120px;
        height: 34px;
        border: none;
        background-color: #7ed6df;
        background-image: linear-gradient(315deg, #7ed6df 0%, #000000 100%);
        cursor: pointer;
        font-size: 16px;
        text-transform: uppercase;
        color: white;
        justify-content: center;
        align-items: center;


    }

    .tab {
        border-collapse: collapse;
        width: 90%;
        text-align: center;
        margin-left: 100px;
        margin-top: 30px;
    }

    .tab td, .tab th {
        border: 1px solid black;
    }

    /* used to match child elements */
    .tab tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tab tr:hover {
        background-color: #ddd;
    }

    .tab th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background: linear-gradient(315deg, #7ed6df 0%, #000000 100%);
        color: white;
        text-align: center;
    }
</style>
</head>
<body>

<!-- loading the menu file -->
<?php
include_once "include/menu.inc.php";

?>
<div class="search">
<form>

<div class="container">

    <div class="container-1">
    <label for="month">Month</label>
<select name="month" id="month" class="form-1">
<option value="">select</option>
  <option value="1">January</option>
  <option value="2">February</option>
  <option value="3">March</option>
  <option value="4">April</option>
  <option value="5">May</option>
  <option value="6">June</option>
  <option value="7">July</option>
  <option value="8">August</option>
  <option value="9">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>

    </div>

    <div class="container-1">
    <label for="year">Year</label>
<select name="year" id="year" class="form-1">
<option value="">select</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  
</select>
    </div>

    <div class="container2">
    <button type="submit" class="btn">GENERATE</button>
</div>
</div>
</form>
</div>
<h4 style="text-align:center;">Delivery report</h4>
<table class="tab">
 <tr>
     <th>No:</th>
     <th>Product ID</th>
     <th>Product Name</th>
     <th>Quantity</th>
     <th>Date delivered</th>
     <th>Category</th>
     
     
 </tr>
 <?php
 $count=1;
 
 //returns an array that corresponds to the fetched row
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    ?>
        <tr>
        <td><?php echo $count; $count++;?></td>
            <td><?= $row['PRODUCT_ID']?></td>
            <td><?=$row['PRODUCT_NAME']?></td>
            <td><?=$row['QUANTITY']?></td>
            <td><?=$row['DATE_DELIVERED']?></td>
            <td><?=$row['CATEGORY']?></td>
        </tr>
 <?php
    }
 ?>


</table>

</body>
</html>
<?php

?>

