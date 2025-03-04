<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $prandName     =  $_POST['prand'];
    $image_name = $_FILES['image']['name'];
    $path = "../image/";
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, $path . $image_name);

    $query = "insert into prand(prandName,prandPhoto)
            values('$prandName','$image_name')";

    mysqli_query($conn, $query);
    header("location:prand.php");
    return;
}
?>

<h1 class="p-relative">Add Brand</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Add Brand</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="prand" id="prand"
            placeholder="Prand Name" required />
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
    <h2 class="mt-0 mb-20">All Brands</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full">
            <thead>
                <tr>
                    <td>Brand Name</td>
                    <td>Brand Photo</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM prand";
                $result = mysqli_query($conn, $query);

                while ($sub = mysqli_fetch_assoc($result)) {

                    echo " 
                  <tr>
                  <td>{$sub['prandName']}</td>
                  <td><img src='../image/{$sub["prandPhoto"]}' alt=''> </td>
                  
                  <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' 
                  href='edit_prand.php?id={$sub['prandId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_prand.php?id=<?php echo "{$sub['prandId']}"; ?>'>Remove</a></td>

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