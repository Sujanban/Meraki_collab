<?php
include '../config.php';

session_start();
ob_start();
if (!isset($_SESSION['user_data'])) {
  header("Location:http://localhost/hackathon/login.php");
  exit();
}
?>

<?php
function active($currect_page)
{
  $url_array =  explode('/', $_SERVER['REQUEST_URI']);
  $url = end($url_array);
  if ($currect_page == $url) {
    echo 'active'; //class name in css 
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./output.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="flex">
    <div class="fixed bg-white z-50 sidebar h-[100vh] w-[250px] shadow-md">
      <div class="p-8 mx-auto w-full">
        <a class="font-bold text-xl mx-auto" href="">
          <!-- <img src="assets/" alt=""> -->
          Meraki Collab</a>
      </div>
      <div class="flex items-center justify-center">
        <ul class="p-4 w-full font-medium">
          <li class="<?php active('index.php');?> p-4"><a href="index.php">Dashboard</a></li>

          <?php
          if (isset($_SESSION['user_data'])) {
            if (($_SESSION['user_data'][2]) != '0') {
          ?>
              <li class="<?php active('manage_category.php');?> p-4"><a href="manage_category.php">Manage Category</a></li>
              <li class="<?php active('add_category.php');?> p-4"><a href="add_category.php">Add Category</a></li>
          <?php
            }
          }
          ?>

          <li class="<?php active('manage_product.php');?> p-4"><a href="manage_product.php">Manage Product</a></li>
          <li class="<?php active('add_product.php');?> p-4"><a href="add_product.php">Add Product</a></li>


          <li class="<?php active('manage_request.php');?> p-4"><a href="manage_request.php">Request</a></li>
          <li class="<?php active('request_history.php');?> p-4"><a href="request_history.php">Request History</a></li>

        </ul>
      </div>
    </div>
    <div class="ml-[250px]">
      <div class="fixed bg-white px-8 flex items-center justify-between top-0 left-0 pl-[250px] shadow-md w-screen h-[10vh]">
        <div class="pl-8">
          <h1>Dashboard</h1>
        </div>
        <div class="flex items-center gap-4">
          <img class="w-12 h-12 rounded-full object-cover" src="assets/user.png" alt="" />
          <a href="logout.php">Logout</a>
        </div>
      </div>
      <div class="p-8 mt-[10vh]">