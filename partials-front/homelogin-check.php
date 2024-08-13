<?php
   
   //Check whether the user is logged in or not
   if(!isset($_SESSION['user']))
   {
        //Redirect to Login Page
        header('location:'.SITEURL.'./homelogin/login_form.php');
   }
?>