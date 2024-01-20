<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>

<body>
  <header class="shadow header w-full h-[10vh] mx-auto">
    <div class="p-2 max-w-5xl flex items-center h-[10vh] justify-between mx-auto">
      <div>
        <a class="font-bold text-3xl" href="index.php">
          <img class="w-40" src="assets/logo.png" alt="">
        </a>
      </div>
      <div class="">
        <ul class="navlink bg-white  md:bg-[#18765B] grid sm:flex absolute sm:static top-[10vh] sm:top-auto sm:left-auto w-full left-0  items-center gap-4">
          <li class="flex">
            <a class="mx-auto rounded-md <?php active('index.php');?>" href="index.php">Home</a>
          </li>
          <li class="flex">
            <a class="mx-auto rounded-md <?php active('shop.php');?>" href="shop.php">View Shop</a>
          </li>
          <li class="flex">
            <a class="mx-auto rounded-md" href="#about">About</a>
          </li>
          <li class="flex">
            <a class="mx-auto rounded-md" href="#service">Service</a>
          </li>
          <li class="flex">
            <a class="mx-auto rounded-md" href="#contact">Contact Us</a>
          </li>
          <li class="flex">
            <a class="mx-auto rounded-md <?php active('login.php');?>" href="login.php">Login</a>
          </li>
        </ul>
      </div>
      <i class="sm:hidden fa-solid fa-bars hamburger"></i>
    </div>
  </header>
  <div class="progress-bar">
        <div class="progress"></div>
    </div>
  <button id="scrollToTopBtn" class="fas fa-arrow-up"></button>