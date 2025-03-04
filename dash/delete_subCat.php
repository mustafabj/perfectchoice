<?php
if ($_GET['id']) {
    require_once("includes/conn.php");

    $query = "delete from subcat where subId ={$_GET['id']}";

    mysqli_query($conn, $query);

    header("location:manageSubCat.php");
} else {
    header("location:manageSubCat.php");
}