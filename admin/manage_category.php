<?php
include 'header.php';
$sql = "SELECT * FROM city";
$query = mysqli_query($conn, $sql);
?>

<h1>Manage Category ></h1>
<div class="p-4">
  <table class="table-auto">
    <thead class="">
      <tr class="m-4">
        <th class="p-4">S.N</th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      while (($row = mysqli_fetch_array($query))) { ?>

        <tr class="">
          <td class="p-4"><?= $count++ ?></td>
          <td><?= $row['city_name'] ?></td>
          <td>
            <a href="edit_category.php?id=<?= $row['city_id'] ?>">
              <input class="py-2 px-4 bg-stone-800 text-white rounded-md" type="submit" name="edit" value="Edit" />
            </a>
            <form action="" method="post" onsubmit="return confirm('Are you sure yo want to delete?')">
              <input type="hidden" value="<?= $row['city_id'] ?>" name="city_id">
              <input class="py-2 px-4 bg-red-800 text-white rounded-md" type="submit" name="detete_city" value="Delete" />
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
include 'footer.php';
if (isset($_POST['detete_city'])) {
    $city_id = $_POST['city_id'];
    $sql = "DELETE FROM city WHERE city_id = $city_id";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "City Deleted Sucessfully";
    } else {
        echo "Error deleting City";
    }
}

?>