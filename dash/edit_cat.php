<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $catName     =  $_POST['catName'];
    $catIcon     =  $_POST['catIcon'];
    $nameAr     =  $_POST['nameAr'];

    $query = "update category set 
        catName = '$catName' , catIcon = '$catIcon' , nameAr = '$nameAr' where catId = {$_GET['id']} ";

    mysqli_query($conn, $query);
    header("location:manageCat.php");
    return;
}
$query1 = "select * from category where catId = {$_GET['id']}";
$result1 = mysqli_query($conn, $query1);
$cat1 = mysqli_fetch_assoc($result1);
?>

<h1 class="p-relative">Edit Category</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Edit Category</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="catName" id="catName"
            placeholder="Category Name" value="<?php echo $cat1['catName'] ?>" required />

            
                    <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="nameAr" id="nameAr"
            placeholder="Category Arabic Name" value="<?php echo $cat1['nameAr'] ?>" required />

        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="catIcon" id="catIcon"
            placeholder="Category Icon" value="<?php echo $cat1['catIcon'] ?>" required />

        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>



<!-- End iteams Table -->
<?php
require_once("includes/footer.php"); ?>