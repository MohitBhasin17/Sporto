<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1>Customer Reviews </h1>
    <br> <br> 

         <?php


         if(isset($_SESSION['delete']))
         {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
         }


         ?>

    <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Message</th>
               
            </tr>

            <?php
            //Create a sql query to get all the product
            $sql = "SELECT * FROM user_queries";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Count rows to check whether we have product or not
            $count = mysqli_num_rows($res);

            //Create serial number variable and set default value as 1
            $sn=1; 

            if($count>0)
            {
                //we have product in database
                //get the products from database and display
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the values from individual columns
                    $sr_no = $row['sr_no'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $message = $row['message'];

                    ?>
                         <tr>
                          <td><?php echo $sn++; ?>. </td>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $email; ?></td>                        
                          <td><?php echo $message; ?></td>
                        
                          <td>
                          <a href="<?php echo SITEURL; ?>admin/delete-reviews.php?sr_no=<?php echo $sr_no; ?>" class="btn-danger"> Delect Reviews </a>
                           </td>
                        </tr>


                    <?php

                }
            }
            else
            {
                //Product not Added in Database
                echo "<tr> <td colspan='7' class='error'>Review Not Added Yet.</td></tr>";
            }
            ?>

         </table>
</div>
</div>

<?php include('partials/footer.php'); ?>