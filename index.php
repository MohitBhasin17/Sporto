<?php include('partials-front/menu.php') ?>

<?php 
     if(isset($_SESSION['order']))
     {
       echo $_SESSION['order'];
       unset($_SESSION['order']);
     }

     if(isset($_SESSION['send']))
     {
       echo $_SESSION['send'];
       unset($_SESSION['send']);
     }

?>


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
  
 


  .shop-button{
  padding-bottom: 10px;
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
  
  </style>


  <!-- MAIN-->

  <main>

    <!-- BANNER -->
 

      <div class="container">
       <div class="slider">
        <figure>
        

          <div class="slide">     <!-- Banner 1 -->
            <div class="slider-item">        
              <img src="https://i.postimg.cc/yxJ5PMg9/beautiful-stadium-photo-wallpaper.jpg" alt="Poster1" >
              <div class="banner-content">
                <p class="banner-subtitle">Sports Wear</p> 
                <h2 class="banner-title">Latest Sports Accessories</h2>
  
              
                <a href="products.php" class="banner-btn">Shop now</a> 
              </div>
          </div>
        </div>


          <div class="slide">     <!-- Banner 2 -->
            <div class="slider-item">
              <img src="https://i.postimg.cc/wTjkHS0t/poster3.jpg" alt="Poster2" > 
              <div class="banner-content">
                <p class="banner-subtitle">IPL Season</p>
                <h2 class="banner-title">MI and CSK Jersey </h2> 
                <a href="products.php" class="banner-btn">Shop now</a>
              </div>
            </div> </div>
          


          <div class="slide">     <!-- Banner 3 -->
            <div class="slider-item">
            <img src="https://i.postimg.cc/fLpjKvGw/poster4.jpg" alt="new fashion summer sale" >
            <div class="banner-content">
              <p class="banner-subtitle">Sale On New fashion</p>
              <h2 class="banner-title"> All Season sale</h2>
              <a href="products.php" class="banner-btn">Shop now</a>
            </div>
          </div>
          </div>


          <div class="slide">     <!-- Banner 4 -->         
           <div class="slider-item">
            <img src="https://i.postimg.cc/8zcRq9T1/poster5.jpg" alt="new fashion summer sale"> 
            <div class="banner-content">
              <p class="banner-subtitle">Product Quality</p>
              <h2 class="banner-title">High Quality and branded Accessories</h2>
             
               <a href="products.php" class="banner-btn">Shop now</a>
            </div>
          </div>           
          </div>
      
      </figure>  
  </div>
</div>
    

    <!--     - PRODUCT
    -->

    <div class="product-container">

      <div class="container">
       

          <!--
            - PRODUCT GRID         -->
          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">

            <?php
               
               //SQL Query
               $sql2 = "SELECT * FROM tbl_product WHERE featured='YES' ";

               //Execute the Query
               $res2 = mysqli_query($conn, $sql2);

               //Count Rows
               $count2 = mysqli_num_rows($res2);

               //Check product is available or not
               if($count2>0)
               {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                      //Get all the values
                      $id = $row['id'];
                      $title = $row['title'];
                      $price = $row['price'];
                      $description = $row['description'];
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
                                      <img src="<?php echo SITEURL; ?>assets/images/product/<?php echo $image_name; ?>" alt="Sunglasses" class="product-img default"
                                width="300" />
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

                            <div class="shop-button">
                            <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn-primary">Shop now </a> 
                          </div>
                                </div>

                      <?php
                    }
               }
               else
               {
                  echo "<div class='error'>Product Not Available. </div>";
               }

            ?>


            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- TESTIMONIALS-->

    <section id="testimonials">
      <h2 class="testimonial-title">What Our Customers Say</h2>
      <div class="testimonial-container container">
          <div class="testimonial-box">
              <div class="customer-detail">
                  <div class="customer-photo">
                      <img src="https://i.postimg.cc/tJJdj93R/images-1.jpg" alt="" />
                      <p class="customer-name">Deepak Gupta</p>
                  </div>
              </div>
             
              <p class="testimonial-text">
                 Sporto meets our needs perfectly. It is a great platform for buying the branded product at a efficient cost. 
              </p>

          </div>
          <div class="testimonial-box">
              <div class="customer-detail">
                  <div class="customer-photo">
                      <img src="./assets/images/testimonial-1.jpg" alt="" />
                      <p class="customer-name">Ananya Singh</p>
                  </div>
              </div>
              
              <p class="testimonial-text">
                  Purchasing of the sports products are very much simple in this website. 
                  It has many user friendly feathers which I loved it.
              </p>

          </div>
          <div class="testimonial-box">
              <div class="customer-detail">
                  <div class="customer-photo">
                      <img src="https://i.postimg.cc/52dzPBR2/images-2.jpg" alt="" />
                      <p class="customer-name"> Dilip Maurya</p>
                  </div>
              </div>
             
              <p class="testimonial-text">
                 I am a Cricketer and I have purchase my whole kit from this website. 
                 The Quality of product was great and it has fast delivery system.
              </p>
          </div>
      </div>
  </section>
  </main>



  <section id="contact">
    <div class="contact-container container">
        <div class="contact-img">
            <img src="https://i.postimg.cc/hGXrQVvb/download.jpg" alt=""  />
        </div>

        <div class="form-container">

          <form method="POST">
            <h2>Contact Us</h2>
            <input type="text" name="name" placeholder="Your Name" required />
            <input type="email" name="email" placeholder="E-Mail" required/>
           
            <textarea  name="message" cols="30" rows="6" placeholder="Type Your Message" required></textarea>
            
              <button type="submit" name="send" class="btn btn-primary"><pre>    SEND    </pre></button>
           
   

            </form>
           </div>
         </div>
       </section>

       

       
       <?php
               
               if(isset($_POST['send']))
               {
                  //get details from the form

                  $name = $_POST['name'];
                  $email = $_POST['email'];
                 
                 
                  $message = $_POST['message'];
                 
                     //Save the order in database
                     $sql = "INSERT INTO user_queries SET

                     name = '$name',
                     email = '$email',
                    
                     message = '$message'
                  ";

                  //Execute the Query
                  $res = mysqli_query($conn, $sql);
                  
                  //Check query executed or not
                  if($res==true)
                  {
                      $_SESSION['send'] = "<div class='success text-center'> Message Send Sucessfully. </div>";
                      header('location:'.SITEURL);
                  }
                  else
                  {
                      $_SESSION['send'] = "<div class='error text-center'> Failed To Send Message. </div>";
                      header('location:'.SITEURL);
                  }

               }
           ?>
    
          
  <!-- FOOTER -->

<?php include('partials-front/footer.php') ?>