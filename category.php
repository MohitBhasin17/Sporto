<?php include('partials-front/menu.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         
.img-container {
  margin-left: 45px;
  position: relative;
  padding: 50px;
  float: left;
  
}

body{
  background-color: #dfe6e9;
}
.img-content {
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  font-size: 1.2rem;
  z-index: 2;
  text-align: center;
  transition: all 0.3s ease-in-out 0.1s;
}

.img-content h3 {
  color: #fff;
  font-size: 2.2rem;
}

h1{
  color: hsl(152, 53%, 39%);
}
.img-container:hover::after {
  opacity: 0.3;
  transform: scaleY(1);
}

.img-container:hover .img-content {
  opacity: 1;
  top: 40%;
}

.photo{
  border-radius: 50px;
  
}


.heading{
  padding-left: 4%;
  padding-top: 0.4%;
  font-family: sans-serif;
}



 </style>
    <title>Category</title>
    <link rel="stylesheet" href="./assets/css/style-prefix.css">

</head>

<body>

  <?php 

       //Create SQl Query to display categories from database
       $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes'";
       //Execute the Query
       $res = mysqli_query($conn, $sql);
       //Count rows to check whether category is available or not
       $count = mysqli_num_rows($res);

       if($count>0)
       {
            //Categories Available
            while($row=mysqli_fetch_assoc($res))
            {
              //Get the values like id, title, image_name
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              ?>
 
                  <div class="img-container">      
                      <?php
                          if($image_name=="")
                          {
                            echo "<div class='error'>Image Not Available </div>";
                          }
                          else
                          {
                            ?>
                              <img src="<?php echo SITEURL; ?>assets/images/category/<?php echo $image_name; ?>" alt="Image Nahi AA rahi" height="160px" width="160px" class="photo" />
                            <?php
                          }
                      ?>
                          
                          <div class="img-content">          
                            <h3><a href="<?php echo SITEURL; ?>category-products.php?category_id=<?php echo $id; ?>"><h3><?php echo $title; ?></h3></a> 
                          </div>        
                    </div>   

              <?php

            }
       }
       else
       {
             //Categories not Available
             echo "<div class='error'>Category Not Added. </div>";
       }

   ?>

     

</body>
</html>