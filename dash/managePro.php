<?php
require_once("includes/header.php");
?>
<div class="iteams p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">All Proudects</h2>
    <div class="responsive-table">
        <table class="myTable fs-15 w-full" id="myTable">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Category</td>
                    <td>brand</td>
                    <td>Avalable</td>
                    <td>Propuler</td>
                    <td>State</td>
                    <td>New Arivale</td>
                    <td>Price</td>
                    <td>Discount</td>
                    <td>Photo</td>
                    <td>Description</td>
                    <td>Edit Or Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
        $query = "SELECT * FROM `product` INNER JOIN 
                `category` ON product.catId = category.catId INNER JOIN 
                `prand` ON product.proBrandId = prand.prandId";
        $result = mysqli_query($conn, $query);

        while ($pro = mysqli_fetch_assoc($result)) {
          if ($pro['proAv'] == 1) {
            $avalable = "Avalable";
          } else {
            $avalable = "Not Avalable";
          }
          if ($pro['proPropuler'] == 1) {
            $propuler = "yes";
          } else {
            $propuler = "No";
          }
          if ($pro['proState'] == 1) {
            $state = "Used";
          } else {
            $state = "New";
          }
          if ($pro['proArivaled'] == 1) {
            $arivaled = "yes";
          } else {
            $arivaled = "No";
          }
          echo " 
                  <tr>
                  <td>{$pro['proName']}</td>
                  <td>{$pro['catName']}</td>
                  <td>{$pro['prandName']}</td>
                  <td>{$avalable}</td>
                  <td>{$propuler}</td>
                  <td>{$state}</td>
                  <td>{$arivaled}</td>
                  <td>{$pro['proPrice']} JD</td>
                  <td>{$pro['proDiscount']} JD</td>
                  <td><img src='../image/{$pro['proPhoto']}' alt='' /></td>
                  <td>{$pro['description']}</td>
                  <td><a class='d-block fs-14 bg-blue c-white b-none w-fit btn-shape mb-10' href='edit_pro.php?id={$pro['proId']}'>Edit</a>"; ?>

                <a class=" d-block fs-14 bg-red c-white b-none w-fit btn-shape" type="button"
                    onclick="return confirm('Are you sure?')"
                    href='delete_pro.php?id=<?php echo "{$pro['proId']}"; ?>'>Remove</a></td>
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