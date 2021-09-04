<?php
include_once "include/connection.inc.php";
include_once "include/session.inc.php"
?>

<?php
$sql="SELECT * FROM CATEGORIES";
$stid=ociparse($conn,$sql);
ociexecute($stid);

?>

<?php
$sql="SELECT * FROM GOODS";
$stil=ociparse($conn,$sql);
ociexecute($stil);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sell</title>
    <link rel="stylesheet" href="home.css">
</head>

    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
        max-height: 50%;
    font-family: sans-serif;
    /* background-color: #7ed6df;
    background-image: linear-gradient(315deg, #7ed6df 0%, #000000 100%); */
 }
      .container{
        background-color: white;
    margin: auto;
    margin-top: 30px;
    margin-bottom: 50px;
    max-width: 90%;
    max-height: 50%;
    width: 500px;
    border: 1px solid black;
  } 
   .container form{
    width: 100%;
    height: 70%;
    padding: 20px;
    background: white;
    
  
  }
  .container h2{
    text-align: center;
    margin-bottom: 10px;
    color: #222;
    margin-top: 30px;
    text-transform: uppercase;
  }
  .container p{
    text-align: center;
    margin-bottom: 24px;
    color: #222;
}
.notify{
  color: red;
  text-align: center;
}
.container form .form-1{
width: 100%;
height: 40px;
background: white;
border-radius: 4px;
border: 1px,silver;
margin: 10px 0 18px 0;
padding: 0 10px;
text-align: center;
margin-bottom: 10px;


}
.container form .btn{
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
</style>
</head>
<?php
include_once "include/menu.inc.php";

?>

<div class="container">
<h2 class="h4">Sell</h2>
    <form action="include/sell.inc.php" method="POST">

    <div class="container-1">
      <?php 
      if(isset($_REQUEST['notify'])){
        if($_REQUEST['notify']=='not_exist'){
      ?>
        <h3 class="notify"> Product does not exist</h3>
        <?php
        }
        if($_REQUEST['notify']=='excess'){
        ?>
        <h3 class="notify">Product quantity is less that what you have entered</h3>
        <?php
        }
      }
        ?>
      </div>

      <div class="container-1">
    <label for="Product Name">Product Name</label>
    <select class="form-1" id="productname" name="productname">
    <option value="">--select--</option>

      <?php

    while (($row = oci_fetch_array($stil, OCI_BOTH)) != false) {
    ?>
            <option value="<?= $row['PRODUCT_NAME']?>"><?= $row['PRODUCT_NAME']?>
 <?php
    }
 ?>
    </select>
    

  </div>

  
  <div class="container-1">
    <label for="Quantity">Quantity</label>
    <input type="text" class="form-1" id="quantity" name="quantity">

   </div> 
  
  <button type="submit" class="btn"> sell</button>
</form>
</div>

</body>
</html>