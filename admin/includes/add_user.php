<?php

include "function.php";


if(isset($_POST['add_user'])){
    
    $user_firstname =   $_POST['user_firstname'];
    $user_lastname =   $_POST['user_lastname'];
    $user_username =   $_POST['user_username'];
    $user_email =   $_POST['user_email'];
    $user_password =   $_POST['user_password'];
    $user_role =   $_POST['user_role'];
 


    //move_uploaded_file($post_image_temp, "../images/$post_image");
  
    $query = "INSERT INTO users(user_firstname , user_lastname , user_username , user_role ,user_email ,user_password  )";

    $query .= "VALUES('$user_firstname', '$user_lastname', ' $user_username','$user_role', ' $user_email','$user_password ')";

    $create_user_query = mysqli_query($connection , $query);   
    
    confirmQuery($create_user_query);
}




?>

<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="user_firstname">First Name</label>
<input type="text" name="user_firstname" id="user_firstname" class="form-control">
</div>

<div class="form-group">
<label for="user_lastname">Last Name</label>
<input type="text" name="user_lastname" id="user_lastname" class="form-control">
</div>

<div class="form-group">
<label for="user_username">Username</label>
<input type="text" name="user_username" id="user_username" class="form-control">
</div>

<div class="form-group ">
<label for="user_role" >Select Category</label>
 <select name="user_role" id="" class="form-control" >
 <option value="subscriber">Select Option</option>
 <option value="admin">Admin</option>
 <option value="subscriber">Subscriber</option>
 <option value="customer">Customer</option>

 </select>
</div>

<div class="form-group">
<label for="user_email">Email</label>
<input type="text" name="user_email" id="user_email" class="form-control">
</div>

<div class="form-group">
<label for="user_password">Password</label>
<input type="password" name="user_password" id="user_password" class="form-control">
</div>




<div class="form-group">
      <input class="btn btn-primary" name="add_user" type="submit" value="Add User"> 
</div>

</form>