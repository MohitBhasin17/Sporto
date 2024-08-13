<?php include('partials-front/menu.php');  ?>

<body>

    <div class="product-main">
        <?php
              //get the search keyword
               $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>
    
        <h2 class="title text-center success "> Product On Your Search - <label style='color: red;'> <?php echo $search; ?></h2>

        <div class="product-grid">

        <?php

             //Get the search keyword
             $search = $_POST['search'];

             //Sql query to get product based on search keyboard
             $sql = "SELECT * FROM tbl_product WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

             //Execute the query
             $res = mysqli_query($conn , $sql);

             //Count rows
             $count = mysqli_num_rows($res);

             //check whether product available or not
             if($count>0)
             {
               //product available
               while($row=mysqli_fetch_assoc($res))
               {
                 //Get the details
                 $id = $row['id'];
                 $title = $row['title'];
                 $price = $row['price'];
                 $description = $row['description'];
                 $image_name = $row['image_name'];
                 ?>

                   <div class="showcase">
          
                             <div class="showcase-banner">

                             <?php

                             //Check whether image is available or not
                             if($image_name=="")
                             {
                               //Image not available
                               echo "<div class='error'>Image not available.</div>";
                             }
                             else
                             {
                               //Image Available
                               ?>
                                <img src="<?php echo SITEURL; ?>assets/images/product/<?php echo $image_name; ?>" alt="bat" class="product-img default"
                                 width="300">
                               <?php
                             }

                             ?>
            
                             </div>
        
                             <div class="showcase-content">
                               <a href="#" class="showcase-category"><?php echo $title; ?></a>
        
                               <h3>
                                 <a href="#" class="showcase-title"> <?php echo $description; ?></a>
                               </h3>
        
                               <div class="price-box">
                                 <p class="price">₹<?php echo $price; ?></p>
                               </div>             
                             </div> 
                             <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn-primary">Shop now </a>             
                           </div>
                 <?php
               }
             }
             else
             {
               //Product Not Available
               echo "<div class='error'> Product Not Found.</div>";
             }
         
               ?>
        </div>
      </div>
</body>
</html>