<?php
require_once("includes/conn.php");
session_start();


if (isset($_POST['save'])) {
    $user    = $_POST['user'];
    $password = $_POST['password'];



    //check if the email & password in DB
    $query  = "select * from admin where adminName = '$user' AND adminPass = '$password'";
    $result = mysqli_query($conn, $query);
    $admin  = mysqli_fetch_assoc($result);


    // check if user exist  
    if (isset($admin['adminId'])) {
        $_SESSION['id'] = $admin['adminId'];
        header("location:index.php");
    } else {
        $_SESSION['error'] = "user not found";
        header("location:login.php");
        return;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>itorchDashboard</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="" href="">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />

</head>
<div class="login p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20" style="text-align: center;">Login</h2>
    <form method="post">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-15" type="text" name="user" id="user"
            placeholder="User Name" required />
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-15" type="password" name="password" id="password"
            placeholder="Password" required />
        <?php if (isset($_SESSION['error'])) {
            echo '<p style="padding: 12px;
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 6px;">' . $_SESSION['error'] . "</p>\n";
            unset($_SESSION['error']);
        }
        ?>

        <input class="save d-block fs-14 bg-green c-white b-none w-full p-10 rad-6" type="submit" value="Save"
            name="save" />
    </form>
</div>

</body>

</html>