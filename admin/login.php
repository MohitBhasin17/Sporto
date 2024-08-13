<?php include('../config/constants.php');  ?>

<!DOCTYPE html>
<html >
<head>
   <title>Admin login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="login.css">

</head>
<body>

   <!--  Login Form Start here  -->
<div class="form-container">

   <form action="" method="POST">
      <h3>admin login </h3>

      <?php
      if(isset($_SESSION['login']))
      {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
         
      }

      if(isset($_SESSION['no-login-message']))
      {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
      }
      
      ?>


      <input type="text" name="username" required placeholder="Enter Username">
      <input type="password" name="password" required placeholder="Enter Password">
      <input type="submit" name="submit" value="Login" class="form-btn">
      <br>
      <p><a href="../homelogin/login_form.php">User Login</a></p>
      
   </form>

</div>

</body>
</html>


<?php
  if(isset($_POST['submit']))
  {
    // 1. Get the Data from Login form
    $username = mysqli_real_escape_string($conn , $_POST['username']);
    $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn , $raw_password);

    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);

    //4. Count rows to check user exists or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //User available
        $_SESSION['login'] = "<div class='success'>Login Successful. </div>";
        $_SESSION['user'] = $username;    //To whether user is logged in or not

        //Redirect to home page/ Dashboard
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        //User not available
        $_SESSION['login'] = "<div class='error'>Username or Password Did not Match.</div>";
        //Redirect to home page/ Dashboard
        header('location:'.SITEURL.'admin/login.php');
    }
    
  }

?>