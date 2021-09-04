<?php
include_once "connection.inc.php";


//strtotime returns a UNIX timestamp value for the given date string.
$validdate = date('d-M-y', strtotime($_POST['validdate']??""));
$date= date('d-M-y');
//return into-allows one to return column values
$sql = "INSERT INTO local_purchasing_order(LPO_DATE, VALID_UP_TO_DATE) VALUES ('$date','$validdate') returning LPO_ID into :idNumber";

$stid = oci_parse($conn, $sql);
//ocibind by name-Binds a PHP variable to an Oracle placeholder
//":idNumber" is a oracle placeholder for whaat we have added.
//it holds the grnid that was just added so that it can bind it 
//into the php variable i.e $idNumber
oci_bind_by_name($stid, ":idNumber", $idNumber);
oci_execute($stid);

$lpoid=$idNumber;

//Fetch the post data of the array inputs
$productname=$_POST['productname']??"";
$supplier=$_POST['supplier']??"";
$quantity=$_POST['quantity']??"";
$count=0;
// loop through the productname array of post data
foreach ($productname as $product){
    $sql = "INSERT INTO lpo_details(LPO_ID, PRODUCT_NAME, QUANTITY,SUPPLIER_ID) VALUES ('$lpoid','$product','$quantity[$count]','$supplier[$count]')";

    $stid = oci_parse($conn, $sql);
    oci_execute($stid);

    $count++;
}
 header("location:../LPO.php?add=success");
