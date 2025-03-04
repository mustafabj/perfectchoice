<?php
if ($_GET['id']) {
    require_once("includes/conn.php");

    $query = "delete from admin where adminId ={$_GET['id']}";

    mysqli_query($conn, $query);

    header("location:manageAdmin.php");
} else {
    header("location:manageAdmin.php");
}