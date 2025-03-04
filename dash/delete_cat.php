<?php
if ($_GET['id']) {
    require_once("includes/conn.php");

    $query = "delete from category where catId ={$_GET['id']}";

    mysqli_query($conn, $query);

    header("location:manageCat.php");
} else {
    header("location:manageCat.php");
}