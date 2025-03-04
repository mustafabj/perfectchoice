<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $promotion     =  $_POST['promotion'];
    $image_name = $_FILES['image']['name'];
    $path = "../image/";
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path . $image_name);

    $query = "insert into promotion(promotionName,promotionPhoto)
            values('$promotion','$image_name')";

    mysqli_query($conn, $query);
    header("location:promotion.php");
    return;
}
?>
<h1 class="p-relative">Add promotion</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Add promotion</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="promotion" id="promotion"
            placeholder="promotion Name" required />
        <div class="select d-flex mb-20">
            <label for="proPhoto" class="mb-5 fs-20"> Select Photo : </label>
            <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="file" name="image" id="image"
                required />
        </div>
        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />
    </form>
</div>
<!-- End Quick Draft Widget -->
<!-- Start iteams Table -->
<div class="iteams p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">All Promotions</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full">
            <thead>
                <tr>
                    <td>Prand Name</td>
                    <td>Prand Photo</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM promotion";
                $result = mysqli_query($conn, $query);

                while ($sub = mysqli_fetch_assoc($result)) {

                    echo " 
                  <tr>
                  <td>{$sub['promotionName']}</td>
                  <td><img src='../image/{$sub["promotionPhoto"]}' style='width: 100%;
                  height: unset' alt=''> </td>
                  
                  <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' 
                  href='edit_promotion.php?id={$sub['promotionId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_promotion.php?id=<?php echo "{$sub['promotionId']}"; ?>'>Remove</a></td>

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