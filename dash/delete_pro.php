<?php
if($_GET['id']){
require_once("includes/conn.php");

$query = "delete from product where proId ={$_GET['id']}";

mysqli_query($conn,$query);

header("location:managePro.php");
}
else{
    header("location:managePro.php");
}
?>