<?php
include 'header.php';
if (isset($_SESSION['user_data'])) {
  $donor_id = $_SESSION['user_data'][0];
  $role = $_SESSION['user_data'][2];
}
if ($role == 0) {
  $sql = "SELECT * FROM food Left JOIN user ON food.donor_id = user.user_id LEFT JOIN city ON food.city = city.city_name WHERE food.donor_id = $donor_id ORDER BY food.date DESC";
  $query = mysqli_query($conn, $sql);
} else {
  $sql = "SELECT * FROM food Left JOIN user ON food.donor_id = user.user_id LEFT JOIN city ON food.city = city.city_name ORDER BY food.date DESC";
  $query = mysqli_query($conn, $sql);
}


?>
<h1>Manage User ></h1>
<div class="p-4">
  <table class="table-auto">
    <thead class="">
      <tr class="m-4">
        <th class="p-4">S.N</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Owner Name</th>
        <th>Owner Email</th>
        <th>Owner Contact</th>
        <th>Category</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      while ($row = mysqli_fetch_array($query)) { ?>
        <tr class="">
          <td> <?= $count++ ?></td>
          <td> <?= $row['food_name'] ?></td>
          <td> <?= $row['food_description'] ?></td>
          <td>
            <img src="upload/<?= $row['food_image'] ?>" alt="" width="100px">
          </td>
          <td> <?= $row['owner_name'] ?></td>
          <td> <?= $row['email'] ?></td>
          <td> <?= $row['owner_contact'] ?></td>
          <td> <?= $row['city'] ?></td>
          <td> <?= $row['address'] ?></td>
          <td>
            <a href="edit_product.php?id=<?= $row['food_id'] ?>" class="py-2 px-4 bg-stone-800 text-white rounded-md">Edit</a>


            <form action="" method="POST" onclick="confirm('Are you sure you want to delete Product?')">
              <input hidden type="number" value="<?= $row['food_id'] ?>" name="food_id">
              <input hidden type="text" value="<?= $row['food_image'] ?>" name="food_image">
              <input type="submit" name="delete_food" class="py-2 px-4 bg-red-800 text-white rounded-md" value="Delete">
            </form>
          </td>
        </tr>
      <?php }
      ?>
    </tbody>
  </table>
</div>


</div>
</div>
</div>
</body>

</html>


<?php
if (isset($_POST['delete_food'])) {
  $image = "upload/" . $_POST['food_image'];
  $food_id = $_POST['food_id'];

  $sql = "DELETE FROM food WHERE food_id = $food_id";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    unlink($image);
  }
}
?>