<?php
include "Db.php";
include "Session.php";
?>

<!DOCTYPE html>
<html lang="en" and dir="ltr">
<head>
<meta charset="utf-8">

<title> Main page</title>
<link rel="stylesheet" href="Style.css" type="text/css">
<script src="Functions.js"></script>
<script src="https://kit.fontawesome.com/f091d61524.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" type="image/png" href="Pics/home.png">
<script>var counter = 0;</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-color: aliceblue;">


<ul class="topnav">
    <li><a class="active" href="Home.php">Home</a></li>
    <li><a href="Users.php">Users</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#contact">Contact</a></li>
    <li class="right"><a href="Logout.php">Logout</a></li>
    <li class="right"><a>Welcome, <?php echo $_SESSION['username']; ?></a></li>
    
</ul>

<div style="overflow-x: auto;">

    <h1 id="tbl_name">Table of users</h1>

    <table id="customers">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Info   <i class="fas fa-user-times" onclick="del(counter);"></i></th>
        </tr>
    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)) 
    {
    if($row['image_url'] != NULL){
        echo"
        <div class='Ucard' name='u_edit8' id='u_edit9' style='max-width: 500px; display: none;  width: 90%;'>
        <h2>Change info</h2>
                <form method='POST' id='user_info' name='user_info' action='Info.php?user_c=$row[username]' enctype='multipart/form-data'>
                <label for='username'><b>Username</b></label><br>
                <input type='text' placeholder='Change Username' id='usrn' name='usrn' onchange='Lgth();' required><br>
            
                <label for='email'><b>Email</b></label>
                <input type='text' placeholder='Change Email (someone@adress.com)' name='ema' id='ema' pattern='[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[a-z]{2,3}$' required>

                    <button type='submit' id='ui_submit' name='ui_submit' value='Change'>Submit</button> 

                </form>
        </div>";


        echo"<link rel='stylesheet' href='Style.css' type='text/css'>";
        echo "<div class='Hcard' style='max-width: 500px; width: 90%; display: none;' name='c-card8' id='c-card9'>
        <img src='Uploads/$row[image_url]' alt='Upload your picture & Fill in your info' style='width:100%;'>
        <div class='user-container' name='uc-card8' id='uc-card9' style='display: none;'>
            <h4><b>$row[name] $row[surname]</b></h4>
            <p>$row[job]</p>
        </div>
        </div>
        ";

        echo "<script type='text/javascript'>
        var x = 'c-card'+counter;
        var y = 'uc-card'+counter;
        var w = 'u_edit'+counter;
        document.getElementById('u_edit9').id=w;
        document.getElementById('c-card9').id=x;
        document.getElementById('uc-card9').id=y;
        </script>
        ";
            
        echo "<tr>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td><img src='Pics/info.png' alt='info' style='width='30px;' height='30px;'' id='u_image' name='u_image' onclick='f(id,counter);'</img>
        ";
        if ($_SESSION['user_type'] == 'admin' ){ 
            echo"
            <style>
            ul.topnav {background-color: #00008B;}
            </style>
            <i class='fas fa-edit' id='u_change' name='u_change' onclick='admin_f(id,counter);'></i>
            </td></tr>";   
            
        }
        else if($_SESSION['user_type'] == 'user' ){
            echo"
            <style>
            .fa-edit {opacity: 0.6; cursor: not-allowed;}
            </style>
            <div class='tooltip'>
                <i class='fas fa-edit' id='u_change' name='u_change'></i>
                <span class='tooltiptext'>You don't have permission!</span>
            </div></td></tr>";
        }
        
        echo 
        "<script type='text/javascript'>
        var z = 'u_image'+counter;
        var zx = 'u_change'+counter;
        document.getElementById('u_change').id=zx;
        document.getElementById('u_image').id=z;
        </script>";
        echo "<script type='text/javascript'>counter++;</script>";

    }
}
    ?>
    </table>
</div>
</body>

<footer style="background-color: lightgray;">

<hr>

<p id="about"><span style="float: left; margin-left: 30px;">About</span>Copyright Mihael Baresic 2021</p>

<hr>
<p id="contact"><span style="float: left; margin-left: 30px;">Contact</span>mihael.baresic@gmail.com </p>
<hr>


</footer>

</html>
