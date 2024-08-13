<?php 
    
    //Include constants.php file here
    include('../config/constants.php');

  //check whether the id and image_name value is set or not
  if(isset($_GET['id']) AND isset($_GET['image_name']))
  {
    //Get the value and delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Remove the physical image file is available
    if($image_name !="")
    {
        //Image is Available. So remove it
        $path = "../assets/images/product/".$image_name;

        //Remove the image
        $remove = unlink($path);

        //If failed to remove image
        if($remove==false)
        {
            $_SESSION['upload'] = "<div class='error'>Failed to Remove Product Image. </div>";

            //redirect to manage category page
            header('location:'.SITEURL.'admin/manage-product.php');
            

        }
    }

    //Delete data from database
    $sql = "DELETE FROM tbl_product WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

            //check whether the data is delete from database or not
            if($res==true)
            {
                $_SESSION['delete'] = "<div class='success'>Product Deleted Successfully. </div>";

                header('location:'.SITEURL.'admin/manage-product.php');
            }
            else
            {
                $_SESSION['delete'] = "<div class='error'>Failed to Delete Product. </div>";

                header('location:'.SITEURL.'admin/manage-product.php');
            }
  }
  else
  {  
    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access. </div>";
    //Redirect to manage category page
    header('location:'.SITEURL.'admin/manage-product.php');
  }
?>