<?php
include_once "connection.inc.php";

//add to into goods table
$productname = $_POST['productname']??"" ;
$quantity= $_POST['quantity']??"" ;
$price = $_POST['price'] ??"";
//strtotime converts an English textual date-time description to a UNIX timestamp
// which is in seconds since 1970. 
//d-26, M-aug, y-21
$datedelivered = date('d-M-Y',strtotime($_POST['datedelivered']??""));
$expirydate=date('d-M-Y',strtotime($_POST['expirydate'] ??""));
$category = $_POST['category']??"" ;

// Insert into the goods table. 
// Since i am adding from the warehouse, quanity(stock available)
// is 0 while warehouse quanity is the quantity i am adding
//returning into used to return column values for affected by DML statements
$sql = "INSERT INTO GOODS(product_name, quantity, price, date_delivered, expiry_date,category,warehouse_quantity) VALUES ('$productname','0','$price','$datedelivered','$expirydate','$category','$quantity') returning PRODUCT_ID into :idNumber";
$stid = oci_parse($conn, $sql);
//ocibind by name-Binds a PHP variable to an Oracle placeholder
//":idNumber" is a oci8 placeholder for whaat we have added.
//it holds the grnid that was just added so that 
//it can bind it into the php variable i.e $idNumber
oci_bind_by_name($stid, ":idNumber", $idNumber);
oci_execute($stid);

$productid=$idNumber;


//Insert into the deliveries table. Help me to log deliveries

$sql = "INSERT INTO DELIVERIES(product_id, quantity,date_delivered) VALUES ('$productid','$quantity','$datedelivered')";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

header("location:../warehouse.php?registration=success");