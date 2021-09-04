<?php
include_once "connection.inc.php"; 

//add to into goods table
$productname = $_POST['productname']??"" ;
$quantity= $_POST['quantity']??"" ;
$price = $_POST['price'] ??"";
//strtotime converts an English textual date-time description to a UNIX timestamp. 
$datedelivered = date('d-M-Y',strtotime($_POST['datedelivered']??""));
$expirydate=date('d-M-Y',strtotime($_POST['expirydate'] ??""));
$category = $_POST['category']??"" ;

//Insert into the goods table. Since i am adding as the stock manager, quanity(stock available)
//is the quantity i am adding while warehouse 0
$sql = "INSERT INTO GOODS(product_name, quantity, price, date_delivered, expiry_date,category,warehouse_quantity) VALUES ('$productname','$quantity','$price','$datedelivered','$expirydate','$category','0') returning PRODUCT_ID into :idNumber";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":idNumber", $idNumber);
oci_execute($stid);

$productid=$idNumber;


//Insert into the deliveries table. Help me to log deliveries

$sql = "INSERT INTO DELIVERIES(product_id, quantity,date_delivered) VALUES ('$productid','$quantity','$datedelivered')";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

header("location:../available stock.php?registration=success");

