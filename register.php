<?php
include 'config.php';
include 'header.php';
session_start();
if (isset($_SESSION['user_data'])) {
    header('Location: admin/index.php');
    exit();
} ?>


<div class="h-[90vh]">
    <div class="grid grid-cols-2">
        <div>
            <img class="h-[90vh] object-cover" src="assets/charity.jpg" alt="">
        </div>
        <div class="ring flex items-center justify-center">
            <form class="" action="" method="post">
                <h1 class="py-4 text-center text-3xl">Register Here!</h1>

                <div class="p-2">
                    <label class="" for="">Username </label><br />
                    <input class=" w-96 p-4 shadow rounded" name="username" type="text" placeholder="Name" required>
                </div>
                <!-- <div class="p-2">
                    <label class="py-4" for="">Phone Number </label><br />
                    <input class=" w-96 p-4 shadow rounded" name="contact" type="number" placeholder="Phone Number" required>
                </div> -->
                <div class="p-2">
                    <label class="py-4" for="">Email </label><br />
                    <input class=" w-96 p-4 shadow rounded" name="email" type="email" placeholder="Email" required>
                </div>

                <div class="p-2">
                    <label class="py-4" for="">Password </label><br />
                    <input class=" w-96 p-4 shadow rounded" name="password" type="password" placeholder="Password" required>
                </div>
                <div class="p-2">
                    <label class="py-4" for="">Confirm Password </label><br />
                    <input class=" w-96 p-4 shadow rounded" name="c_password" type="password" placeholder="Confirm Password" required>
                </div>
                <p class="py-1 text-xs text-center">by signing up, you accept our terms and conditions</p>

                <input name="register_btn" class=" px-4 py-2 text-sm rounded-full text-white flex mx-auto bg-green-700" type="submit" value="Register">
                <p class="p-4 text-center">Already have an account? <a href="login.php">Login Here</a> </p>

                <?php
                if (isset($_SESSION["error"])) {
                    $error = $_SESSION['error'];
                    echo $error;
                    unset($_SESSION['error']);
                }
                ?>

            </form>
        </div>
    </div>
</div>

</body>

</html>

<?php
if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, sha1($_POST['password']));
    $c_password = mysqli_real_escape_string($conn, sha1($_POST['c_password']));

    if ($password == $c_password) {
        $sql = "INSERT INTO user (username,email,password,role) VALUES ('$username','$email','$password',0)";
        $query = mysqli_query($conn, $sql);
        if ($query) {

            header('Location:login.php');
            exit();
            echo 'user registered sucessfully';
        } else {
            echo 'failed adding user';
        }
    }else{
        echo "password and confirm password doesn't match";
    }
}
?>