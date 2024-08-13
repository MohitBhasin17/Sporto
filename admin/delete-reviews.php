<?php 
    
    //Include constants.php file here
    include('../config/constants.php');

   //1.Get the ID of Admin to be delected
   $sr_no = $_GET['sr_no'];


   //2.Create SQL Query to Delete Admin
   $sql = "DELETE FROM user_queries WHERE sr_no=$sr_no";

   //Execute the Query
   $res = mysqli_query($conn, $sql);

   //Check whether the query executed successfully or not
   if($res==true)
   {
    $_SESSION['delete'] = "<div class='success'>Review Deleted Successfully !</div>";
    //Redirect to Manage admin page
    header('location:'.SITEURL.'admin/manage-reviews.php');
   }
   else
   {
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Review. Try Again Later. </div>";
    header('location:'.SITEURL.'admin/manage-reviews.php');
   }


   //3.Redirect to Manage Admin page with message (success/error)

   ?>