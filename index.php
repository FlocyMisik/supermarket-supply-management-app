<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            
            height: 800px;
            font-family: sans-serif;
            
            background-position: center;
            background-size: cover;

            background-repeat: no-repeat;
            
        }

        .container {
           height: 450px;
    
            width: 500px;
            border: 1px solid black;
            margin: auto;

        }

        .container form {
            width: 100%;
            height: 100%;
            padding: 20px;
            background: white;
            text-align: center;

        }

        .container h1 {
            text-align: center;
            margin-bottom: 24px;
            color: #222;
        }

        .container p {
            text-align: center;
            margin-bottom: 24px;
            color: #222;
        }

        .container form .form-1 {
            width: 100%;
            height: 40px;
            background: white;
            border-radius: 4px;
            border: 1px, silver;
            margin: 10px 0 18px 0;
            padding: 0 10px;
            text-align: center;
            margin-bottom: 20px;


        }

        .container form .btn {
            margin-left: 10%;
            width: 120px;
            height: 34px;
            border: none;
            background-color: #7ed6df;
            background-image: linear-gradient(315deg, #7ed6df 0%, #000000 74%);
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
.head{
    text-transform: uppercase;
    width: 100%;
    margin: 30px 0px;;
    text-align: center;

}


    </style>


</head>

<body>




<h2 class="head">Supermarket stock supply management system</h2>
<div class="container">

    <form name="form1" onsubmit=" return validate()" action="include/index.inc.php" method="POST">
        <h1>Welcome Back</h1>
        <div class="container-1">
            <label for="Email Addres">Email Address
                <input type="text" name="email" class="form-1" id="name">
            </label>
        </div>
        <div class="container-1">
            <label for="Password">Password <input type="password" name="password" class="form-1" id="pass"></label>
        </div>
        <div class="container-1">
      <label for="cars">Designation:</label>
      <select name="designation" id="designation" class="form-1">
        <option value="--select--">--select--</option>
        <option value="Manager">Manager</option>
        <option value="stock Manager">Stock Manager</option>
        <option value="Purchasing Admin">Purchasing Admin</option>
        <option value="Warehouse Manager">Warehouse Manager</option>
      </select>
    </div>
        <div>
            <button type="submit" name="signin" class="btn" id="btn">Sign in</button>

        </div>
        <p>Don't have an account?<a href="http://127.0.0.1:5501/signup.html" target="_self"> Sign up</a></p>
    </form>
    
</div>

<script type="text/javascript">
    //validating input
    function validate() {
        var username = document.getElementById("name").value;
        var password = document.getElementById("pass").value;
        // var passw = /^[A-Za-z]\w{7,14}$/;
        if (username == null || username == "") {
            alert("Please enter the username.");
            return false;
        }
        if (password == null || password == "") {
            alert("Please enter the password.");
            return false;
        }
    }
</script>
</body>
</html>