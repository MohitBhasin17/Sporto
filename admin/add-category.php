<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category </h1>
        <br><br>

        <?php
             
             if(isset($_SESSION['add']))
             {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }

             if(isset($_SESSION['upload']))
             {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
             }
        ?>

        <br><br>
        <!-- Add Category Form Starts -->

        <form action="" method="POST" enctype="multipart/form-data">

                <table >
                    <tr>
                        <td> Title:   </td>
                        <td>
                            <input type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td> Select Image &nbsp; &nbsp; </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>


                    <tr>
                        <td> Featured:  </td>
                        <td>
                            <input type="radio" name="featured" value="Yes">Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    
                    <tr>
                        <td> Active:    </td>
                        <td>
                            <input type="radio" name="active" values="Yes">Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                         <input type="submit" name="submit" value="Add Category" class="btn-secondary">   
                    </td>
                    </tr>
            
                </table>
        
         </form>
        <!--Add Category Form Ends -->
        
        <?php

           //Check submit button is clicked or not 
           if(isset($_POST['submit']))
           {
              //1. Get the values from category form
              $title = $_POST['title'];

              //For radio input, we need to check whether the button is selected or not
              if(isset($_POST['featured']))
              {
                $featured = $_POST['featured'];
              }
              else
              {
                //set the default value
                $featured = "No";
              }

              if(isset($_POST['active']))
              {
                $active = $_POST['active'];
              }
              else
              {
                $active = "No";
              }

              if(isset($_FILES['image']['name']))
              {
                //Upload the Image
                $image_name = $_FILES['image']['name'];

              //upload the image only if image is selected
              if($image_name != "")
             {

          
                      //Auto Rename our Image
                      $ext = end(explode('.', $image_name));

                      //Rename the Image
                      $image_name = "Product_Category_".rand(000, 999).'.'.$ext;


                      $source_path = $_FILES['image']['tmp_name'];
                      $destination_path = "../assets/images/category/".$image_name;


                      //Finally Upload the Image
                      $upload = move_uploaded_file($source_path, $destination_path);


                      if($upload==false)
                      {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        header('location:'.SITEURL.'admin/add-category.php');

                      }
              }
              }
              else
              {
                $image_name="";
              }

              //2. Create SQL Query to Insert Category into Database
              $sql = "INSERT INTO tbl_category SET
                     title='$title',
                     image_name='$image_name',
                     featured='$featured',
                     active='$active'
                     ";

              //3. Execute the Query and save in database
              $res = mysqli_query($conn, $sql);

              //Checking the query executed or not and added or not
              if($res==true)
              {
                $_SESSION['add'] = "<div class='success'>Category Added Successfully. </div>";

                //redirecting to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
              }
              else
              {
                $_SESSION['add'] = "<div class='error'>Failed to Add Category. </div>";

                 //redirecting to manage category page
                 header('location:'.SITEURL.'admin/add-category.php');
              }
           }

        ?>

    </div>
</div>

<?php include('partials/footer.php');  ?>