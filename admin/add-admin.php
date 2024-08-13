<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">
    <h1>Add Admin</h1>
    <br>

    <?php 
    if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
    {
        echo $_SESSION['add'];  //Display the Session Message if Set
        unset($_SESSION['add']); //Removing Session Message
    }
    ?>

    <form action="" method="POST">
        
    
        <table >
        
            <tr>
                <td>Full Name: &nbsp; &nbsp;&nbsp; &nbsp;  </td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"> </td>
            </tr>

            <tr>
                <td>Username: &nbsp; &nbsp;  </td>
                <td><input type="text" name="username" placeholder="Your Username"> </td>
            </tr>

            <tr>
                <td>Password: &nbsp; &nbsp;  </td>
                <td><input type="password" name="password" placeholder="Your Password"> </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
            </td>
            </tr>
       
        </table>

</form>
</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
    //Button Clicked
    //echo "Button Clicked";

    //1.Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  //md5 is for encryption

    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    
   //3. Executing Query and Saving Data into Database 
   $res = mysqli_query($conn, $sql) or die(mysqli_error());

   if($res==TRUE)
   {

    //Create a Session variable to Display Message
    $_SESSION['add'] = "<div class='success'>Admin Added Successfully. </div>";

    //Redirect Page TO manage Admin
    header("location:".SITEURL.'admin/manage-admin.php');
   }
   else
   {
    

    //Create a Session variable to Display Message
    $_SESSION['add'] = "Failed to Add Admin";

    //Redirect Page TO manage Admin
    header("location:".SITEURL.'admin/add-admin.php');
   }
}

?>