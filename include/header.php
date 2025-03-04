<?php
require_once("include/conn.php");
if (isset($_POST['search']) && $_POST['search'] != "") {
    header("location:search.php?search={$_POST['search']}");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="image/itorchSmall.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&#038;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <!-- HTML Meta Tags -->
    <title>itorch jo | Computers & Electronics Store in Amman - Jordan</title>
    <meta name="description"
        content="itorch jo megastore the most modern shop for electronic devices and Video games and Computer Accessories and Computing Equipment and pc gaming store in Amman itorch jo is a leader computers & electronics store in Amman Jordan, Specialized in computers, laptops,playstation,xbox servers , offering the best price and the best service in Jordan .">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="itorch  jo | Computers & Electronics Store in Amman - Jordan">
    <meta itemprop="description"
        content="itorch jo megastore the most modern shop for electronic devices and Video games and Computer Accessories and Computing Equipment and pc gaming store in Amman itorch jo is a leader computers & electronics store in Amman Jordan, Specialized in computers, laptops,playstation,xbox servers , offering the best price and the best service in Jordan .">
    <meta itemprop="image" content="https://itorchjo.com/../image/itorchStore.jpg">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://itorchjo.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="itorch  jo | Computers & Electronics Store in Amman - Jordan">
    <meta property="og:description"
        content="itorch jo megastore the most modern shop for electronic devices and Video games and Computer Accessories and Computing Equipment and pc gaming store in Amman itorch jo is a leader computers & electronics store in Amman Jordan, Specialized in computers, laptops,playstation,xbox servers , offering the best price and the best service in Jordan .">
    <meta property="og:image" content="https://itorchjo.com/../image/itorchStore.jpg">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="itorch  jo | Computers & Electronics Store in Amman - Jordan">
    <meta name="twitter:description"
        content="itorch jo megastore the most modern shop for electronic devices and Video games and Computer Accessories and Computing Equipment and pc gaming store in Amman itorch jo is a leader computers & electronics store in Amman Jordan, Specialized in computers, laptops,playstation,xbox servers , offering the best price and the best service in Jordan .">
    <meta name="twitter:image" content="https://itorchjo.com/../image/itorchStore.jpg">


</head>

<body>
    <!-- start Scroll-top  -->
    <div class="scroll-to-top">
        <span class="up"></span>
    </div>
    <!-- End Scroll-top  -->
    <header>
        <div class="container">
            <div class="logo">
                <a href="https://itorchjo.com">
                    <img src="image/itorchLogo.png" alt="" srcset="" /></a>
            </div>
            <form method="post">
                <div class="search">
                    <input type="text" placeholder="Find Product" name="search" />
                    <button>
                        <i class="fa fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            <div class="lang">
                <a href="https://itorchjo.com/Ar/">العربية</a>
            </div>
        </div>
    </header>
    <section class="SecCategory">
        <button class="pre-btn"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="nxt-btn"><i class="fa-solid fa-chevron-right"></i></button>

        <div class="Category container">
            <?php
            $query = "select * from category";
            $result = mysqli_query($conn, $query);
            while ($Category  = mysqli_fetch_assoc($result)) {
                echo "<div class='catCard'>
                <a href='shop.php?catId={$Category['catId']}'><i class='{$Category['catIcon']}'></i>{$Category['catName']}</a>
            </div>";
            }

            ?>


        </div>
    </section>