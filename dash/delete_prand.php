<?php
if ($_GET['id']) {
    require_once("includes/conn.php");

    $query = "delete from prand where prandId ={$_GET['id']}";

    mysqli_query($conn, $query);

    header("location:prand.php");
} else {
    header("location:prand.php");
}