<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>
<?php include "include/navigation.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <?php

        if(isset($_GET['p_id'])){
          $the_post_id =  $_GET['p_id'];
        } 

        $query = "SELECT * FROM posts WHERE post_id = $the_post_id" ;
        $select_all_posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_id =   $row ['post_id'];
            $post_title =   $row ['post_title'];
            $post_author =   $row ['post_author'];
            $post_date =   $row ['post_date'];
            $post_image =   $row ['post_image'];
            $post_content =   $row ['post_content']; ?>
            <h2>
                <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
            <hr>
            <p><?php echo $post_content ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>

            <!-- Blog Comments -->
            <?php include "include/comments.php"; ?>


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "include/sidebar.php"; ?>

    </div>

    <hr>

   
    <?php include "include/footer.php";
        }?>
