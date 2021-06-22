<?php 
             if(isset($_POST['create_comment'])){

                $the_post_id =  $_GET['p_id'];

                $comment_author =  $_POST['comment_author'];
                $comment_email =  $_POST['comment_email'];
               $comment_content =  $_POST['comment_content'];

               $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
               $query .= "VALUES ( $the_post_id ,'{$comment_author}','{$comment_email}','{$comment_content}','unapprove',now() )";

               $create_comment_query = mysqli_query($connection,$query);
             }

            ?>

           

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <input type="text" name="comment_author" class="form-control" placeholder="Enter your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="comment_email" class="form-control" placeholder="Enter your E-mail">
                    </div>
                   
                    <div class="form-group">
                        <textarea class="form-control" name="comment_content" rows="3" placeholder="Enter your Comment"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            
            <?php 
             $query = " SELECT * FROM comments WHERE comment_post_id = $the_post_id" ;
             $query .= " AND comment_status = 'approve' ";
             $query .= " ORDER BY comment_id DESC ";
             $select_comment_query = mysqli_query($connection, $query);

             if(!$select_comment_query){
                 die('Query Failed'. mysqli_error($connection));
             }


             $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
             $query .= "WHERE post_id = $the_post_id ";
             $update_comment_count = mysqli_query($connection, $query);
     
             while ($row = mysqli_fetch_assoc($select_comment_query)) {
                 $comment_author =   $row ['comment_author'];
                 $comment_date =   $row ['comment_date'];
                 $comment_content =   $row ['comment_content'];


                 ?>

                 <!-- Comment -->
                 <div class="media" style="border: 1px solid #ebebeb; padding:20px; background:#f5f5f5;">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo  $comment_date; ?></small>
                        </h4>
                        <?php echo  $comment_content; ?>
                    </div>
                </div>

                 
             <?php } ?>
                
            

            
               