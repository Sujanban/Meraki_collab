<?php include 'header.php';
if (isset($_SESSION['user_data'])) {
  $donor_id = $_SESSION['user_data'][0];
}



$sql = "SELECT * FROM city";
$query = mysqli_query($conn, $sql);
?>
<h1>Add Product ></h1>
<div class="p-4">
  <form class="border rounded-md grid grid-cols-2 gap-4 " action="" method="post" enctype="multipart/form-data">


    <div class="p-4 grid gap-2">
      <label for="">Product Name</label>
      <input class="p-2 border-2 border-black" type="text" name="food_name" placeholder="Product Name" required/>
    </div>

    <div class="p-4 grid gap-2">
      <label for="">Product Image</label>
      <input class="p-2 border-2 border-black" type="file" name="food_image" placeholder="Product Image" required/>
    </div>

    <div class="p-4 grid gap-2">
      <label for="">Product Discription</label>
      <input class="p-2 border-2 border-black" type="text" name="food_description" placeholder="Product Description" required/>
    </div>

    <div>
      <h1 class="px-4 font-medium">Contact Details:</h1>
      <div class="p-4 grid gap-2">
        <label for="">Owner Name</label>
        <input class="p-2 border-2 border-black" type="text" name="owner_name" placeholder=" Owner Name" required/>
      </div>
    </div>


    <div class="p-4 grid gap-2">
      <label for="">Contact Number</label>
      <input class="p-2 border-2 border-black" type="number" name="owner_contact" placeholder="Contact Number" required/>
    </div>


    <!-- option -->
    <div class="p-4 form-group">
      <label for="">Category</label>
      <select class="form-select border-2 border-black" name="city" required>Choose Category
        <option class="p-2 border-2 border-black form-control" value="">Choose Category</option>

        <?php while ($data = mysqli_fetch_array($query)) { ?>
          <option value="<?= $data['city_name'] ?>"><?= $data['city_name'] ?></option>
        <?php } ?>
      </select>
    </div>


    <div class="p-4 grid gap-2">
      <label for="">Pickup Location</label>
      <input class="p-2 border-2 border-black" type="text" name="address" placeholder="Pickup Location" required/>
    </div>
    <div class="p-2 flex items-center justify-center">
      <input class="mx-auto bg-teal-800 px-4 py-2 rounded-full text-white text-center" type="submit" name="add_food" value="List Product" />
    </div>
  </form>
</div>
</div>
</div>
</div>
</body>

</html>

<?php include 'footer.php';
if (isset($_POST['add_food'])) {
  $food_name = $_POST['food_name'];
  $food_description = $_POST['food_description'];
  $owner_name = $_POST['owner_name'];
  $owner_contact = $_POST['owner_contact'];
  $city = $_POST['city'];
  $address = $_POST['address'];


  $filename = $_FILES['food_image']['name'];
  $tmp_name = $_FILES['food_image']['tmp_name'];
  $size = $_FILES['food_image']['size'];
  $image_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  $allow_type = ['jpg', 'png', 'jpeg'];
  $destination = "upload/" . $filename;
  if (in_array($image_ext, $allow_type)) {
    if ($size <= 2000000) {
      move_uploaded_file($tmp_name, $destination);

      $sql = "INSERT INTO food (food_name, food_description, food_image, owner_name, owner_contact, city, address, donor_id) VALUES ('$food_name','$food_description','$filename','$owner_name','$owner_contact','$city','$address','$donor_id')";
      $query = mysqli_query($conn, $sql);
      if ($query) {
        $message = "Data inserted successfully";
        header('Location:manage_product.php');
      } else {
        $message = "Failed to insert data";
      }
    } else {
      $message = "image is too large";
    }
  } else {
    $message = "Invalid File Type";
  }
}
?>