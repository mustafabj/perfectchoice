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
<section class="arrived">
    <div class="container">
        <div class="special-head">
            <h1>وصل حديثا</h1>
        </div>
        <div class="mainCon">
            <button class="pre-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="nxt-btn">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <div class="container-pro">
                <?php $query = "select * from product where proArivaled != 0 ORDER BY proId DESC";
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
                    if ($product['proDiscount'] > 0) {
                        echo "
                                            <div class='disc' >
                                            <span>00.</span>
                                            <span class='discount'>{$product['proPrice']}</span>
                                            </div>";
                    }
                    if ($product['proAv'] != 0) {
                        echo "  <div class='price-box'>
                                <span>00.</span>
                                <span class='price'> {$price}</span>
                                <span class='jd'>&nbsp;دينار</span>
                                            </div>";
                    } else {
                        echo "  <span class='out'>انتهى من المخزن</span>";
                    }
                    echo "
                            </div>
                        </div>
                    </div>
                </a>";
                } ?>
            </div>
        </div>
    </div>
</section>
<section class="best">
    <div class="container">
        <div class="special-head">
            <h1>منتجاتنا الاكثر مبيعا</h1>
        </div>
        <div class="bestBox">
            <?php
            $query = "select * from product where proPropuler != 0 ORDER BY proId DESC ";
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
                if ($product['proDiscount'] > 0) {
                    echo "
                                <div class='disc' >
                                <span>00.</span>
                                <span class='discount'>{$product['proPrice']}</span>
                                </div>";
                }
                if ($product['proAv'] != 0) {
                    echo "  <div class='price-box'>
                    <span>00.</span>
                    <span class='price'> {$price}</span>
                    <span class='jd'>&nbsp;دينار</span>
                                </div>";
                } else {
                    echo "  <span class='out'>انتهى من المخزن</span>";
                }
                echo "
                            </div>
                        </div>
                    </div>
                </a>";
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