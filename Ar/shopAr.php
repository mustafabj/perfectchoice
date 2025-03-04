<?php require_once("../include/headerAr.php") ?>

<section class="promotion">
    <div class="container">
        <div class="promorionCont">
            <button class="pre-btn" onclick="prevSlide()">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="nxt-btn" onclick="showSlides()">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <?php $query = "select * from promotion";
            $result = mysqli_query($conn, $query);
            while ($promotion  = mysqli_fetch_assoc($result)) {
                echo "<div class='image fade'>
                <img src='../image/{$promotion['promotionPhoto']}' alt='' />
            </div>";
            } ?>
            <ul class="bullets">
                <?php $query = "select * from promotion";
                $result = mysqli_query($conn, $query);
                $i = 0;
                while ($promotion  = mysqli_fetch_assoc($result)) {
                    $i++;
                    echo " <li class='dot' onclick='currentSlide({$i})'></li>";
                } ?>

            </ul>
        </div>
    </div>
</section>

<section class="allPro">
    <div class="container">
        <?php
        if (isset($_GET['catId'])) {
            $query = "select * from category where catId = {$_GET['catId']} ";
            $result = mysqli_query($conn, $query);
            $category  = mysqli_fetch_assoc($result);
            $name = $category['nameAr'];
        } elseif (isset($_GET['brandId'])) {
            $query = "select * from prand where prandId = {$_GET['brandId']} ";
            $result = mysqli_query($conn, $query);
            $brand  = mysqli_fetch_assoc($result);
            $name = $brand['prandName'];
        } else {
            $all = "جميع المنتجات";
        }
        if (isset($name)) {
            echo " 
        <div class='head'>
            <h1>{$name}</h1> 
            </div>";
        } else {
            echo " 
            <div class='head'>
                <h1>{$all}</h1> 
                </div>";
        }
        ?>
        <div class="bestBox">
            <?php
            if (isset($_GET['catId'])) {
                $query = "select * from product where catId = {$_GET['catId']}";
            } elseif (isset($_GET['brandId'])) {
                $query = "select * from product where proBrandId = {$_GET['brandId']}";
            } else {
                $query = "select * from product";
            }
            $result = mysqli_query($conn, $query);
            $row = mysqli_num_rows($result);
            $total_page = ceil($row / 16);
            if (isset($_GET['page'])) {
                if ((int)$_GET['page'] > $total_page) {
                    $page = 1;
                } else {
                    $page = (int)$_GET['page'];
                }
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * 16;

            if (isset($_GET['catId'])) {
                $query = "select * from product where catId = {$_GET['catId']} LIMIT 16 OFFSET $offset ";
            } elseif (isset($_GET['brandId'])) {
                $query = "select * from product where proBrandId = {$_GET['brandId']} LIMIT 16 OFFSET $offset";
            } else {
                $query = "select * from product LIMIT 16 OFFSET " . $offset . "";
            }
            $result = mysqli_query($conn, $query);

            while ($product  = mysqli_fetch_assoc($result)) {
                if ($product['proDiscount'] > 0) {
                    $price = $product['proPrice'] - $product['proDiscount'];
                } else {
                    $price = $product['proPrice'];
                }
                echo "  <a href='productAr.php?id={$product['proId']}'>
                    <div class='probox'>
                        <div class='img' style='background-image: url(../image/{$product['proPhoto']})'></div>
                        <div class='text'>
                            <h3>{$product['proName']}</h3>
                            <div class='all-price'>";
                if ($product['proAv'] != 0) {
                    echo "  <div class='price-box'>
                    <span>00.</span>
                    <span class='price'> {$price}</span>
                    <span class='jd'>دينار</span>
                                </div>";
                    if ($product['proDiscount'] > 0) {
                        echo "
                                <div class='disc' >
                                <span>00.</span>
                                    <span class='discount'>{$product['proPrice']}</span>
                                </div>";
                    }
                } else {
                    echo "  <span class='out'>Out Of Stock</span>";
                }
                echo "
                            </div>
                        </div>
                    </div>
                </a>";
            }



            ?>
        </div>
        <div class="pagination">
            <?php
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if (isset($_GET['catId'])) {
                $query = "select * from product where catId = {$_GET['catId']}";
            } elseif (isset($_GET['brandId'])) {
                $query = "select * from product where proBrandId = {$_GET['brandId']}";
            } else {
                $query = "select * from product";
            }
            $result = mysqli_query($conn, $query);
            $row = mysqli_num_rows($result);
            $total_page = ceil($row / 16);


            if (isset($_GET['page']) && $_GET['page'] > 1) {
                if (isset($_GET['brandId'])) {
                    echo "<a href='shopAr.php?brandId={$_GET['brandId']}&page=" . ($_GET['page'] - 1) . "'>&laquo;</a>";
                } elseif (isset($_GET['catId'])) {
                    echo "<a href='shopAr.php?catId={$_GET['catId']}&page=" . ($_GET['page'] - 1) . "'>&laquo;</a>";
                } else {
                    echo "<a href='shopAr.php?page=" . ($_GET['page'] - 1) . "'>&laquo;</a>";
                }
            } else {
                echo "<a class='isDisabled' href='search.php'>&laquo;</a>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if (isset($_GET['brandId'])) {
                    if (isset($_GET['page']) && $i == $_GET['page']) {
                        echo " <a class='active' href='shopAr.php?brandId={$_GET['brandId']}&page={$i}'>$i</a>";
                    } else {
                        echo " <a href='shopAr.php?brandId={$_GET['brandId']}&page={$i}'>$i</a>";
                    }
                } elseif (isset($_GET['catId'])) {
                    if (isset($_GET['page']) && $i == $_GET['page']) {
                        echo " <a class='active' href='shopAr.php?catId={$_GET['catId']}&page={$i}'>$i</a>";
                    } else {
                        echo " <a href='shopAr.php?catId={$_GET['catId']}&page={$i}'>$i</a>";
                    }
                } else {
                    echo " <a href='shopAr.php?page={$i}'>$i</a>";
                }
            }


            if (isset($_GET['page']) && $_GET['page'] < $total_page) {
                if (isset($_GET['brandId'])) {
                    echo "<a href='shopAr.php?brandId={$_GET['brandId']}&page=" . ($_GET['page'] + 1) . "'>&raquo;</a>";
                } elseif (isset($_GET['catId'])) {
                    echo "<a href='shopAr.php?catId={$_GET['catId']}&page=" . ($_GET['page'] + 1) . "'>&raquo;</a>";
                } else {
                    echo "<a href='shopAr.php?page=" . ($_GET['page'] + 1) . "'>&raquo;</a>";
                }
            } else {
                echo "<a class='isDisabled' href='search.php'>&raquo;</a>";
            }
            ?>
        </div>

    </div>
</section>
<section class="brand">
    <div class="container">
        <button class="pre-btn">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="nxt-btn">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
        <div class="brandCon">
            <?php $query = "select * from prand ";
            $result = mysqli_query($conn, $query);

            while ($brand  = mysqli_fetch_assoc($result)) {
                echo " <div>
                <a href='shopAr.php?brandId={$brand['prandId']}'><img src='../image/{$brand['prandPhoto']}' alt='' /></a>
            </div>";
            } ?>
        </div>
    </div>
</section>
<?php require_once("../include/footerAr.php"); ?>