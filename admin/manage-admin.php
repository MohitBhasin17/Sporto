<?php include('partials/menu.php') ?>


        <!--
               If forgot the password then go to phpmyadmin
                and copy the encrypted password and
               go to google and type decrypt md5 and enter the encrypted password . you
               will get the password there.
            
        -->


    <!-- Main Content Section Starts   -->
    <div class="main-content">
        <div class="wrapper">
         <h1>Manage Admin</h1>
         <br>  <br>

         <?php
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];  //Displaying Session Message
                unset($_SESSION['add']);   //Remove Session Message
              }

              if(isset($_SESSION['delete']))
              {
                echo $_SESSION['delete'];  //Displaying Session Message
                unset($_SESSION['delete']);   //Remove Session Message
              }

              if(isset($_SESSION['update']))
              {
                echo $_SESSION['update'];  
                unset($_SESSION['update']);  
              }
              
         ?>
         <br><br><br>

         <!--   Button to Add Admin   -->
         <a href="add-admin.php" class="btn-primary">Add Admin </a>
         <br> <br> <br>

         <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php 
                 //Query to Get all Admin
                 $sql = "SELECT * FROM tbl_admin";

                 //Execute the Query
                 $res = mysqli_query($conn, $sql);

                 //Check whether the Query is Executed or Not
                 if($res==TRUE)
                 {
                    //Count Rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res);  //Function to get all the rows in database
                    
                    $sn=1;  //Create a Variable and Assign the value
                    
                    //Check the num of rows
                    if($count>0)
                    {
                        //We have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];

                            //Display the Values in our Table
                            ?>

                           <tr>
                                <td> <?php echo $sn++;  ?> </td>
                                <td><?php echo $full_name;  ?> </td>
                                <td> <?php echo $username; ?> </td>
                                <td>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Admin </a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> Delect Admin </a>
                                </td>
                            </tr>


                            <?php
                        }

                    }
                    else
                    {
                        //We do not have Data in Database
                        
                    }
                 }
            ?>

         </table>

        </div>
    </div>
    <!--  Main Content Section Ends  --> 

    <?php include('partials/footer.php') ?>