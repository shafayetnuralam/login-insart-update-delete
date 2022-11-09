
<?php
require_once("auth.php");
include("db.php"); ?>
<table id="example">
  <thead>
    <tr>
      <th>ID</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Brand</th>
    </tr>
  </thead>
<tbody>

<?php
$query = $conn->prepare("SELECT * FROM `Product`  ORDER BY `name` ASC "); 
$query->execute();
$fetch_brand = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($fetch_brand AS $fetch) {
?>
  <tr>
    <td><?php print $fetch['id']; ?></td>
    <td><?php print $fetch['name']; ?></td>
    <td><?php print $fetch['price']; ?></td>
    <td><?php print $fetch['brand']; ?></td>
  </tr> 
<?php
}
?>

  </tbody>

  <tfoot>
    <tr>
      <th>ID</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Brand</th>
    </tr>
</tfoot>
</table>