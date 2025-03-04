<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $proName     =  $_POST['proName'];
    $cat         =  $_POST['cat'];
    $brand       =  $_POST['brand'];
    $av = $_POST['av'];
    $propuler    =  $_POST['propuler'];
    $used        =  $_POST['used'];
    $arivale     =  $_POST['arivale'];
    $proPrice    =  $_POST['proPrice'];
    $proDiscount =  $_POST['proDiscount'];
    // $proPhoto    =  $_POST['proPhoto'];
    $description =  $_POST['description'];

    $image_name = $_FILES['image']['name'];
    $path = "../image/";
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path . $image_name);

    $query =
        "insert into product(proName,
    catId,
    proBrandId,
    proAv,
    proPropuler,
    proState,
    proArivaled,
    proPrice,
    proDiscount,
    description,
    proPhoto
    )
      values(
        '$proName',
        '$cat',
        '$brand',
        '$av',
        '$propuler',
        '$used',
        '$arivale',
        '$proPrice',
        '$proDiscount',
        '$description',
        '$image_name'
        )";

    mysqli_query($conn, $query);
    header("location:index.php");
    return;
}
?>

<h1 class="p-relative">Add Products</h1>


<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Add Product</h2>

    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="proName" id="proName"
            placeholder="Product Name" required />


        <div class="select d-flex">
            <label for="cat" class="mb-5 fs-20"> Select Category :</label>
            <select class="p-20 mb-20 bg-eee rad-6 b-none fs-20 w-full" name="cat" id="cat">

                <?php
                $query = "select * from category";
                $result = mysqli_query($conn, $query);
                while ($cat = mysqli_fetch_assoc($result)) {
                    echo "<option value = '{$cat['catId']}'>{$cat['catName']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="select d-flex">
            <label for="cat" class="mb-5 fs-20"> Select Prand :</label>
            <select class="p-20 mb-20 bg-eee rad-6 b-none fs-20 w-full" name="brand" id="brand">

                <?php
                $query = "select * from prand";
                $result = mysqli_query($conn, $query);
                while ($cat = mysqli_fetch_assoc($result)) {
                    echo "<option value = '{$cat['prandId']}'>{$cat['prandName']}</option>";
                }
                ?>
            </select>
        </div>


        <div class="cBox d-flex">
            <label class="d-flex">
                <label for="av">Iteam Avalable : </label>
                <input name="av" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="av" id="av" value="1" checked />
                <div class="toggle-switch"></div>
            </label>
            <label class="d-flex">
                <label for="propuler">Iteam Propuler : </label>
                <input name="propuler" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="propuler" id="propuler" value="1" />
                <div class="toggle-switch"></div>
            </label>
            <label class="d-flex">
                <label for="used">Product Used</label>
                <input name="used" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="used" id="used" value="1" />
                <div class="toggle-switch"></div>
            </label>
            <label class="d-flex">
                <label for="arivale">New Arivale</label>
                <input name="arivale" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="arivale" id="arivale" value="1" />
                <div class="toggle-switch"></div>
            </label>
        </div>
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="number" name="proPrice" id="proPrice"
            placeholder="Product Price" />
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="number" name="proDiscount"
            id="proDiscount" placeholder="Product Discount" />
        <div class="select d-flex mb-20">
            <label for="proPhoto" class="mb-5 fs-20"> Select Photo : </label>
            <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="file" name="image" id="image"
                required />
        </div>
        <textarea class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" placeholder="Product Description ..."
            name="description"></textarea>
        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>
<!-- End Quick Draft Widget -->
<!-- Start iteams Table -->
<div class="iteams p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Last Added Proudects</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Category</td>
                    <td>brand</td>
                    <td>Avalable</td>
                    <td>Propuler</td>
                    <td>State</td>
                    <td>New Arivale</td>
                    <td>Price</td>
                    <td>Discount</td>
                    <td>Photo</td>
                    <td>Description</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `product` INNER JOIN 
                `category` ON product.catId = category.catId INNER JOIN 
                `prand` ON product.proBrandId = prand.prandId ORDER BY 
                proId DESC LIMIT 3;";
                $result = mysqli_query($conn, $query);



                while ($pro = mysqli_fetch_assoc($result)) {
                    if ($pro['proAv'] == 1) {
                        $avalable = "Avalable";
                    } else {
                        $avalable = "Not Avalable";
                    }
                    if ($pro['proPropuler'] == 1) {
                        $propuler = "yes";
                    } else {
                        $propuler = "No";
                    }
                    if ($pro['proState'] == 1) {
                        $state = "Used";
                    } else {
                        $state = "New";
                    }
                    if ($pro['proArivaled'] == 1) {
                        $arivaled = "yes";
                    } else {
                        $arivaled = "No";
                    }

                    echo " 
                  <tr>
                  <td>{$pro['proName']}</td>
                  <td>{$pro['catName']}</td>
                  <td>{$pro['prandName']}</td>
                  <td>{$avalable}</td>
                  <td>{$propuler}</td>
                  <td>{$state}</td>
                  <td>{$arivaled}</td>
                  <td>{$pro['proPrice']} JD</td>
                  <td>{$pro['proDiscount']} JD</td>
                  <td><img src='../image/{$pro['proPhoto']}' alt='' /></td>
                  <td>{$pro['description']}</td>
                  <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' href='edit_pro.php?id={$pro['proId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_pro.php?id=<?php echo "{$pro['proId']}"; ?>'>Remove</a></td>
                <?php echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>
    <a href="managePro.php" class="more d-block fs-14 bg-blue c-white b-none w-fit btn-shape">
        See More
    </a>
</div>
<!-- End iteams Table -->
<?php
require_once("includes/footer.php"); ?>