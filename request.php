<?php include "header.php";
include('config.php');
$food_id = $_GET['id'];
$sql = "SELECT * FROM food WHERE food_id = $food_id";
$query = mysqli_query($conn, $sql);
?>
<div>
    <form action="" method="POST">
        <div>
            <label for="">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Name" required>
        </div>
        <div>
            <label for="">Phone</label>
            <input class="form-control" type="number" name="phone" placeholder="Phone" required>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div>
            <label for="">Request Message</label>
            <input class="form-control" type="text" name="message" placeholder="Send message request" required>
        </div>
        <input class="btn btn-primary" type="submit" name="request" value="Send Request">
    </form>
</div>
<?php include "footer.php";
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