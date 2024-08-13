<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>category-products</title>
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
  text-align:center;
  background-color: var(--salmon-pink);
  border-radius: 20px;
  font-size: var(--fs-3);

}

  
    .product-grid {
       grid-template-columns: repeat(4, 1fr); 
      margin-bottom: 50px;
      }
  
       .showcase {
      transition: all ease 0.5s;
  }
  
  .showcase:hover {
      scale: 1.1;
  }
  
  
.shop-button{
  padding-bottom: 10px;
}
    </style>
</head>
<body>


  <?php
    //Check whether id is passed or not
    if(isset($_GET['category_id']))
    {
        //Category id is set and get the id
        $category_id = $_GET['category_id'];

        //Get the Category title based on category id
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Get the value from database
        $row = mysqli_fetch_assoc($res);

        //Get the title
        $category_title = $row['title'];
    }
    else
    {
        //Category not passed
        //Redirect to Home Page.
        header('location:'.SITEURL);
    }

  ?>
   
    
    <div class="product-main">

        <h2 class="title"> <?php echo $category_title ?> </h2>

        <div class="product-grid">

          <?php
            
            //Create sql query to get products based on selected category
            $sql2 = "SELECT * FROM tbl_product WHERE category_id=$category_id";

            //Execute the query
            $res2 = mysqli_query($conn , $sql2);

            //Count the rows
            $count2 = mysqli_num_rows($res2);

            //Check whether product is avialable or not
            if($count2>0)
            {
                //Product is available
                while($row2=mysqli_fetch_assoc($res2))
                {   $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];

                    ?>

                    <div class="showcase">
          
                            <div class="showcase-banner">

                                <?php
                                if($image_name=="")
                                {
                                    //Image not available
                                    echo "<div class='error'>Image Not Avialable.</div>";
                                }
                                else
                                {
                                    //Image Avaialable
                                    ?>
                                        
                                        <img src="<?php echo SITEURL; ?>assets/images/product/<?php echo $image_name; ?>" alt="Product Image...." class="product-img"
                                 width="300">
                                        
                                    <?php
                                }


                                ?>

                            </div>
        
                            <div class="showcase-content">
                                <div class="showcase-category"><?php echo $title; ?></div>
        
                                <h3>
                                <div class="showcase-title"> <?php echo $description; ?></div>
                                </h3>
        
                                <div class="price-box">
                                <p class="price">₹<?php echo $price; ?> </p>
                                </div>             
                            </div> 
                            <div class="shop-button">
                            <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn-primary">Shop now </a>                
                        </div>
                              </div>

                    <?php

                }
            }
            else
            {
                //product not available
                echo "<div class='error'>Product not available.</div>";

            }

          ?>
 
        </div>
      </div>
</body>
</html>

<?php include('partials-front/footer.php') ?>