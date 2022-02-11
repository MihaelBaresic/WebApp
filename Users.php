<?php
include "Db.php";
include "Session.php";
?>

<!DOCTYPE html>
<html lang="en" and dir="ltr">
<head>
<meta charset="utf-8">

<title>Users config</title>
<link rel="stylesheet" href="Style.css" type="text/css">
<link rel="shortcut icon" type="image/png" href="Pics/users.png">
<script src="Functions.js"></script>
<script src="https://kit.fontawesome.com/f091d61524.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="background-color: aliceblue;">
 
    
<ul class="topnav">
    <li><a class="active" href="Users.php">Users</a></li>
    <li><a href="Home.php">Home</a></li>
    <li class="right"><a href="Logout.php">Logout</a></li>
    <li class="right"><a>Welcome, <?php echo $_SESSION['username']; ?></a></li>
</ul>

<?php

$sql = "SELECT * FROM users WHERE username='$_SESSION[username]'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0) 
{
    $row = mysqli_fetch_assoc($result);
    if(($row['id'] === $_SESSION['id']))
    {
        $_SESS['surname'] = $row['surname'];
        $_SESS['name'] = $row['name'];
        $_SESS['job'] = $row['job'];
        $_SESS['image_url'] = $row['image_url'];
    }
}

    if($_SESS['surname'] != NULL)
    {
        
    echo"
    <div class='user-config'>
        <div class='card' style='max-width: 500px; width: 90%;'>
        <h3 style='margin-left: 10px;'>User info preview</h3>
        <img src='Uploads/$_SESS[image_url]' alt='Upload your picture & Fill in your info' style='width:100%;'>
        <div class='user-container'>
            <h4><b>$_SESS[name] $_SESS[surname]</b></h4>
            <p>$_SESS[job]</p>
        </div>
        </div>
    ";
    }
    else{
    echo"
    <div class='user-config'>
        <div class='card' style='max-width: 500px; width: 90%;'>
        <h3 style='margin-left: 10px;'>User info preview</h3>
        <img src='Pics/user.png' alt='Upload your picture & Fill in your info' style='width:100%;'>
        <div class='user-container'>
            <h4><b>Name Surname</b></h4>
            <p>Job</p>
        </div>
        </div>
    ";
    }

?>

    <div class="card-2" id="card-2" style="max-width: 500px; width: 90%;">
    <h2>Insert your info</h2>
    <p><b>Once inserted name&surname can't be changed!</b></p>
            <form method="POST" id="user_form" name="user_form" action="Upload.php" enctype="multipart/form-data">
                <label for="name">Name</label><br>
                <input type="text" placeholder="Enter Name" id="u_name" name="u_name" Lgth()required><br>
                
                <label for="surname">Surname</label><br>
                <input type="text" id="u_surname" placeholder="Enter Surname" name="u_surname" required><br>

                <label for="job">Job</label></br>
                <input type="text" id="u_job" placeholder="Enter Job" name="u_job" required><br>
                
                <label for="picture">Picture</label></br>
                <input type="file" id="my_image" name="my_image" accept="image/png, image/jpeg" required><br> 

                <button type="submit" id="u_submit" name="u_submit" value="Upload">Submit</button> 

            </form>
    </div>
    
</div>

<?php
    if ($_SESS['surname'] == NULL ){
        echo"<script type='text/javascript'>document.getElementById('u_name').setAttribute('enabled','enabled');</script>";
        echo"<script type='text/javascript'>document.getElementById('u_surname').setAttribute('enabled','enabled');</script>";
    }
    else{
        echo"<script type='text/javascript'>document.getElementById('u_name').setAttribute('disabled','disabled');</script>";
        echo"<script type='text/javascript'>document.getElementById('u_surname').setAttribute('disabled','disabled');</script>";
    }
?>

</body>

</html>
