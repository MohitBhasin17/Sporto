<?php include('../config/constants.php'); ?>

<?php

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);  
   $pass = md5($_POST['password']);

 

   $select = " SELECT * FROM user_login WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
        
         $_SESSION['user'] = $email;  //To check whether user is logged in or not

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

       
   }
   else
   {
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../assets/css/loginstyle.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
      <br>
      <p><a href="../admin/index.php">Admin Login</a></p>
   </form>

</div>

</body>
</html>