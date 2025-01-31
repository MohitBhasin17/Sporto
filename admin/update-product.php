<?php include('partials/menu.php'); ?>

<?php
if(isset($_GET['id']))
{
    //get all details
    $id = $_GET['id'];

    //SQL Query to selected product
    $sql2 = "SELECT * FROM tbl_product WHERE id=$id";

    $res2 = mysqli_query($conn, $sql2);

    $row = mysqli_fetch_assoc($res2);

    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $current_image = $row['image_name'];
    $current_category = $row['category_id'];
    $featured = $row['featured'];
    $active = $row['active'];

}
else
 {
    header('location:'.SITEURL.'admin/manage-product.php');

 }
?>
 <div class="main-content">
    <div class="wrapper">
        <h1>Update Product </h1>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
            
            <tr>
              <td>Title :  </td>
              <td>
                <input type="text" name="title" value="<?php echo $title ?>" >
              </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"  <?php echo $description; ?> ></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price ?>">
                </td>
            </tr>
            
            <tr>
                <td>Current Image: </td>
                <td>
                    <?php
                          if($current_image == "")
                          {   //img not available
                            echo "<div class='error'>Image Not Available. </div>";
                          }
                          else
                          {
                            ?>
                            <img src="<?php echo SITEURL; ?>assets/images/product/<?php echo $current_image; ?>" width="100px">
                            <?php
                          }

                    ?>
                </td>
            </tr>

            <tr>
                <td> Select New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                     <select name="category">
                        <?php

                        $sql="SELECT * FROM tbl_category WHERE active='Yes' ";

                        //Execute the Query
                        $res=mysqli_query($conn, $sql);
            
                        $count = mysqli_num_rows($res);
            
                        //Check Whether the query is executed or not
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $category_title = $row['title'];
                                $category_id = $row['id'];

                               // echo "<option value='$category_id'>$category_title </option>";
                               ?>
                               <option <?php if($current_category==$category_id){echo "selected";} ?>  <?php echo $category_id; ?> ><?php echo $category_title; ?> </option>
                               <?php
                            }
                        }
                        else
                        {
                            echo "<option value='0'>Category Not Available. </option>";
                        }

                        ?>
                       
                     </select>
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
                 <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                </td>
              </tr>            

        </table>
        </form>

        <?php 

            if(isset($_POST['submit']))
            {
                //1.Get all the values from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image= $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2. Upload the image if selected
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
                      $image_name = "Product-Name-".rand(000, 999).'.'.$ext;


                      $src_path = $_FILES['image']['tmp_name'];
                      $dest_path = "../assets/images/product/".$image_name;


                      //Finally Upload the Image
                      $upload = move_uploaded_file($src_path, $dest_path);


                      if($upload==false)
                      {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image. </div>";
                        header('location:'.SITEURL.'admin/manage-product.php');

                      }

                     //B. Remove the Current Image
                        if($current_image!="")
                        {
                            $remove_path= "../assets/images/product/".$current_image;

                            $remove = unlink($remove_path);
        
                            //check the image is removed or not
                            if($remove==false)
                            {
                            $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current Image. </div>";
                            header('location:'.SITEURL.'admin/manage-product.php');
        
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
                $sql3 ="UPDATE tbl_product SET
                title = '$title',
                description = '$description',
                price = '$price',
                image_name = '$image_name',
                category_id = '$category',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
                ";

                //Execute the Query
                $res3 = mysqli_query($conn, $sql3);

                //Check whether executed or not
                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>Product Updated Successfully. </div>";
                    header('location:'.SITEURL.'admin/manage-product.php');
                }
                else 
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Update. </div>";
                    header('location:'.SITEURL.'admin/manage-product.php');            
                }
            }
        ?>
    </div>
</div>


<?php include('partials/footer.php'); ?>

