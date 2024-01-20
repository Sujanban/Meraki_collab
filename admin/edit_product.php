<?php include 'header.php';
$food_id = $_GET['id'];


$sql = "SELECT * FROM food LEFT JOIN user ON food.donor_id = user.user_id LEFT JOIN city ON food.city = city.city_name WHERE food.food_id = $food_id";
// $sql = "SELECT * FROM food WHERE food_id = '$food_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$sqlcity = "SELECT * FROM city";
$querycity = mysqli_query($conn, $sqlcity);

?>


<h1>Edit Product ></h1>

<div class="p-4">
    <form class="border rounded-md" action="" method="post" enctype="multipart/form-data">
        <div class="p-4 grid gap-2">
            <label for="">Product Name</label>
            <input class="p-2 w-[600px]" type="text" name="food_name" placeholder="Product Name" value="<?= $row['food_name'] ?>" />
        </div>
        <div class="p-4 grid gap-2">
            <label for="">Product Discription</label>
            <input class="p-2 w-[600px]" type="text" name="food_description" placeholder="Product Description" value="<?= $row['food_description'] ?>" />
        </div>
        <div class="p-4 grid gap-2">
            <label for="">Product Image</label>
            <input class="p-2 w-[600px]" type="file" name="food_image" placeholder="Product Image" />
            <img src="upload/<?= $row['food_image'] ?>" alt="">
        </div>

        <h1 class="px-4 font-medium">Contact Details:</h1>
        <div class="p-4 grid gap-2">
            <label for="">Owner Name</label>
            <input class="p-2 w-[600px]" type="text" name="owner_name" placeholder="Owner Name" value="<?= $row['owner_name'] ?>" />
        </div>
        <div class="p-4 grid gap-2">
            <label for="">Contact Number</label>
            <input class="p-2 w-[600px]" type="number" name="owner_contact" placeholder="Contact Number" value="<?= $row['owner_contact'] ?>" />
        </div>


        <!-- option -->
        <div class="form-group">
            <label for="">Category</label>
            <select class="form-select" name="city" required>Choose Category
                <!-- <option class="form-control" value="">Choose Category</option> -->
                <option hidden class="form-control" value="<?= $row['city_name'] ?>"><?= $row['city_name'] ?></option>

                <?php while ($data = mysqli_fetch_array($querycity)) { ?>

                    <option value="<?= $data['city_name'] ?>"><?= $data['city_name'] ?></option>
                <?php } ?>
            </select>
        </div>


        <div class="p-4 grid gap-2">
            <label for="">Pickup Location</label>
            <input class="p-2 w-[600px]" type="text" name="address" placeholder="Pickup Location" value="<?= $row['address'] ?>" />
        </div>
        <div class="p-2 flex items-center justify-center">
            <input class="mx-auto bg-teal-800 px-4 py-2 rounded-full text-white text-center" type="submit" name="edit_food" value="Update" />
        </div>
    </form>
</div>
</div>
</div>
</div>
</body>

</html>

<?php
if (isset($_POST['edit_food'])) {
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
    if (!empty($filename)) {
        if (in_array($image_ext, $allow_type)) {
            if ($size <= 2000000) {
                $unlink = "upload/".$data['food_image'];
                unlink($unlink);
                move_uploaded_file($tmp_name, $destination);

                $sql = "UPDATE food SET food_name = '$food_name', food_description = '$food_description',food_image = '$filename', owner_name = '$owner_name', owner_contact = '$owner_contact', city = '$city', address = '$address' WHERE food_id= '$food_id'";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    $message = "Data inserted successfully";
                    echo $filename;
                    // header('Location:manage_food.php');
                } else {
                    $message = "Failed to insert data";
                }
            } else {
                $message = "image is too large";
            }
        } else {
            $message = "Invalid File Type";
        }
    } else {
        $sql = "UPDATE food SET food_name = '$food_name', food_description = '$food_description', owner_name = '$owner_name', owner_contact = '$owner_contact', city = '$city', address = '$address' WHERE food_id= '$food_id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            header('Location:manage_product.php');
        } else {
            echo "Error updating data";
        }
    }
}
?>