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
        $path = "../assets/images/category/".$image_name;

        //Remove the image
        $remove = unlink($path);

        //If failed to remove image
        if($remove==false)
        {
            $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image. </div>";

            //redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
            

        }
    }

    //Delete data from database
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

            //check whether the data is delete from database or not
            if($res==true)
            {
                $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully. </div>";

                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                $_SESSION['delete'] = "<div class='error'>Failed to Delete Category. </div>";

                header('location:'.SITEURL.'admin/manage-category.php');
            }
  }
  else
  {
    //Redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');
  }
?>