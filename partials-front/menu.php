<?php 
include('config/constants.php');
include('homelogin-check.php');
?>



<!DOCTYPE html>
<html>
<head>
  <title>Sporto </title>

  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!-- google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>
<body>

  <!--HEADER -->

  <header>
    <div class="header-top">

    <div class="container">

    <div class="header-main">
      <div class="container">

        <a href="#" class="header-logo">
          <img src="https://i.postimg.cc/vmkwY2Tz/logo3.png" alt="Sporto logo" width="210" height="45">
        </a>

        <div class="header-search-container">
        <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
          <input type="search" name="search" class="search-field" placeholder="Enter product name...">
          
        </form>  
        </div>
      </div>
    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">
        
        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="<?php echo SITEURL; ?>" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="<?php echo SITEURL; ?>category.php" target="_self" class="menu-title">Categories </a>
          </li>  

          <li class="menu-category">
            <a href="<?php echo SITEURL; ?>track.php" target="_self" class="menu-title"> <img src="https://i.postimg.cc/V6MjMnYn/OIP.jpg" alt="Sporto logo" width="45" height="27"></a>
          </li>

          <li class="menu-category">
            <a href="<?php echo SITEURL; ?>AboutUs.php" target="_self" class="menu-title">About US </a>
          </li> 
          
          <li class="menu-category">
            <a href="<?php echo SITEURL; ?>./homelogin/logout.php" target="_self" class="menu-title">logout </a>
          </li>
          
        </ul>
      </div>
    </nav> </div> </div>
  </header>