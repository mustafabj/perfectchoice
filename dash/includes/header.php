<?php
require_once("includes/conn.php");
session_start();

if (!isset($_SESSION['id'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfect Choice Dashboard</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" href="imgs/PerfectChoicelogo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="page d-flex">
        <div class="sidebar bg-white  p-relative ">
            <h3 class="dActive p-relative txt-c mt-0">Perfect Choice Dashboard</h3>

            <ul class="dActive">
                <li>
                    <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
                        <i class="fa-solid fa-plus"></i>
                        <span>Add Products</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="managePro.php">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Manage Product </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="manageCat.php">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Manage Category</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="manageSubCat.php">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Manage Sub Category</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="prand.php">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Manage Prand</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="promotion.php">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Manage promotion</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="manageAdmin.php">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Manage Admin</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="logout.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>logOut</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="content w-full">
            <!-- Start Head -->

            <div class="head bg-white p-15 between-flex">
                <div class="humburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="search p-relative">
                    <input onkeyup="search()" class="p-10" type="search" name="search" id="search"
                        placeholder="Find a product " />
                </div>

            </div>
            <script src="js/main.js"></script>

            <!-- End Head -->