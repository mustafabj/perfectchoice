<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $user     =  $_POST['user'];
    $password     =  $_POST['password'];

    $query = "update admin set 
        adminName = '$user' , adminPass = '$password' where adminId = {$_GET['id']} ";

    mysqli_query($conn, $query);
    header("location:manageAdmin.php");
    return;
}
$query1 = "select * from admin where adminId = {$_GET['id']}";
$result1 = mysqli_query($conn, $query1);
$cat1 = mysqli_fetch_assoc($result1);
?>

<h1 class="p-relative">Edit Admin</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Edit Admin</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="user" id="user"
            placeholder="Category Name" value="<?php echo $cat1['adminName'] ?>" required />
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="password" name="password" id="password"
            placeholder="Category Icon" value="<?php echo $cat1['adminPass'] ?>" required />

        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>



<!-- End iteams Table -->
<?php
require_once("includes/footer.php"); ?>