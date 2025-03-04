<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $proName     =  $_POST['proName'];
    $cat         =  $_POST['cat'];
    $type        =  $_POST['type'];
    $brand       =  $_POST['brand'];
    $av = $_POST['av'];
    $propuler    =  $_POST['propuler'];
    $used        =  $_POST['used'];
    $arivale     =  $_POST['arivale'];
    $proPrice    =  $_POST['proPrice'];
    $proDiscount =  $_POST['proDiscount'];
    // $proPhoto    =  $_POST['proPhoto'];
    $description =  $_POST['description'];
    if ($_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $path = "../image/";
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, $path . $image_name);

        $query =
            "update  product set
    proName = '$proName',
    catId ='$cat',
    subCat = '$type',
    proBrandId ='$brand',
    proAv ='$av',
    proPropuler ='$propuler',
    proState ='$used',
    proArivaled ='$arivale',
    proPrice = '$proPrice',
    proDiscount = '$proDiscount',
    description = '$description',
    proPhoto ='$image_name' where proId = {$_GET['id']} ";
    } else {
        $query =
            "update  product set
        proName = '$proName',
        catId ='$cat',
        subCat = '$type',
        proBrandId ='$brand',
        proAv ='$av',
        proPropuler ='$propuler',
        proState ='$used',
        proArivaled ='$arivale',
        proPrice = '$proPrice',
        proDiscount = '$proDiscount',
        description = '$description' where proId = {$_GET['id']} ";
    }
    mysqli_query($conn, $query);
    header("location:managePro.php");
    return;
}
?>

<h1 class="p-relative">Edit Products</h1>

<?php
$query1 = "select * from product where proId = {$_GET['id']}";
$result1 = mysqli_query($conn, $query1);
$pro1 = mysqli_fetch_assoc($result1);

?>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Edit Product</h2>

    <form method="post" enctype="multipart/form-data">
        <label for="cat" class="mb-5 fs-20"> Product Name :</label>
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="proName" id="proName"
            value="<?php echo $pro1['proName'] ?>" required />


        <div class="select d-flex">
            <label for="cat" class="mb-5 fs-20"> Select Category :</label>
            <select class="p-20 mb-20 bg-eee rad-6 b-none fs-20 w-full" name="cat" id="cat">

                <?php
                $query = "select * from category";
                $result = mysqli_query($conn, $query);

                while ($cat = mysqli_fetch_assoc($result)) {

                    if ($pro1['catId'] == $cat['catId']) {
                        echo "<option selected='selected' value = '{$cat['catId']}'>{$cat['catName']}</option>";
                    } else {
                        echo "<option value = '{$cat['catId']}'>{$cat['catName']}</option>";
                    }
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
                    if ($pro1['proBrandId'] == $cat['prandId']) {
                        echo "<option selected='selected' value = '{$cat['prandId']}'>{$cat['prandName']}</option>";
                    }
                    echo "<option value = '{$cat['prandId']}'>{$cat['prandName']}</option>";
                }
                ?>
            </select>
        </div>


        <div class="cBox d-flex">
            <label class="d-flex">
                <label for="av">Iteam Avalable : </label>
                <input name="av" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="av" id="av" value="1"
                    <?php if ($pro1['proAv'] == 1) echo 'checked' ?> />
                <div class="toggle-switch"></div>
            </label>
            <label class="d-flex">
                <label for="propuler">Iteam Propuler : </label>
                <input name="propuler" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="propuler" id="propuler" value="1"
                    <?php if ($pro1['proPropuler'] == 1) echo 'checked' ?> />
                <div class="toggle-switch"></div>
            </label>
            <label class="d-flex">
                <label for="used">Product Used</label>
                <input name="used" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="used" id="used" value="1"
                    <?php if ($pro1['proState'] == 1) echo 'checked' ?> />
                <div class="toggle-switch"></div>
            </label>
            <label class="d-flex">
                <label for="arivale">New Arivale</label>
                <input name="arivale" value="0" type="hidden">
                <input class="toggle-checkbox" type="checkbox" name="arivale" id="arivale" value="1"
                    <?php if ($pro1['proArivaled'] == 1) echo 'checked' ?> />
                <div class="toggle-switch"></div>
            </label>
        </div>
        <label for="cat" class="mb-5 fs-20"> Product price</label>
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="number" name="proPrice" id="proPrice"
            value="<?php echo  $pro1['proPrice'] ?>" />
        <label for="cat" class="mb-5 fs-20"> Product Discount</label>
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="number" name="proDiscount"
            id="proDiscount" value="<?php echo  $pro1['proDiscount'] ?>" />
        <div class="select d-flex mb-20">
            <label for="proPhoto" class="mb-5 fs-20"> Select Photo : </label>
            <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="file" name="image" id="image" />
        </div>
        <textarea class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" placeholder="Product Description ..."
            name="description"><?php echo $pro1['description'] ?></textarea>
        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>
<?php
require_once("includes/footer.php"); ?>