<?php include('partials-front/menu.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>

/* for Order Section */
.order{
  width: 50%;
  margin: 0 auto;
}
.input-responsive{
  width: 90%;
  padding: 1%;
  margin-bottom: 2%;
  border: none;
  border-radius: 5px;
  font-size: 1rem;
  
}

.order-label{
  margin-bottom: 1%; 
  font-weight: bold;
}

.product-menu-img{
    width: 20%;
    float: left;
}


.product-search{
  background-image: url(./assets/images/order9.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  padding: 5% 0;
  padding-left: 20%;
  
}

img{
  width:97%;
}
.product-search input[type="search"]{
  width: 50%;
  padding: 1%;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
}


.btn-confirm{
    background-color: #ff8f9c;
    border-radius:40px;
    margin-left: 35%;
    width:22%;
    cursor:pointer;
}
.btn-confirm:hover {
  background:#ff4757;
  transition: background 0.2s ease-in-out;
  
  
}

.img-curve{
    border-radius: 15px;
    width:125px;
}
.product-menu-desc{
  width: 70%;
  float: left;
  margin-left: 8%;
}

fieldset{
  backdrop-filter: blur(8px);
}

.space{
    padding-left: 7%;
}

        </style>
</head>
<body>
   <?php 
           //Check wheather product id is set or not
           if(isset($_GET['product_id']))
                {   //Get the food id and details of the selected food
                    $product_id = $_GET['product_id'];

                    //get the details of the selected product
                    $sql = "SELECT * FROM tbl_product WHERE id=$product_id";
                    
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check product is available or not
                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['title'];                   
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                    }
                    else
                    {
                        header('location:'.SITEURL);
                    }
           }
           else
           {
            header('location:'.SITEURL);
           }
   ?>

    <section class="product-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order"> 

            <table>
              <tr>
            <fieldset>
                    <legend>Selected Product</legend>

                    <div class="product-menu-img">
                         <?php
                            
                            //Check whether the image is available or not
                            if($image_name=="")
                            {
                              echo "<div class='error'>Image Not Available </div>";
                            }
                            else
                            {
                              ?>
                             
                                <img src="<?php echo SITEURL; ?>assets/images/product/<?php echo $image_name; ?>" alt="Product" class="img-responsive img-curve" >
                              <?php
                            }
                         ?>

                    </div>
    
                    <div class="product-menu-desc">
                        <h3> <?php echo $title; ?> </h3>
                         <input type="hidden" name="product" value="<?php echo $title; ?>">

                        <p class="product-price"> ₹ <?php echo $price; ?> </p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                          </tr>
                         
                
                
                <tr>
                  <td>
                <fieldset class="space">
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Mohit Bhasin" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" pattern="[789][0-9]{9}" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="8" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                </fieldset>
                          </td>

            

             <?php
               
                 if(isset($_POST['submit']))
                 {
                    //get details from the form

                    $product = $_POST['product'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;  //total=price x qty
                    $order_date = date("Y-m-d h:i:sa");   //Order Date
                    $status = "Order";  //Ordered,  On delivery, delivered, cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                       //Save the order in database
                       $sql2 = "INSERT INTO tbl_order SET
                       product = '$product',
                       price = $price,
                       qty = $qty,
                       total = $total,
                       order_date = '$order_date',
                       status = '$status',
                       customer_name = '$customer_name',
                       customer_contact = '$customer_contact',
                       customer_email = '$customer_email',
                       customer_address = '$customer_address'
                    ";

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);
                    
                    //Check query executed or not
                    if($res==true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'> Product Ordered Sucessfully. </div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'> Failed To Order Product. </div>";
                        header('location:'.SITEURL);
                    }

                 }
             ?>

                <td>
                <fieldset class="space"> 
                    <legend>Payment</legend>

                <div class="inputBox">
                    <div class="order-label">Cards Accepted :</div>
                    <img src="./assets/images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <div class="order-label">Name on Card : </div>
                    <input type="text" placeholder="Mr. Mohit Bhasin" class="input-responsive" required>
                </div>
                <div class="inputBox">
                <div class="order-label"> Credit Card Number :</div>
                    <input type="tel" placeholder="1111-2222-3333-4444" class="input-responsive" required>
                </div>
                <div class="inputBox">
                <div class="order-label"> Exp Month : </div>
                    <input type="text" placeholder="January" class="input-responsive" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                    <div class="order-label"> Exp Year : </div>
                        <input type="text" placeholder="2025" class="input-responsive" required>
                    </div>
                    <div class="inputBox">
                    <div class="order-label"> CVV : </div>
                   <input type="text" placeholder="1234" class="input-responsive" required>
                    </div>
            </div>

            
            </fieldset>
                </td>
                </tr>
                </table>
                <br>
            <input type="submit" name="submit" value=" Confirm " class="btn-confirm">
                    <br>
            </form>
               
     </div>             
  </section>          
               
<?php include('partials-front/footer.php') ?>