<?php
include_once "connection.inc.php";


$supplier=$_POST['supplier']??"";
//get todays date
$date= date('d-M-y');
//return into-allows one to return column values 
$sql = "INSERT INTO good_return_note(SUPPLIER_ID, DATE_RETURNED) VALUES ('$supplier','$date') returning ID into :idNumber";
//ocibind by name-Binds a PHP variable to an Oracle placeholder
//":idNumber" is a oracle placeholder for whaat we have added.
//it holds the grnid that was just added so that it can bind it 
//into the php variable i.e $idNumber
$stid = oci_parse($conn, $sql);
//Binds a PHP variable to an Oracle placeholder
oci_bind_by_name($stid, ":idNumber", $idNumber);
oci_execute($stid);

$grnid=$idNumber;

$productname=$_POST['productname']??"";
$quantity=$_POST['quantity']??"";
$price=$_POST['price']??"";
$reason=$_POST['reason']??"";
$count=0;//to make sure the product name,price,reason and the quantity are of the same index
//looping through product name because they are array inputs.
foreach ($productname as $product){
    $sql = "INSERT INTO grn_details(GRN_ID, PRODUCT_NAME, QUANTITY, PRODUCT_PRICE, REASON) VALUES ('$grnid','$product','$quantity[$count]','$price[$count]','$reason[$count]')";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    $count++;
}
header("location:../GRN.php?add=success");
