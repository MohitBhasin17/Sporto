<?php 
      include('../config/constants.php'); 
      include('login-check.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
   <!--  Menu Section Starts  --> 
   <div class="menu text-center">
    <div class="wrapper"> 
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-product.php">Product</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="manage-reviews.php">Reviews</a></li>
            <li><a href="logout.php">Logout</a></li>

          </ul>
    </div>
   </div>
   
   <!--  Menu Section Ends  --> 