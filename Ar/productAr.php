<?php require_once("../include/headerAr.php") ?>
<section class="productPage">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $query = "SELECT t1.*, t2.nameAr, t3.prandName
            FROM product AS t1
            JOIN category AS t2 ON t1.catId = t2.catId
            JOIN prand AS t3 ON t1.proBrandId = t3.prandId
            where proId = {$_GET['id']}";
            $result = mysqli_query($conn, $query);
            $product  = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) > 0) {
                if ($product['proDiscount'] > 0) {
                    $price = $product['proPrice'] - $product['proDiscount'];
                } else {
                    $price = $product['proPrice'];
                }
                echo "
            <div class='image' style='background-image: url(../image/{$product['proPhoto']})'></div>
            <div class='discreption'>
            <h2>{$product['proName']}</h2>
            

            <table>
                <tr>
                    <th>الفئة</th>
                    <td>{$product['nameAr']}</td>
                </tr>

                <tr>
                    <th>الماركة</th>
                    <td>{$product['prandName']}</td>
                </tr>
                ";
                if ($product['proAv'] > 0) {
                    echo "
                <tr>
                    <th>السعر</th>
                    <td>{$product['proPrice']} دينار</td>
                </tr>
                ";
                }
                if ($product['proState'] > 0) {
                    $state = "مستعمل";
                } else {
                    $state = "جديد";
                }
                echo "
                <tr>
            <th>الحالة</th>
            <td>{$state}</td></td>
        ";
                if ($product['proAv'] > 0) {
                    $av = "متوفر";
                } else {
                    $av = "انتهى من المخزن";
                }
                echo "
                <tr>
            <th>التوفر</th>
            <td>{$av}</td></tr>
        ";

                if ($product['proDiscount'] > 0) {
                    echo "
                <tr>
                    <th>الخصم</th>
                    <td>{$product['proDiscount']} دينار</td>
                </tr>
                <tr>
                    <th>مجموع السعر</th>
                    <td>دينار {$price}</td>
                </tr>";
                }
                echo "
                <tr>
                    <th>وصف المنتج</th>
                    <td>
                    {$product['description']}
                    </td>
                </tr>
            </table>
            </div>";
            } else {
                header("Location:index.php");
            }
        } else {
            header("Location:index.php");
        } ?>
    </div>
</section>
<?php require_once("../include/footerAr.php"); ?>