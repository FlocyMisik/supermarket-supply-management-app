<?php
include_once "include/session.inc.php"
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
    margin-top: 10px;
    margin-bottom: 50px;
    max-width: 90%;
    max-height: 50%;
    width: 500px;
    border: 1px solid black;
    transform: translate(10%, 50%);
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
<h2 class="h4">Register New Category</h2>
    <form onsubmit="return validate()"  action="include/registernewcategory.inc.php" method="POST">
  
  <div class="container-1">
    <label for="Category Name">Category Name</label>
    <input type="text" class="form-1" id="categoryname" name="categoryname">
    <p class="error" id="errcategoryname" style="display: none;">Category name cannot be null</p>
  </div>
  

  <button type="submit" class="btn"> Add+</button>
</form>
</div>

<script>
  function validate(){
    var categoryname=document.getElementById("categoryname").value;
let errcount=0;

if(categoryname==""){
  document.getElementById("errcategoryname").style.display="block";
  errcount++;
    }
    else{
      document.getElementById("errcategoryname").style.display="none";
    }
    if(errcount>0){
      return false;
    }
  }
  
  
  </script>

</body>
</html>
