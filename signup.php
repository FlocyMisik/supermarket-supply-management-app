
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        
*{
        margin: 0;
        padding: 0;
        /*allows us to include the padding and border in a 
        elements total width and height*/
        box-sizing: border-box;
      }
      body{
        /*defines the minimum height of an element*/ 
        min-height: 100%;
        /*set how a flex item will fit the space available in its flex container*/
    display: flex;
    font-family: sans-serif;
    /* aquamarine*/
    background-color: #7ed6df;
    /* #0000000-black*/
    background-image: linear-gradient(315deg, #7ed6df 0%, #000000 74%);
    

      }
      .container{
        /*horizontally center an element within its container*/
    margin: auto;
    /*set the maximum width of an element */
    max-width: 90%;
    width: 500px;
    border: 1px solid black;
  }
  .container form{
    width: 100%;
    height: 100%;
    padding: 20px;
    background: white;
    
  
  }
  .container h1{
    text-align: center;
    margin-bottom: 24px;
    color: #222;
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
/*rounds the corners of an elements outer boarder edge */
border-radius: 4px;
border: 1px,silver;
margin: 10px 0 18px 0;
padding: 0 10px;
text-align: center;
margin-bottom: 10px;


}
.container form .btn{
    margin-left: 30%;
    margin-bottom: 20px;
    width: 120px;
    height: 34px;
    border: none;
    background-color: #7ed6df;
    background-image: linear-gradient(315deg, #7ed6df 0%, #000000 74%);
    cursor: pointer;
    font-size: 16px;
    text-transform: uppercase;
    color: white;
    
  /* justify-content: center; */
  align-items: center;
}
  .error{
    /*add more importance to a property */
    color: red !important;
  }
    </style>

</head>

<body>


<div class="container">
 
  <form onsubmit="return validate()" action=" include/signup.inc.php" method="POST">
    <h1>Register</h1>  
    <b><p>Please fill in the required information to create an account.</p></b>
    <div id="error_message "></div>
    <div class="container-1">
      <label for="First Name">First Name <input type="text" name="firstname" class="form-1" id="fname"></label></br></br>
      <p class="error" id="errfirstname" style="display: none;">First name cannot be null</p>
    </div>
    
    <div class="container-1">
      <label for="Second Name">Second Name <input type="text" name="secondname" class="form-1" id="sname"></label></br></br>
      <p class="error" id="errsecondname" style="display: none;">Second name cannot be null</p>
    </div>
    <div class="container-1">
      <label for="Date of Birth">Date of Birth<input type="date" name="dob"  class="form-1" id="dob"></label></br></br>
      <p class="error" id="errdob" style="display: none;">Date of birth cannot be null</p>
      <p class="error" id="errdobname" style="display: none;">Invalid date of biry</p>
    </div>
    <div class="container-1">
      <label for="cars">Gender:</label>
      <select name="gender" id="gender" class="form-1">
        <option value="--select--">--select--</option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
        <option value="Unisex">Unisex</option>
        <option value="Prefer not to say">Prefer not to say</option>
      </select>
      <p class="error" id="errgender" style="display: none;">Gender cannot be null</p>
    </div>
    <div class="container-1">
      <label for="Telephone">Telephone <input type="tel" name="telephone"class="form-1" id="tel"></label></br></br>
      <p class="error" id="errtelephone" style="display: none;">Telephone cannot be null</p>
      <p class="error" id="errtelephonename" style="display: none;">Telephone must be a number</p>
      <p class="error" id="errtelephonenumbername" style="display: none;">Telephone should contain 10 digits</p>
    </div>
   
    <div class="container-1">
      <label for="designation">Designation:</label>
      <select name="designation" id="designation" class="form-1">
        <option value="--select--">--select--</option>
        <option value="Manager">Manager</option>
        <option value="stock Manager">Stock Manager</option>
        <option value="Purchasing Admin">Purchasing Admin</option>
        <option value="Warehouse Manager">Warehouse Manager</option>
      </select>
      <p class="error" id="errdesignation" style="display: none;">Designation cannot be null</p>
    </div>
    
    <div class="container-1">
      <label for="Email Address">Email Address <input type="email" name="email" class="form-1" id="email"></label></br></br>
      <p class="error" id="erremail" style="display: none;">Email cannot be null</p>
      <p class="error" id="erremailname" style="display: none;">Invalid email</p>
    </div>
    
    <div class="container-1">
      <label for="Password">Password <input type="password" name="password1" class="form-1" id="pswd1"></label></br></br>
      <p class="error" id="errpassword1" style="display: none;">Password cannot be null</p>
    </div>
   
    <div class="container-1">
      <label for="Re-type Password">Re-type Password<input type="password" name="password2" class="form-1" id="pswd2"></label></br></br>
      <p class="error" id="errpassword2" style="display: none;">Password cannot be null</p>
      <p class="error" id="errpasswordname" style="display: none;">Passwords must match</p>
    </div>
   
    <div>
      <button type="submit" class="btn">Sign Up</button>
     <b> <p>Already have an account?<a href="http://127.0.0.1:5501/signup.html" target="_self">Sign in</a></p></b>
    </div>
    
    </form>
  
</div>

<script type="text/javascript">
  function validate(){
    var firstname= document.getElementById("fname").value;
var secondname=document.getElementById("sname").value;
var telephone=document.getElementById("tel").value;
var designation=document.getElementById("designation").value;
var email=document.getElementById("email").value;
var password1=document.getElementById("pswd1").value;
var password2=document.getElementById("pswd2").value;
var dateofbirth=document.getElementById("dob").value;
var gender=document.getElementById("gender").value;

let errcount=0;
      

      
      if(firstname==""){
        document.getElementById("errfirstname").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errfirstname").style.display="none";
      }
      
      if(secondname==""){
        document.getElementById("errsecondname").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errsecond").style.display="none";
      }
      
      if(telephone==""){
        document.getElementById("errtelephone").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errtelephone").style.display="none";
      }
      if(designation==""){
        document.getElementById("errdesignation").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errdesignation").style.display="none";
      }
      
          if(dateofbirth==""){
          document.getElementById("errdob").style.display="block";
          errcount++;
        }
        else{
          document.getElementById("errdob").style.display="none";
        }
      if(gender==""){
        document.getElementById("errgender").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errgender").style.display="none";
      }
      if(email==""){
        document.getElementById("erremail").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("erremail").style.display="none";
      }
      if(password1==""){
        document.getElementById("errpassword1").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errpassword1").style.display="none";
      }
      if(password2==""){
        document.getElementById("errpassword2").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errpassword2").style.display="none";
      }
      if(password2 != password1){
        document.getElementById("errpasswordname").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errpasswordname").style.display="none";
      }
      if(isNaN(telephone)){
        document.getElementById("errtelephonename").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errtelephonename").style.display="none";
      }
      if(telephone<10|| telephone>10){
        document.getElementById("errtelephonenumbername").style.display="block";
        errcount++;
      }
      else{
        document.getElementById("errtelephonenumbername").style.display="none";
      }
    if(email.indexOf("@")==-1|| email.indexOf(".")==-1){
        document.getElementById("erremailname").style.display="block";
        errcount++;
      }
      else{  
        document.getElementById("erremailname").style.display="none";
      }
      if(dateofbirth=>today){
        document.getElementById("errdobname").style.display="block";
        errcount++;
      }
      else{  
        document.getElementById("errdobname").style.display="none";
      }
      //If number of errors is more than 0 return false
      if(errcount>0){
        return false;
      }
  }

  </script>
</body>
</html>