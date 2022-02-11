<?php
include "Db.php";

//if database is connected or not
if(mysqli_connect_error()){
    exit('Error connecting to the database' . mysqli_connect_error());
}

//to check if any var is empty or not

if(!isset($_POST['username'], $_POST['password'], $_POST['password_r'], $_POST['email'])) {
    exit('Empty Field(s)');
}


if(empty($_POST['username'] || empty($_POST['password'] || empty($_POST['password_r'] || empty($_POST['email']))))) {
    exit('Values empty');
}

if($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0) {
        echo 'Username already taken, try again.';
    }
    else {
        if($stmt = $con->prepare('INSERT INTO Users (username, password, email, user_type) VALUES (?, ?, ?, ?)' )) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_type = 'user';
            $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $user_type);
            $stmt->execute();
            echo"<script type='text/javascript'>window.alert('Succesfully registred, you can now log in.');</script>";
            echo "<script>location.href = 'Index.php';</script>";
        } 
        else{
            echo 'Error occurred!';
        }
    }
    $stmt->close();
}
else{
    echo'Error occured!';
}
$con->close();

?>
