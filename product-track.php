

<style>
.wrapper{ 
    background-image: url(./assets/images/background.jpg); 
    background-repeat: no-repeat;
    background-size: 100% 100%; 
    padding: 1%;
    height: 80%;
    margin: 0 auto;
}

.tbl-full{
    width:100%;
}


table tr th{
    border-bottom: 1px solid black;
    padding: 1%;
    text-align:left;
}

table tr td{
  padding: 1%;
}

</style>
</head>

<?php include('partials-front/menu.php');  ?>

<body>
<div class="wrapper">

<table class="tbl-full">
            <tr>
                
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>OrderDate</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
               
            </tr>

    <div class="product-main">
        <?php
              //get the search keyword
               $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>
    
        <h2 class="title text-center success "> Searched By - <label style='color: red;'> <?php echo $search; ?></h2>

        <div class="product-grid">

        <?php

             //Get the search keyword
             $search = $_POST['search'];

             //Sql query to get product based on search keyboard
             $sql = "SELECT * FROM tbl_order WHERE customer_contact LIKE '%$search%' OR customer_email LIKE '%$search%'";

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
                
                 $product = $row['product'];
                 $price = $row['price'];
                 $qty = $row['qty'];
                 $total = $row['total'];
                 $order_date = $row['order_date'];
                 $status = $row['status'];
                 $customer_name = $row['customer_name'];
                 $customer_contact = $row['customer_contact'];
                 $customer_email = $row['customer_email'];
                 $customer_address = $row['customer_address'];

                 ?>

<tr>
                           
                           <td><?php echo $product; ?> </td>
                           <td><?php echo $price; ?></td>
                           <td><?php echo $qty; ?></td>
                           <td><?php echo $total; ?></td>
                           <td><?php echo $order_date; ?></td>

                           <td>
                            <strong>
                              <?php

                                //Ordered , On Delivery, Delivered, Cancelled
                                if($status=="Ordered")
                                {
                                  echo "<label>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                  echo "<label style='color: blue;'>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                  echo "<label style='color: green;'>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                  echo "<label style='color: red;'>$status</label>";
                                }

                              ?>
                            </strong>
                          </td>

                           <td><?php echo $customer_name; ?></td>
                           <td><?php echo $customer_contact; ?></td>
                           <td><?php echo $customer_email; ?></td>
                           <td><?php echo $customer_address; ?></td>
                           
                       </tr>


</div>
</div>

                 <?php
               }
             }
             else
             {
               //Product Not Available
               echo "<div class='error'> Order Not Found.</div>";
             }
         
               ?>
        </div>
      </div>
            </div>
</body>
</html>