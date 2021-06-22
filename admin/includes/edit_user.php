<?php 
include "function.php";

if(isset($_GET['edit_user'])){
    $the_user_id =  $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id=$the_user_id";
    $select_user_query = mysqli_query($connection, $query);
   
    while ($row = mysqli_fetch_assoc($select_user_query)) {
       $user_id=   $row ['user_id'];
       $user_firstname =  $row ['user_firstname'];
       $user_lastname =   $row ['user_lastname'];
       $user_username =  $row ['user_username'];
       $user_email =  $row ['user_email'];
       $user_password =   $row ['user_password'];
       $user_role = $row['user_role'];
    }

}



// Update User Code 
if(isset($_POST['edit_user'])){
   
    $user_firstname =   $_POST['user_firstname'];
    $user_lastname =   $_POST['user_lastname'];
    $user_username =   $_POST['user_username'];
    $user_email =   $_POST['user_email'];
    $user_password =   $_POST['user_password'];
    $user_role = $_POST['user_role'];



   $query = "UPDATE users SET";
   $query .= " user_firstname =   '$user_firstname' , ";
   $query .= " user_lastname = ' $user_lastname' , ";
   $query .= " user_username =  '$user_username' , ";
   $query .= " user_email =   '$user_email ' , ";
   $query .= " user_password =   '$user_password' , ";
   $query .= " user_role =   '$user_role'  ";
   $query .= " WHERE user_id =  $the_user_id";
   

   $update_user = mysqli_query($connection,$query);
   confirmQuery($update_user );

}



  
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="user_firstname">First Name</label>
<input type="text" name="user_firstname" value="<?php echo $user_firstname ?>" id="user_firstname" class="form-control">
</div>

<div class="form-group">
<label for="user_lastname">Last Name</label>
<input type="text" name="user_lastname" value="<?php echo $user_lastname ?>" id="user_lastname" class="form-control">
</div>

<div class="form-group">
<label for="user_username">Username</label>
<input type="text" name="user_username" value="<?php echo $user_username ?>" id="user_username" class="form-control">
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
<input type="text" name="user_email" value="<?php echo $user_email ?>" id="user_email" class="form-control">
</div>

<div class="form-group">
<label for="user_password">Password</label>
<input type="password" name="user_password" value="<?php echo $user_password ?>" id="user_password" class="form-control">
</div>




<div class="form-group">
      <input class="btn btn-primary" name="edit_user" type="submit" value="Update User"> 
</div>

</form>