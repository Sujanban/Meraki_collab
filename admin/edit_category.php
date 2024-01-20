<?php
include 'header.php';
$city_id = $_GET['id'];

$sql = "SELECT * FROM city where city_id = '$city_id'";
$query = mysqli_query($conn, $sql);
$city_data = mysqli_fetch_array($query);
?>

<h1>Edit Category ></h1>
<div class="p-4">
  <form class="border rounded-md" action="" method="post">
    <div class="p-4 grid gap-2">
      <label for="">Category Name</label>
      <input class="p-2 w-[600px]" type="text" name="city_name" placeholder="Product Name" value="<?= $city_data['city_name'] ?>" required />
    </div>
    <div class="p-2 flex items-center justify-center">
      <input class="mx-auto bg-teal-800 px-4 py-2 rounded-full text-white text-center" type="submit" name="register_city" value="Add Category" />
    </div>
  </form>
</div>
</div>
</div>
</div>
</body>

</html>


<?php include 'footer.php';

if (isset($_POST['register_city'])) {
  $city = $_POST['city_name'];

  $sql = "UPDATE city SET city_name = '$city' WHERE city_id = '$city_id'"; 
  $query = mysqli_query($conn, $sql);
  if ($query) {
      echo 'City updated sucessfully';
      header('Location:http://localhost/blog/admin/manage_category.php');
      exit();
  } else {
      echo 'failed updating city';
  }
}
?>