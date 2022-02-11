<!DOCTYPE html>
<html lang="en" and dir="ltr">
<head>
<meta charset="utf-8">
<title> Login form</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Style.css" type="text/css">

<script src="Functions.js"></script>
<script src="https://kit.fontawesome.com/f091d61524.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" type="image/png" href="Pics/login.png">

</head>

<body>

<div class="login">
    <div class="col-12 col-s-12">
    <form method="POST" autocomplete="on" id="login_form" name="login_form" action="Login.php">
        <label for="username">Username</label><br>
        <input type="text" placeholder="Enter Username" id="usern" name="usern" required><br>
        
        <label for="password">Password</label><br>
        <input type="password" id="psw" placeholder="Enter Password" name="psw" required><br>
        
        <button type="submit" id="sbmt" value="Login">Login</button> 

    </form>                             
    
    <h4>Don't have an account?</h4> 
    <button onclick="document.getElementById('id01').style.display='block'" id="sign">Sign up</button>
    
    </div>
</div>

<div id="id01" class="modal">
    <form class="modal-content" name="reg_form" id="reg_form" method="POST" autocomplete="on"  action="Register.php">
        <div class="container">
            <h1 style="text-align: center;">Sign up</h1>
            <p style="font-size: larger; ">Please fill in this form to create an account.</p>
            <hr>
            
            <label for="username"><b>Username</b></label><br>
            <input type="text" placeholder="Enter Username" id='username' name="username" onchange="Lgth();" required><br>
            
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email (someone@adress.com)" name="email" id='email' pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,3}$" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id='password' onchange="Confirm();"  required>

            <label for="psw_repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="password_r" id='password_r' onchange="Confirm();"  required>
        
            <div class="clearfix">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" id="submit" value="Register" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>

<script>
    var modal = document.getElementById('id01');
    window.onclick = function(event){
        if (event.target === modal){
            modal.style.display="none";
        }
    }
</script>


</html>
</body>

<?php

if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");</script>';
}

?>
