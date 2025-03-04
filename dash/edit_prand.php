<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {

    $prandName     =  $_POST['prand'];
    if ($image_name = $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $path = "../image/";
        $tmp_name = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp_name, $path . $image_name);

        $query = "update prand set prandName = '$prandName', prandPhoto = '$image_name' where prandId = {$_GET['id']}";
    } else {
        $query = "update prand set prandName = '$prandName' where prandId = {$_GET['id']}";
    }
    mysqli_query($conn, $query);
    header("location:prand.php");
    return;
}
$query1 = "select * from prand where prandId = {$_GET['id']}";
$result1 = mysqli_query($conn, $query1);
$prand = mysqli_fetch_assoc($result1);
?>
<h1 class="p-relative">Edit Brand</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Edit Brand</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="prand" id="prand"
            placeholder="Prand Name" value="<?php echo $prand['prandName'] ?>" required />
        <div class="select d-flex mb-20">
            <label for="proPhoto" class="mb-5 fs-20"> Select Photo : </label>
            <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="file" name="image" id="image" />
        </div>
        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />
    </form>
</div>

<!-- End iteams Table -->
<?php
require_once("includes/footer.php"); ?>