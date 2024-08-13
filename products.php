<?php include('partials-front/menu.php') ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cricket</title>
    <style>

:root{
    
  --spanish-gray: hsl(0, 0%, 60%);
  --sonic-silver: hsl(0, 0%, 47%);
  --eerie-black: hsl(0, 0%, 13%);
  --salmon-pink: hsl(353, 100%, 78%);
 
  --davys-gray: hsl(0, 0%, 33%);
  --cultured: hsl(0, 0%, 93%);
  --white: hsl(0, 100%, 100%);
  --onyx: hsl(0, 0%, 27%);

  /**
   * typography
   */

  --fs-1: 1.563rem;
  --fs-2: 1.375rem;
  --fs-3: 1.25rem;
  --fs-4: 1.125rem;
  --fs-5: 1rem;
  --fs-6: 0.938rem;
  --fs-7: 0.875rem;
  --fs-8: 0.813rem;
  --fs-9: 0.75rem;
  --fs-10: 0.688rem;
  --fs-11: 0.625rem;

}


html {
  font-family: "Poppins", sans-serif;
}

.product-main { margin-bottom: 0px; }

.product-grid {
  
  display: grid;
  -ms-grid-columns: 1fr;
  grid-template-columns: 1fr;
  gap: 25px;
}

.product-grid .showcase {
  border: 2px solid var(--cultured);
  border-radius: 25px;
  overflow: hidden;
  object-fit: contain;
}

.price-box{
  font-size: var(--fs-7);
  font-weight: var(--weight-500);
  --fs-7: 1.125rem; 
  
}
.product-grid .showcase-banner { position: relative; 
padding-top: 20px;
padding-bottom: 20px;
object-fit: contain;


}

.product-grid .product-img {
  width: 90%;
  height: 260px;
  object-fit: contain;
}



.product-grid .showcase-content {
    width:100%;
  }
.product-grid .showcase-content { padding: 10px 25px 0; }

.product-grid .showcase-category {
  color: var(--salmon-pink);
  font-size: var(--fs-5);
  font-weight: var(--weight-500);
  text-transform: uppercase;
  margin-bottom: 10px;
}

.product-grid .showcase-title {
  color: var(--sonic-silver);
  font-size: var(--fs-8);
  font-weight:bold;
  text-transform: capitalize;
  letter-spacing: 1px;
  margin-bottom: 10px;
  text-decoration: none;
  
}


.product-grid .price-box {
  gap: 10px;
  font-size: var(--fs-7);
  color: var(--eerie-black);
  margin-bottom: 10px;
}


.product-grid {
    -ms-grid-columns: 1fr 30px 1fr;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

.product-grid .price { font-weight: var(--weight-700); }
.product-grid del { color: var(--sonic-silver); }

.title{
  text-align:center
}

  .product-grid {
     grid-template-columns: repeat(4, 1fr); }

     .showcase-banner img{
    transition: all ease 0.5s;
}

.showcase-banner:hover img{
    scale: 1.2;
}

    </style>
</head>
<body>
   
    
    <div class="product-main">

        <div class="product-grid">
            
            <?php
               //Display product  that are Active
               $sql = "SELECT * FROM tbl_product WHERE active='Yes' ";

               //Execute the Query
               $res = mysqli_query($conn, $sql);

               //Count Rows
               $count = mysqli_num_rows($res);

               //Check product is available or not
               if($count>0)
               {
                  while($row=mysqli_fetch_assoc($res))
                  {
                     $id = $row['id'];
                     $title = $row['title'];
                     $description = $row['description'];
                     $price = $row['price'];
                     $image_name = $row['image_name'];
                     ?>

                                                
                      <div class="showcase">
              
                       <div class="showcase-banner">

              <?php
                    if($image_name=="")
                    {
                      echo "<div class='error'>Image Not Available </div>";
                    }
                    else
                    {
                      ?>
                        <img src="<?php echo SITEURL; ?>assets/images/product/<?php echo $image_name; ?>" alt="product image" class="product-img default" />
                      <?php
                    }
                ?>
  
              </div>
            
              <div class="showcase-content">
                <p class="showcase-category"> <?php echo $title; ?> </p>
            
                <h3>
                  <p class="showcase-title"> <?php echo $description; ?> </p>
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
                echo "<div class='error'>Image Not Available </div>";
               }
            ?>
          


          
        </div>
      </div>
</body>
</html>
<?php include('partials-front/footer.php') ?>