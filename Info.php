<?php
include "Db.php";

$sqlc = "SELECT * FROM users WHERE username='$_GET[user_c]'";
                $result = mysqli_query($con, $sqlc);
                if(mysqli_num_rows($result) > 0) 
                {
                    $row = mysqli_fetch_assoc($result);
                    
                    $sql = "UPDATE users SET username = '$_POST[usrn]', email='$_POST[ema]' WHERE username='$_GET[user_c]'";
                        
                
                $con->query($sql);
                header("Location: Home.php");
                }
                else{
                    echo"error";
                }

?>