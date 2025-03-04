<?php
if ($_GET['id']) {
    require_once("includes/conn.php");

    $query = "delete from promotion where promotionId ={$_GET['id']}";

    mysqli_query($conn, $query);

    header("location:promotion.php");
} else {
    header("location:promotion.php");
}