<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $subName     =  $_POST['subName'];
    $catId     =  $_POST['cat'];

    $query = "update subcat set 
    subName = '$subName' ,catId = '$catId' where subId = {$_GET['id']}";

    mysqli_query($conn, $query);
    header("location:manageSubCat.php");
    return;
}
$query1 = "select * from subcat where subId = {$_GET['id']}";
$result1 = mysqli_query($conn, $query1);
$cat1 = mysqli_fetch_assoc($result1);
?>
<h1 class="p-relative">Edit Sub Category</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Edit Sub Category</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="subName" id="subName"
            placeholder="Sub Category Name" value="<?php echo $cat1['subName'] ?>" required />
        <div class="select d-flex">
            <label for="cat" class="mb-5 fs-20"> Select Category :</label>
            <select class="p-20 mb-20 bg-eee rad-6 b-none fs-20 w-full" name="cat" id="cat">

                <?php
                $query = "select * from category";
                $result = mysqli_query($conn, $query);
                while ($cat = mysqli_fetch_assoc($result)) {
                    if ($cat1['catId'] == $cat['catId']) {
                        echo "<option selected = 'selected' value = '{$cat['catId']}'>{$cat['catName']}</option>";
                    } else {
                        echo "<option value = '{$cat['catId']}'>{$cat['catName']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>

<!-- End iteams Table -->
<?php
require_once("includes/footer.php"); ?>