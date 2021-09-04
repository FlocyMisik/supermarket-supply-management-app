<?php
include_once "connection.inc.php";

$productname=$_POST['productname']??"";
$quantity=$_POST['quantity']??"";

$sql="SELECT * FROM GOODS WHERE PRODUCT_NAME='$productname'";
$stid=ociparse($conn,$sql);
ociexecute($stid);

//fetch details of product the user has entered an id
$product=oci_fetch_array($stid, OCI_BOTH);
if(empty($product)){
    header("location:../transferwarehousestock.php?removed=not_exist");

}
else{
//$product['warehousequantity'] is the  current quantity of the warehouse stock in the database
$current_warehouse_qty=$product['WAREHOUSE_QUANTITY'];
if($current_warehouse_qty<$quantity){
    header("location:../transferwarehousestock.php?removed=excess");
}
else{
    //Available stock quantity before transfer
$current_available_stock_qty=$product['QUANTITY'];

//Get the new warehouse QTY after I transfer
$new_warehouse_qty=$current_warehouse_qty-$quantity;

//Get the new Available stock QTY after transfer
$new_available_stock_qty=$current_available_stock_qty+$quantity;

//I update the GOOD table 1.e the avaialbe stock QTY(quantity) and the warehorse_quantity
$sql="UPDATE GOODS SET QUANTITY='$new_available_stock_qty',WAREHOUSE_QUANTITY='$new_warehouse_qty' WHERE PRODUCT_NAME='$productname'";
$stid=ociparse($conn,$sql);
ociexecute($stid);

//insert into the warehouse_transfer table
$date_transfered=date('d-M-y');

$sql="INSERT INTO WAREHOUSE_TRANSFER(PRODUCT_NAME,DATE_TRANSFERED,QUANTITY_DELIVERED) 
VALUES('$productname','$date_transfered','$quantity')";
$stid=ociparse($conn,$sql);
ociexecute($stid);

header("location:../warehouse.php?removed=success");
}
}

