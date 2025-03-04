<?php
require_once("../include/conn.php");
if (isset($_POST['search']) && $_POST['search'] != "") {
    header("location:searchAr.php?search={$_POST['search']}");
} ?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../image/Perfect Choice-01.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/mainAr.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&#038;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <!-- HTML Meta Tags -->
    <title>الخيار المثالي | مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج</title>
    <meta name="description" content="الخيار المثالي  ، مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="الخيار المثالي | مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">
    <meta itemprop="description" content="الخيار المثالي  ، مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">
    <meta itemprop="image" content="https://perfectchoicejo.com/Ar/image/Perfect Choice-01.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://perfectchoicejo.com/Ar/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="الخيار المثالي | مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">
    <meta property="og:description" content="الخيار المثالي  ، مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">
    <meta property="og:image" content="https://perfectchoicejo.com/Ar/image/Perfect Choice-01.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="الخيار المثالي | مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">
    <meta name="twitter:description" content="الخيار المثالي  ، مستلزمات مميزة، أجهزة منزلية، قرطاسية، تحف، ألعاب، إكسسوارات، مكياج">
    <meta name="twitter:image" content="https://perfectchoicejo.com/Ar/image/Perfect Choice-01.png">

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
                <a href="https://perfectchoicejo.com/Ar/">
                    <img src="../image/Perfect Choice-01.png" alt="" srcset="" />
                </a>
            </div>
            <form method="post">
                <div class="search">
                    <input type="text" placeholder="بحث" name="search" />
                    <button>
                        <i class="fa fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            <div class="lang">
                <a href="https://perfectchoicejo.com/">English</a>
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
                <a href='shopAr.php?catId={$Category['catId']}'><i class='{$Category['catIcon']}'></i>{$Category['nameAr']}</a>
            </div>";
            }

            ?>


        </div>
    </section>