<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category </h1>

        <br><br>

        <?php
           
           if(isset($_GET['id']))
           {
            //1. Get the ID of selected Admin
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_category WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            //Check Whether the query is executed or not
            if($count==1)
            {
                //Get all the data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

            }
            else
            {

             $_SESSION['no-category-found'] = "<div class='error'>Category not Found. </div>";
             //Redirect to Manage Admin Page
              header('location:'.SITEURL.'admin/manage-category.php');
            }
                
        }
        else
        {
         //Redirect to Manage Admin Page
          header('location:'.SITEURL.'admin/manage-category.php');
        }   

    ?>

        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
            
            <tr>
              <td>Title :  </td>
              <td>
                <input type="text" name="title" value="<?php echo $title; ?>">
              </td>
            </tr>

            <tr>
              <td>Current Image: &nbsp; &nbsp; &nbsp; &nbsp;</td>
              <td>
                    <?php
                          if($current_image !="")
                          {
                            //diplay image
                            ?>
                            <img src="<?php echo SITEURL; ?>assets/images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                          }
                          else
                          {
                            //display message
                            echo "<div class='error'>Image Not Added. </div>";
                          }

                    ?>
              </td>
            </tr>

            <tr>
              <td>New Image : </td>
              <td>
                <input type="file" name="image">
              </td>
            </tr>

                    <tr>
                        <td> Featured:  </td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                        </td>
                    </tr>
                    

                    <tr>
                        <td> Active:  </td>
                        <td>
                            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                        </td>
                    </tr>
                


                        <tr>
                        <td> 
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" >  
                            <input type="hidden" name="id" value="<?php echo $id; ?> ">            
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                        </td>
                        </tr>


             </table>

        </form>

        <?php 

        if(isset($_POST['submit']))
        {
          //Get all the values from our form
          $id = $_POST['id'];
          $title = $_POST['title'];
          $current_image= $_POST['current_image'];
          $featured = $_POST['featured'];
          $active = $_POST['active'];

          //Updating new image 
          if(isset($_FILES['image']['name']))
          {
            $image_name = $_FILES['image']['name'];

                //checking img is available or not
                if($image_name !="")
                {
                  //Available
                  //A. Upload the new image
                  
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
                        header('location:'.SITEURL.'admin/manage-category.php');

                      }

                  //B. Remove the Current Image
                  if($current_image!="")
                  {
                    $remove_path= "../assets/images/category/".$current_image;

                    $remove = unlink($remove_path);
  
                    //check the image is removed or not
                    if($remove==false)
                    {
                      $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image. </div>";
                      header('location:'.SITEURL.'admin/manage-category.php');
  
                    }

                  }
             

                }
                else
                {
                  $image_name = $current_image;
                }
          }
          else
          {
            $image_name = $current_image;
          }
          //Update the database
          $sql2 ="UPDATE tbl_category SET
          title = '$title',
          image_name = '$image_name',
          featured = '$featured',
          active = '$active'
          WHERE id=$id
          ";

          //Execute the Query
          $res2 = mysqli_query($conn, $sql2);

          //Check whether executed or not
          if($res2==true)
          {
            $_SESSION['update'] = "<div class='success'>Category Updated Successfully. </div>";
            header('location:'.SITEURL.'admin/manage-category.php');
          }
          else 
          {
            //failed to update category
            $_SESSION['update'] = "<div class='error'>Failed to Update Category. </div>";
            header('location:'.SITEURL.'admin/manage-category.php');            
          }
        }
         ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>