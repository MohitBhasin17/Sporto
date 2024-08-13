<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>
        <br><br>

        <?php

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">

        <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="title" placeholder="Title of the Product">

            </td>
        </tr>

        <tr>
            <td>Description:</td>
            <td>
                <textarea name="description"  cols="30" rows="5" placeholder="Description of the product"></textarea>
            </td>
        </tr>

        <tr>
            <td>Price:</td>
            <td>
                <input type="number" name="price">
            </td>
        </tr>

        <tr>
            <td> Select Image:</td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>

        <tr>
            <td>Category:</td>
            <td>
                <select name="category">

                   <?php
                   //Create PHP code to display categories from database
                   //1. Create SQL to get all active categories from database
                   $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                   //Executing query
                   $res = mysqli_query($conn, $sql);

                   //count Rows to check whether we have category or not.
                   $count = mysqli_num_rows($res);

                   //If Count is greater than 0, we have categories else we do not have categories
                   if($count>0)
                   {
                    // we have categories
                    while($row=mysqli_fetch_assoc($res))
                    {
                        
                        //get the details of the categories
                        $id = $row['id'];
                        $title = $row['title'];
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                        <?php
                    }
                   }
                   else{

                    // we do not have categories
                    ?>
                    <option value="0">No Categories Found</option>
                    <?php
                   }

                   // 2. Display on Dropdown
                   ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Featured:</td>
            <td>
                <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No"> No
            </td>
        </tr>

        <tr>
            <td>Active:</td>
            <td>
                <input type="radio" name="active" value="Yes"> Yes
                <input type="radio" name="active" value="No"> No
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Product" class="btn-secondary">
            </td>
        </tr>
        </table>
        </form>

        <?php

        //check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
            // Add the product in database
            // echo 'clicked'

            //1. get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //check whether radio button for featured and active are clicked or not
            if(isset($_POST['featured']))
            {
                $featured= $_POST['featured'];
            }
            else
            {
                $featured = "No"; //setting the default value.

            }

            if(isset($_POST['active']))
            {
                $active= $_POST['active'];
            }
            else
            {
                $active = "No"; //setting the default value.

            }

            //2.Upload the image if selected
            // check whether the select image is click or not and upload the image only if the image is selected
            if(isset($_FILES['image']['name']))
            {
                //Get the details of the selected image
                $image_name = $_FILES['image']['name'];

                //check whether the image is selected or not and upload image only if selected
                if($image_name!="")
                {
                    //Image is selected
                    //A. Rename the image
                    //Get the extension of selected image(jpg,png,gif,etc...) "ansh-pareek.jpg" ansh-pareek jpg
                    $ext = end(explode('.', $image_name));

                    //Create new name for image
                    $image_name = "Product-Name-".rand(0000,9999).".".$ext; //New Image Name May be "Product-Name-657.jpg"

                    //B. Upload the Image
                    //Get the Src Path and Destination Path

                    //Source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //Destination path for the image to be uploaded
                    $dst="../assets/images/product/".$image_name;

                    //Finally Upload the Product image
                    $upload = move_uploaded_file($src, $dst);

                            //check whether image uploaded or not
                            if($upload==false)
                            {
                                //Failed to Upload the image
                                //Redirect to the add Product page with error message
                                $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                                header('location:'.SITEURL.'admin/add-product.php');

                            }


                }
            }
            else
            {
                $image_name = ""; //setting default value as blank

            } 
            //3. Insert Into Database

            //Create a sql query to save or add product
            // for numerical we do not need to pass value inside quotes '' but for string value it is compulsary to add quotes ''
            $sql2 = "INSERT INTO tbl_product SET
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'
            ";

            //Execute the query
            $res2 = mysqli_query($conn, $sql2);

            //check whether data inserted or not
            //4. Redirect with message to mange the product page.

            if($res2 == true)
            {
                //data inserted succesfully
                $_SESSION['add']="<div class='success'>Product Added Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-product.php');
            }
            else
            {
                //Failed to insert data
                $_SESSION['add'] = "<div class='error'>Failed to add Product...</div>";
                header('location:'.SITEURL.'admin/manage-product.php');
            }
        }

        ?>
    </div>
</div>


<?php include('partials/footer.php')?>