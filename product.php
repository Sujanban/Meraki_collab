<?php include('header.php');
include('config.php');
$food_id = $_GET['id'];
$sql = "SELECT * FROM food WHERE food_id = $food_id";
$query = mysqli_query($conn, $sql);
?>

<?php
while ($row = mysqli_fetch_array($query)) {
?>
    <div class="py-16 product">
        <div class="max-w-5xl mx-auto">
            <h1 class="py-8 text-green-700">Product>></h1>
            <div class="md:grid grid-cols-2 gap-4">
                <div>
                    <img src="admin/upload/<?= $row['food_image'] ?>" alt="">
                </div>
                <div>
                    <h1 class="font-medium py-2 text-xl"><?= $row['food_name'] ?></h1>
                    <p class="text-gray-500"><?= $row['food_description'] ?></p>
                    <h1 class="font-medium py-2 text-xl"> Donators Details:</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <h1 class="font-medium">Name : <?= $row['owner_name'] ?></h1>
                        <h1 class="font-medium">Category : <?= $row['city'] ?></h1>
                        <h1 class="font-medium">Address : <?= $row['address'] ?></h1>
                        <h1 class="font-medium">Contact : <?= $row['owner_contact'] ?></h1>
                    </div>
                    <li class="my-4">
                        <!-- <a class="px-4 py-2 text-white text-sm rounded-full bg-[#1A956E]" href="">Request</a> -->
                    </li>
                </div>
            </div>
            <div class="p-4">
                <h1 class="text-3xl font-medium">Request for food</h1>
                <form action="" method="POST">
                    <div class="grid p-2">
                        <label for="">Name</label>
                        <input class="p-2 border-2 border-black form-control" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="grid p-2">
                        <label for="">Phone</label>
                        <input class="p-2 border-2 border-black form-control" type="number" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="grid p-2">
                        <label for="">Email</label>
                        <input type="email" class="p-2 border-2 border-black form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="grid p-2">
                        <label for="">Request Message</label>
                        <input class="p-2 border-2 border-black form-control" type="text" name="message" placeholder="Send message request" required>
                    </div>
                    
                    <input class="my-4 px-4 py-2 bg-teal-800 text-white rounded-full btn btn-primary" type="submit" name="request" value="Send Request">
                </form>
            </div>
        </div>
    </div>

<?php
}
?>
<?php include 'footer.php';
if (isset($_POST['request'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO request (post_id, client_name, client_phone, client_email, request_detail) VALUES ('$food_id','$name', '$phone', '$email', '$message')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "request sent sucessfully";
    } else {
        echo "failed to send request";
    }
}
?>