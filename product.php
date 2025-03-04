<?php require_once("include/header.php") ?>
<section class="productPage">
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $query = "SELECT t1.*, t2.catName, t3.prandName
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
            <div class='image' style='background-image: url(image/{$product['proPhoto']})'></div>
            <div class='discreption'>
            <h2>{$product['proName']}</h2>
            

            <table>
                <tr>
                    <th>Category</th>
                    <td>{$product['catName']}</td>
                </tr>

                <tr>
                    <th>Brand</th>
                    <td>{$product['prandName']}</td>
                </tr>
                ";
                if ($product['proAv'] > 0) {
                    echo "
                <tr>
                    <th>Price</th>
                    <td>{$product['proPrice']} JD</td>
                </tr>
                ";
                }
                if ($product['proState'] > 0) {
                    $state = "Used";
                } else {
                    $state = "New";
                }
                echo "
            <tr>
            <th>State</th>
            <td>{$state}</td>
            </tr>
        ";

                if ($product['proAv'] > 0) {
                    $av = "Avalable";
                } else {
                    $av = "Out Of Stock";
                }
                echo "
            <tr>
            <th>availability</th>
            <td>{$av}</td>
            </tr>
        ";

                if ($product['proDiscount'] > 0) {
                    echo "
                <tr>
                    <th>Discount</th>
                    <td>{$product['proDiscount']} JD</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>{$price} JD</td>
                </tr>";
                }
                echo "
                <tr>
                    <th>Description</th>
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
<?php require_once("include/footer.php"); ?>