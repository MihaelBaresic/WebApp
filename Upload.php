<?php
include "Db.php";
include "Session.php";

//if database is connected or not
if(mysqli_connect_error()){
    exit('Error connecting to the database' . mysqli_connect_error());
}

$usern = ($_SESSION['username']);
    if (isset($_POST['u_submit']) && isset ($_FILES['my_image'])) {
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $img_name = $_FILES['my_image']['name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");
        if(in_array($img_ex_lc, $allowed_exs))
        {
            $new_img_name = uniqid("IMG-", true). '.'.$img_ex_lc;
            $img_upload_path = 'Uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $sqlq = "SELECT * FROM users WHERE username='$_SESSION[username]'";
                $result = mysqli_query($con, $sqlq);
                if(mysqli_num_rows($result) > 0) 
                {
                    $row = mysqli_fetch_assoc($result);
                    if($row['surname'] != NULL){ 
                        $sql ="UPDATE users SET image_url = '$new_img_name',job='$_POST[u_job]'  WHERE username = '$usern'";
                    }else{
                        $sql = "UPDATE users SET image_url = '$new_img_name', surname='$_POST[u_surname]',
                        name='$_POST[u_name]', job='$_POST[u_job]'  WHERE username = '$usern'";
                    }
                }
            $con->query($sql);
            header("Location: Users.php");
        }
    }
    else {
        echo "Error";
    }

?>