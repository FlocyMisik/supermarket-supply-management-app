<?php
include_once "connection.inc.php";

$productname=$_POST['productname']??"";
$quantity=$_POST['quantity']??"";

$sql="SELECT * FROM GOODS WHERE PRODUCT_NAME='$productname'";
$stis=ociparse($conn,$sql);
ociexecute($stis);

//fetch details of product the user has entered an id
//oci_both-return an array with both numeric and associative indexes
//numeric-an array with numeric indexes
//associative- an array where each key has its own specific values
$product=oci_fetch_array($stis, OCI_BOTH);

if(empty($product)){
    header("location:../sell.php?notify=not_exist");
}
else{
//$product['quantity'] is the  current quantity of the product in the database
$current_qty=$product['QUANTITY'];

if($current_qty<$quantity){
    header("location:../sell.php?notify=excess");
}
else{

$new_qty=$current_qty-$quantity;

$sql="UPDATE GOODS SET QUANTITY='$new_qty' WHERE PRODUCT_NAME='$productname'";
$stis=ociparse($conn,$sql);
ociexecute($stis);

//time function used to get the current time
$t = time();
$sales_date=date('d-M-y',$t);

//insert the details of the above selected item to the sales table
$product_id=$product['PRODUCT_ID'];
$price=$product['PRICE'];
$product_name=$product['PRODUCT_NAME'];
$category=$product['CATEGORY'];

$sql="INSERT INTO SALES (SALES_DATE,PRODUCT_ID,QUANTITY,PRICE,PRODUCT_NAME,CATEGORY) VALUES('$sales_date','$product_id','$quantity','$price','$product_name','$category')";
$stis=ociparse($conn,$sql);
ociexecute($stis);


header("location:../sales.php?sale=success");
}
}


