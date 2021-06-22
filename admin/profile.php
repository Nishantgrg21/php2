
<?php include "includes/admin_header.php" ?>
<?php 
if(isset($_SESSION['user_username'])){
   $user_username =  $_SESSION['user_username'];

   $query = "SELECT * FROM users WHERE user_username = '{$user_username}' ";
   $select_user_profile_query = mysqli_query($connection, $query);

   while($row = mysqli_fetch_array($select_user_profile_query)){
    $user_id = $row ['user_id'];
    $user_firstname = $row ['user_firstname'];
    $user_lastname = $row ['user_lastname'];
    $user_username = $row ['user_username'];
    $user_email =  $row ['user_email'];
    $user_password = $row ['user_password'];
    $user_role = $row['user_role'];
   }
}
?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Profile  
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="user_firstname">First Name</label>
<input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>"  class="form-control">
</div>

<div class="form-group">
<label for="user_lastname">Last Name</label>
<input type="text" name="user_lastname" value="<?php echo $user_lastname ?>" class="form-control">
</div>

<div class="form-group">
<label for="user_username">Username</label>
<input type="text" name="user_username" value="<?php echo $user_username ?>"  class="form-control">
</div>

<div class="form-group ">
<label for="user_role" >Select Category</label>
 <select name="user_role" id="" class="form-control" >
 <option value="subscriber"><?php echo $user_role ?></option>
 <?php
 if($user_role == 'admin'){
 echo "<option value='subscriber'>Subscriber</option>";

 }else{
    echo "<option value='admin'>Admin</option>";
 }
 
 ?>
 
 </select>
</div>

<div class="form-group">
<label for="user_email">Email</label>
<input type="text" name="user_email" value="<?php echo $user_email ?>"  class="form-control">
</div>

<div class="form-group">
<label for="user_password">Password</label>
<input type="password" name="user_password" value="<?php echo $user_password ?>"  class="form-control">
</div>




<div class="form-group">
      <input class="btn btn-primary" name="user_username" type="submit" value="Update Profile"> 
</div>

</form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>