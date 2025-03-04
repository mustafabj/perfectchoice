<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $subName     =  $_POST['subName'];
    $catId     =  $_POST['cat'];

    $query = "insert into subcat(subName,catId)
            values('$subName','$catId')";

    mysqli_query($conn, $query);
    header("location:manageSubCat.php");
    return;
}
?>
<h1 class="p-relative">Add Sub Category</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Add Sub Category</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="subName" id="subName"
            placeholder="Sub Category Name" required />
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
        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>
<!-- End Quick Draft Widget -->
<!-- Start iteams Table -->
<div class="iteams p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">All Sub Category</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full">
            <thead>
                <tr>
                    <td>Sub Category Name</td>
                    <td>Category</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `subcat` INNER JOIN `category` ON subcat.catId = category.catId";
                $result = mysqli_query($conn, $query);

                while ($sub = mysqli_fetch_assoc($result)) {

                    echo " <tr>
                    <td>{$sub['subName']}</td>
                    <td> {$sub['catName']}</td>
                    <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' 
                  href='edit_subCat.php?id={$sub['subId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_subCat.php?id=<?php echo "{$sub['subId']}"; ?>'>Remove</a></td>

                <?php echo "</tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

</div>
<!-- End iteams Table -->
<?php
require_once("includes/footer.php"); ?>