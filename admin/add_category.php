<?php
include 'header.php';

if (isset($_SESSION['user_data'])) {
  $role = $_SESSION['user_data'][2];

  if ($role == '0') {
    header("Location:http://localhost/hackthon/admin/index.php");
  }
}
?>
<h1>Add Category ></h1>
<div class="p-4">
  <form class="border rounded-md" action="" method="post">
    <div class="p-4 grid gap-2">
      <label for="">Category Name</label>
      <input class="p-2 w-[600px]" type="text" name="city_name" placeholder="Product Name" required />
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

<?php

if (isset($_POST['register_city'])) {
  $city = $_POST['city_name'];

  $sql = "INSERT INTO city (city_name) VALUES ('$city')";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    echo 'City added sucessfully';
  } else {
    echo 'failed to add city';
  }
}

?>