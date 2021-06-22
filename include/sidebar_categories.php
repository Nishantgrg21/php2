  <!-- Blog Categories Well -->
  <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                        <ul class="list-unstyled">
                        <?php


                    $query = "SELECT * FROM categories LIMIT 15";
                    $select_categories_sidebar = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc( $select_categories_sidebar )){
                      $cat_title =   $row ['cat_title'];
                      $cat_id =   $row ['cat_id'];
                      echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                    ?>

                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>