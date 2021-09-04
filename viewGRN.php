<?php
include_once "include/connection.inc.php";
include_once "include/session.inc.php"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Warehouse new stock</title>
    <link rel="stylesheet" href="home.css">
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        /* allows us to include the padding and border in a 
        elements total width and height*/
        box-sizing: border-box;
    }

    body {
        max-height: 50%;
        font-family: sans-serif;
        
    }

    .container {
        background-color: white;
        margin: auto;
        margin-top: 30px;
        margin-bottom: 50px;
        max-width: 90%;
        max-height: 50%;
        width: 500px;
        border: 1px solid black;
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
        width: 100%;
        height: 70%;
        padding: 20px;
        background: white;
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
        margin-left: 30%;
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
/*nth-child-matches every element that is the nth child
n-can be a number,keyword*/
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
<?php
include_once "include/menu.inc.php";

?>
<?php
//$_request-is used to collect data after submitting an HTML form.
$grnid=$_REQUEST['id'];
//left join-outputs all data on the left table 
//and what matches on the right side table
$sql = "SELECT GOOD_RETURN_NOTE.*, SUPPLIER.SUPPLIER_NAME FROM GOOD_RETURN_NOTE LEFT JOIN SUPPLIER ON GOOD_RETURN_NOTE.SUPPLIER_ID = SUPPLIER.SUPPLIER_ID WHERE ID='$grnid'";
$stid=ociparse($conn,$sql);
ociexecute($stid);
//returns an array that corresponds to the fetched row or false 
 //OCI_BOTH-returns an array with both numeric and associative indexex
 //if there are no more rows
 //associative array is an array where each key has its own specific value
$grn=oci_fetch_array($stid, OCI_BOTH);
?>
<form method="POST">
    <div class="container">

        <h2>VIEW GRN</h2>
        <div class="container-1">
            <label for="GRN NO">GRN NO : </label>
            <b><?=$grn['ID']?></b>
        </div>

        <div class="container-1">
            <label for="SUPPLIER">SUPPLIER : </label>
            <b><?=$grn['SUPPLIER_NAME']?></b>
        </div>
        <div class="container-1">
            <label for="RETURN DATE">RETURN DATE : </label>
            <b><?=$grn['DATE_RETURNED']?></b>
        </div>
    </div>

    <table class="tab" id="myTable">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>REASON</th>
        </tr>
        <tbody>
        <?php
        
        $grnid=$_REQUEST['id'];

        $sql = "SELECT * FROM grn_details WHERE GRN_ID='$grnid'";
        $stid=ociparse($conn,$sql);
        ociexecute($stid);
        //returns an array that corresponds to the fetched row
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            ?>
            <tr>
                <td>
                    <?=$row['PRODUCT_NAME']?>
                </td>
                <td>
                    <?=$row['PRODUCT_PRICE']?>
                </td>
                <td>
                    <?=$row['QUANTITY']?>
                </td>
                <td>
                    <?=$row['REASON']?>
                </td>
            </tr>
        <?php } ?>
        </tbody>


    </table>
</form>
</body>
</html>