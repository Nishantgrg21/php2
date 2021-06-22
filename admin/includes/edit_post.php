<?php 
include "function.php";

if(isset($_GET['p_id'])){
    $the_post_id =  $_GET['p_id'];
}

 $query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
 $select_posts_by_id = mysqli_query($connection, $query);

 while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
     $post_id =   $row ['post_id'];
     $post_category_id =   $row ['post_category_id'];
     $post_title =   $row ['post_title'];
     $post_author =   $row ['post_author'];
     $post_date =   $row ['post_date'];
     $post_image =   $row ['post_image'];
     $post_content =   $row ['post_content'];
     $post_tags =   $row ['post_tags'];
     $post_comment_count =   $row ['post_comment_count'];
     $post_status =   $row ['post_status'];
 }


// Update Post Code 
if(isset($_POST['update_post'])){
   
    $post_title =   $_POST['post_title'];
    $post_author =   $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status =   $_POST['post_status'];
    $post_image =   $_FILES['post_image']['name'];
    $post_image_temp =   $_FILES['post_image']['name'];
    $post_tags =   $_POST['post_tags'];
    $post_content =   $_POST['post_content'];
    $post_date =   date('d-m-y');
    $post_comment_count =   4;



    move_uploaded_file($post_image_temp, "../images/$post_image");


    // if(empty($post_image)){
    //     $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    //     $select_image = mysqli_query($connection,$query);

    //     while($row = mysqli_fetch_array($select_image)){
    //         $post_image = $row['post_image'];
    //     }
    // }

   $query = "UPDATE posts SET ";
   $query .= " post_title =   '{$post_title}' , ";
   $query .= " post_category_id = '{$post_category_id}' , ";
   $query .= " post_date =   now(), ";
   $query .= " post_author =   '{$post_author}' , ";
   $query .= " post_status =   '{$post_status}' , ";
   $query .= " post_tags  =   '{$post_tags}' , ";
   $query .= " post_content =   '{$post_content}' , ";
   $query .= " post_image =   '{$post_image}' ";
   $query .= " WHERE post_id =  {$the_post_id}";

   $update_post = mysqli_query($connection,$query);
   confirmQuery($update_post);

}



  
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="title">Post Title</label>
<input type="text" name="post_title" id="title" value="<?php echo $post_title; ?>" class="form-control">
</div>

<div class="form-group ">
<label for="post_category_id" >Select Category</label>
 <select name="post_category" id="" class="form-control" >
 <?php 
 $query = "SELECT * FROM categories";
 $select_categories = mysqli_query($connection,$query);

 confirmQuery($select_categories);

 while($row = mysqli_fetch_assoc($select_categories )){
     $cat_id = $row['cat_id'];
     $cat_title = $row['cat_title'];

     echo "<option value='$cat_id'>{$cat_title}</option>";
 }
 
 
 ?>
 </select>
</div>

<div class="form-group">
<label for="post_author">Post Author</label>
<input type="text" name="post_author" id="post_author" value="<?php echo $post_author; ?>" class="form-control">
</div>

<div class="form-group">
<label for="post_status">Post Status</label>
<input type="text" name="post_status" id="post_status" value="<?php echo $post_status; ?>" class="form-control">
</div>

<div class="form-group">
<label for="post_image">Post Image</label>
<input type="file" name="post_image" id="post_image"  class="form-control">
</div>
<div class="form-group">
<img src="./images/<?php echo $post_image; ?>" width="100">
</div>

<div class="form-group">
<label for="post_tags">Post Tags</label>
<input type="text" name="post_tags" id="post_tags" value="<?php echo $post_tags; ?>" class="form-control">
</div>

<div class="form-group">
<label for="post_content">Post Content</label>
<textarea name="post_content" id="post_content" class="form-control" cols="30" rows="10">
<?php echo $post_content; ?>
</textarea>
</div>
<div class="form-group">
      <input class="btn btn-primary" name="update_post" type="submit" value="Update Post"> 
</div>

</form>