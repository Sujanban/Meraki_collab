<?php
include 'config.php';
include 'header.php';
session_start();
if(isset($_SESSION['user_data'])){
    header('Location: admin/index.php');
    exit();
}
?>

<div class="h-[90vh]">
  <div class="grid grid-cols-2">
    <div>
      <img class="h-[90vh] object-cover" src="assets/charity.jpg" alt="">
    </div>
    <div class="ring flex items-center justify-center">
      <form class="" action="" method="post">
        <h1 class="py-4 text-3xl">Welcome Users!</h1>

        <div class="p-2">
          <label class="py-4" for="">Email </label><br />
          <input class="my-2 w-96 p-4 shadow rounded" name="email" type="email" placeholder="Email" required>
        </div>

        <div class="p-2">
          <label class="py-4" for="">Password </label><br />
          <input class="my-2 w-96 p-4 shadow rounded" name="password" type="password" placeholder="Password" required>
        </div>

        <input name="login_btn" class="m-4 px-4 py-2 text-sm rounded-full text-white flex mx-auto bg-green-700" type="submit" value="Login">
        <p class="p-4 text-center">Don't have an account? <a href="register.php">Register Here</a> </p>
      </form>
    </div>
  </div>
</div>

<!-- footer starts here -->

</body>

</html>
<?php

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, sha1($_POST['password']));

    $sql = "SELECT * FROM user WHERE email='{$email}' AND password='{$password}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    if ($row) {
        $result = mysqli_fetch_assoc($query);
        $user_data = array($result['user_id'],$result['username'],$result['role']);
        $_SESSION['user_data']=$user_data;
        header('Location:admin/index.php');
        exit();
    } else {
        $_SESSION['error'] = 'Invalid credentials';
    }
}
?>