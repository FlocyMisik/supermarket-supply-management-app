<?php
include_once "include/session.inc.php";
include_once "include/connection.inc.php";
$sql="SELECT * FROM CATEGORIES";
$stid=ociparse($conn,$sql);
ociexecute($stid);
?>
<?php
include_once "include/connection.inc.php";
$sql1="SELECT * FROM GOODS";
$stil=ociparse($conn,$sql1);
ociexecute($stil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new stock</title>
    <link rel="stylesheet" href="home.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
        max-height: 50%;
    font-family: sans-serif;
    
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
    background-image: linear-gradient(315deg, #7ed6df 0%, #000000 74%);
    cursor: pointer;
    font-size: 16px;
    text-transform: uppercase;
    color: white; 
    /*items are positioned to the center of the container */
   justify-content: center;
  align-items: center;
  
  
} 
.error{
  /* !important used to add more importance to a value */
  color: red !important;
}


    </style>
</head>
<body>

<?php
include_once "include/menu.inc.php";

?>
<div class="container">
<h2 class="h4">Register New stock</h2>
    <form id="regNewStock" onsubmit="return validate()" action="include/registernewstock.inc.php" method="POST" name="regnewstock">

  <div class="container-1">
    <label for="Product Name"> Product Name</label>
    <input type="text" class="form-1" id="productname" name="productname">
    <p class="error" id="errproductname" style="display: none;">Product name cannot be null</p>
  </div>
  <div class="container-1">
    <label for="Quantity">Quantity</label>
    <input type="text" class="form-1" id="quantity" name="quantity">
    <p class="error" id="errquantity" style="display: none;">Quantity cannot be null</p>

  </div>
  <div class="container-1">
    <label for="price">Price</label>
    <input type="text" class="form-1" id="price" name="price">
    <p class="error" id="errprice" style="display: none;">Price cannot be null</p>

  </div>
  <div class="container-1">
    <label for="Date Delivered"> Date Delivered</label>
    <input type="date" class="form-1" id="datedelivered" name="datedelivered">
    <p class="error" id="errdatedelivered" style="display: none;">Date delivered cannot be null</p>

  </div>
  <div class="container-1">
    <label for="Expiry Date">Expiry Date</label>
    <input type="date" class="form-1" id="expirydate" name="expirydate">
    <p class="error" id="errexpirydate" style="display: none;">Expiry date cannot be null</p>
    <p class="error" id="errname" style="display: none;">Invalid expiry or delivery date</p>
  </div>
  <div class="container-1">
    <label for="Category">Category</label>
    <select class="form-1" id="category" name="category">
    <option value="">--select--</option>

      <?php
      //returns an array that corresponds to the fetched row
    //OCI_BOTH-returns an array with both numeric and associative indexex
    //associative array is an array where each key has its own specific value

    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    ?>
            <option value="<?= $row['CATEGORY_NAME']?>"><?= $row['CATEGORY_NAME']?>
 <?php
    }
 ?>
    </select>
    

  </div>
  
  <p class="error" id="errcategory" style="display: none;">Category cannot be null</p> 
  <button type="submit"class="btn"> Add+</button>
  
</form>
</div>
<script>
  function validate() {
    
      
      var productname = document.getElementById("productname").value;
      var quantity = document.getElementById("quantity").value;
      var price = document.getElementById("price").value;
      var datedelivered = document.getElementById("datedelivered").value;
      var expirydate = document.getElementById("expirydate").value;
      var category = document.getElementById("category").value;
      

      let errcount=0;
      

      
      if(productname==""){
        document.getElementById("errproductname").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errproductname").style.display="none";
      }
      
      if(quantity==""){
        document.getElementById("errquantity").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errquantity").style.display="none";
      }
      
      if(price==""){
        document.getElementById("errprice").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errprice").style.display="none";
      }
      if(datedelivered==""){
        document.getElementById("errdatedelivered").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errdatedelivered").style.display="none";
      }
      
      if(expirydate!=""){
          if(expirydate<=datedelivered){
          document.getElementById("errname").style.display="block";
          errcount++;
        }
        else{
          document.getElementById("errname").style.display="none";
        }
      }
      if(category==""){
        document.getElementById("errcategory").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errcategory").style.display="none";
      }
      
      
      //If number of errors is more than 0 return false
      if(errcount>0){
        return false;
      }
  }

</script>



</body>
</html>