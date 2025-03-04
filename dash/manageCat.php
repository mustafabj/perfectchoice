<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $catName     =  $_POST['catName'];
    $NameAr      =  $_POST['NameAr'];
    $catIcon     =  $_POST['catIcon'];

    $query = "insert into category(catName,catIcon,NameAr)
            values('$catName','$catIcon','$NameAr')";

    mysqli_query($conn, $query);
    header("location:manageCat.php");
    return;
}
?>
<h1 class="p-relative">Add Category</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Add Category</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="catName" id="catName"
            placeholder="Category Name" required />
            <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="NameAr" id="NameAr"
            placeholder="Category Category Name IN Arabic" required />
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="catIcon" id="catIcon"
            placeholder="Category Icon" required />

        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>
<!-- End Quick Draft Widget -->
<!-- Start iteams Table -->
<div class="iteams p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">All Category</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full">
            <thead>
                <tr>
                    <td>Category Name</td>
                    <td>Category Arabic Name</td>
                    <td>Category Icon</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);

                while ($cat = mysqli_fetch_assoc($result)) {

                    echo " 
                  <tr>
                  <td>{$cat['catName']}</td>
                  <td>{$cat['nameAr']}</td>
                  <td> <i class='{$cat['catIcon']} fs-50' ></i></td>
                  
                  <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' 
                  href='edit_cat.php?id={$cat['catId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_cat.php?id=<?php echo "{$cat['catId']}"; ?>'>Remove</a></td>

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