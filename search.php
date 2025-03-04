<?php require_once("include/header.php");

?>


<section class="allPro">
    <div class="container">
        <?php

        if (isset($_GET['search'])) {
            $searchText = "Search  ";
            $name =  $searchText . "\"" . filter_var($_GET['search'], FILTER_SANITIZE_STRING) . "\"";
        } else {
            header("location:index.php");
        }
        echo " <div class='head'>
            <h1>{$name}</h1> 
            </div>";
        ?>
        <div class="bestBox">
            <?php
            $query = "select * from product";
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
            $query = "select * from product where proName LIKE '%{$_GET['search']}%' or
            description LIKE '%{$_GET['search']}%' LIMIT 16 OFFSET $offset 
            ";

            $result = mysqli_query($conn, $query);

            while ($product  = mysqli_fetch_assoc($result)) {
                if ($product['proDiscount'] > 0) {
                    $price = $product['proPrice'] - $product['proDiscount'];
                } else {
                    $price = $product['proPrice'];
                }
                echo "  <a href='product.php?id={$product['proId']}'>
                    <div class='probox'>
                        <div class='img' style='background-image: url(image/{$product['proPhoto']})'></div>
                        <div class='text'>
                            <h3>{$product['proName']}</h3>
                            <div class='all-price'>";

                if ($product['proAv'] != 0) {
                    echo "  <div class='price-box'>
                    <span class='price'> {$price}</span>
                    <span>.00</span>
                    <span class='jd'>JD&nbsp;</span>
                                </div>";
                    if ($product['proDiscount'] > 0) {
                        echo "
                    <div class='disc' >
                    <span class='discount'>{$product['proPrice']}</span>
                    <span>.00</span>
                    </div>";
                    }
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
        <div class="pagination">
            <?php
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $query = "select * from product where proName LIKE '%{$_GET['search']}%' or
            description LIKE '%{$_GET['search']}%'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_num_rows($result);
            $total_page = ceil($row / 16);
            if (isset($_GET['page']) && $_GET['page'] > 1) {
                if ($_GET['page'] > $total_page) {
                    echo "<a href='search.php?search={$_GET['search']}&page=" . ($total_page > 1 ? $total_page - 1 : 1) . "'>&laquo;</a>";
                } else {
                    echo "<a href='search.php?search={$_GET['search']}&page=" . ($_GET['page'] - 1) . "'>&laquo;</a>";
                }
            } else {
                echo "<a class='isDisabled' href='search.php'>&laquo;</a>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if (isset($_GET['page'])) {
                    if ($i == $_GET['page']) {
                        echo "<a class='active' href='search.php?search={$_GET['search']}&page=$i '>$i</a>";
                    } else {
                        echo "<a href='search.php?search={$_GET['search']}&page=$i '>$i</a>";
                    }
                } elseif ($i == 1) {
                    echo "<a class='active' href='search.php?search={$_GET['search']}&page=$i '>$i</a>";
                } else {
                    echo "<a href='search.php?search={$_GET['search']}&page=$i '>$i</a>";
                }
            }
            if (isset($_GET['page']) && $_GET['page'] < $total_page) {
                echo "<a href='search.php?search={$_GET['search']}&page=" . ($_GET['page'] + 1) . "'>&raquo;</a>";
            } elseif ($total_page > 1) {
                echo "<a href='search.php?search={$_GET['search']}&page=2'>&raquo;</a>";
            } else {
                echo "<a class='isDisabled' href=''>&raquo;</a>";
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
                <a href='shop.php?brandId={$brand['prandId']}'><img src='image/{$brand['prandPhoto']}' alt='' /></a>
            </div>";
            } ?>
        </div>
    </div>
</section>
<?php require_once("include/footer.php"); ?>