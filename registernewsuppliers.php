<?php
include_once "include/session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new supplier</title>
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
    transform: translate(5%, 10%);
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
  
  
} .error{
  /*used to add more importance to a property,
  overrides all previous styling tools.*/
  color: red !important;
}


    </style>
</head>
<body>
<?php
include_once "include/menu.inc.php";

?>

<div class="container">
<h2 class="h4">Register New supplier</h2>
    <form id="regsupplier" onsubmit="return validate()" action="include/registernewsupplier.inc.php" method="POST">
  
  <div class="container-1">
    <label for="Supplier Name" >Supplier Name</label>
    <input type="text" class="form-1" id="suppliername" name="suppliername">
    <p class="error" id="errsuppliername" style="display: none;">Supplier name cannot be null</p>
  </div>
  <div class="container-1">
    <label for="Contact number" >Contact Number</label>
    <input type="number" class="form-1" id="contactnumber" name="contactnumber">
    <p class="error" id="errcontactnumber" style="display: none;">Contact number cannot be null</p>
    <p class="error" id="errcontactname" style="display: none;">Invalid contact number</p>
  </div>
  
  <div class="container-1">
    <label for="email address" >Email Address</label>
    <input type="email" class="form-1" id="email" name="email">
    <p class="error" id="erremail" style="display: none;">Email cannot be null</p>
    <p class="error" id="erremailname" style="display: none;">invalid email </p>
  </div>
  
  <button type="submit" class="btn" onclick="validate()"> Add+</button>
</form>
</div>
<script>
function validate() {
    
      
    var suppliername = document.getElementById("suppliername").value;
    var contactnumber = document.getElementById("contactnumber").value;
    var email= document.getElementById("email").value;
    let errcount=0;
    

    
    if(suppliername==""){
      document.getElementById("errsuppliername").style.display="block";
      errcount++;
    }
    else{
      document.getElementById("errsuppliername").style.display="none";
    }
    
    if(contactnumber==""){
      document.getElementById("errcontactnumber").style.display="block";
      errcount++;
    }
    else{
      document.getElementById("errcontactnumber").style.display="none";
    }
    
    if(email==""){
      document.getElementById("erremail").style.display="block";
      errcount++;
    }
    else{
      document.getElementById("erremail").style.display="none";
    }
    if(email.indexOf(".")==-1|| email.indexOf("@")==-1){
      document.getElementById("erremailname").style.display="block";
      errcount++;
    }
    else{
      document.getElementById("erremailname").style.display="none";
    }
    
    if(isNaN(contactnumber)||contactnumber.length<10){
      document.getElementById("errcontactname").style.display="block";
      errcount++;
    }
    else{
      document.getElementById("errcontactname").style.display="none";
    }
    
    
    //If number of errors is more than 0 return false
    if(errcount>0){
      return false;
    }
}


  </script>

</body>
</html>