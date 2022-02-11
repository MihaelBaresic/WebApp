<?php
include "Db.php";
session_start();


if(isset($_SESSION['id'])  && isset($_SESSION['username'])) {
    ?>
     <?php

}
else {
    header("Location: Index.php");
    exit();
}
?>