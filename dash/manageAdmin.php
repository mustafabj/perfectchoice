<?php
require_once("includes/header.php");
if (isset($_POST['save'])) {
    $user     =  $_POST['user'];
    $password     =  $_POST['password'];

    $query = "insert into admin(adminName,adminPass)
            values('$user','$password')";

    mysqli_query($conn, $query);
    header("location:manageAdmin.php");
    return;
}
?>
<h1 class="p-relative">Add Admin</h1>
<div class="addIteam p-20 bg-white rad-10">
    <h2 class="mt-0 mb-20">Add Admin</h2>
    <form method="post" enctype="multipart/form-data">
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="user" id="user"
            placeholder="User Name" required />
        <input class="d-block mb-20 w-full p-20 b-none bg-eee rad-6 fs-25" type="text" name="password" id="password"
            placeholder="Password" required />

        <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape" type="submit" value="Save"
            name="save" />

    </form>
</div>
<!-- End Quick Draft Widget -->
<!-- Start iteams Table -->
<div class="iteams p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">All admin</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full">
            <thead>
                <tr>
                    <td>Admin UserName</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM admin";
                $result = mysqli_query($conn, $query);

                while ($pro = mysqli_fetch_assoc($result)) {

                    echo " 
                  <tr>
                  <td>{$pro['adminName']}</td>
                  
                  <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' 
                  href='edit_admin.php?id={$pro['adminId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_admin.php?id=<?php echo "{$pro['adminId']}"; ?>'>Remove</a></td>

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