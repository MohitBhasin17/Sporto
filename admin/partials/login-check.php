
<?php

      //Authorization - Access Control

      if(!isset($_SESSION['user'])) 
      {
        //user is not logged in , redirect to login page
        $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel. </div>";

        //Redirect to Login Page
        header('location:'.SITEURL.'admin/login.php');
      }

?>