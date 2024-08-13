<?php include('../config/constants.php'); ?>

<?php
if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../assets/css/loginstyle.css">

</head>
<body>
<div class="bgimage">   
<div class="container">

   <div class="content">
      <h3>Hi, <span>user</span></h3>
      <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Glad To Have You Here.</p>
      <a href="../index.php" class="btn">Enter</a>

   </div>

</div>
</div>

</body>
</html>