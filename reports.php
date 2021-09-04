<?php
include_once "include/session.inc.php";
include_once "include/connection.inc.php";
include_once "include/reports.inc.php";
$page='reports';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Reports</title>
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
h4{
    text-align: center;
    margin-top: 20px;
}
.btn {
            width: 250px;
            height: 34px;
            display: flex;
            margin-top: 50px;
            margin-right: auto;
            margin-left: auto;
            border: none;
            background-color: #7ed6df;
            background-image: linear-gradient(315deg, #7ed6df 0%, #000000 100%);
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            /*items are positioned to the center of the container */
            justify-content: center;
            align-items: center;
            padding: 2px;
            text-decoration: none;
}

        </style>
</head>
<body>
<?php
include_once "include/menu.inc.php";

?>

<div>
<a class="btn" href="salesreport.php">SALES REPORT</a>
<a class="btn" href="deliveryreport.php">DELIVERY REPORT</a>
<a class="btn" href="expiredstockreport.php">EXPIRED STOCK REPORT</a>
<a class="btn" href="expiryreport.php">EXPIRY REPORT</a>
<a class="btn" href="lporeport.php">LPO REPORT</a>
<a class="btn" href="grnreport.php">GRN REPORT</a>
</div>





</body>
</html>