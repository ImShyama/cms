<?php

if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
//$query = "CALL post_update_fetch('$the_post_id')";
$select_all_posts = mysqli_query($connection,$query);

confirmquery($select_all_posts);

while($row = mysqli_fetch_assoc($select_all_posts)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];


    }} 
    
    
    if(isset($_POST['update_post'])) {

      $post_title = $_POST['post_title'];
      $post_author = $_POST['post_author'];
      $post_category_id = $_POST['post_category'];
      $post_status = $_POST['post_status'];
      $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name'];
      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];
      $post_date = date('d-m-y');
      
       move_uploaded_file($post_image_temp, "../images/$post_image" );

       if(empty($post_image)) {

        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($select_image)) {

          $post_image = $row['post_image'];
        }
       }
  
    $query = "UPDATE posts SET post_title = '$post_title', post_author= '$post_author', post_category_id='$post_category_id', 
    post_date=now(), post_status='$post_status', post_tags='$post_tags', post_content='$post_content', post_image='$post_image' WHERE post_id=$the_post_id";
  
          $update_post = mysqli_query($connection, $query);
  
          confirmquery($update_post);

          header("Location: posts.php");
      }

    ?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="title">Post Title</label>
      <input value = "<?php echo $post_title ?>" type="text" name="post_title" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_category">Post Category</label>
        <select class="form-control" name="post_category" id="">

         <?php
            $query = "SELECT * FROM categories";
            $select_all_categories = mysqli_query($connection,$query);
    
            while($row = mysqli_fetch_assoc($select_all_categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
          
                echo "<option value='$cat_id' selected>{$cat_title}</option>";
            }
        ?>
          
          
        </select>
    </div>

    <div class="form-group">
      <label for="author">Post Author</label>
      <input value = "<?php echo $post_author ?>" type="text" name="post_author" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input value = "<?php echo $post_status ?>" type="text" name="post_status" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_image">Post Image</label><br>
      <img width="150px" src="../images/<?php echo $post_image ; ?>" alt=''>
      <input value = "" type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value = "<?php echo $post_tags ?>" type="text" name="post_tags" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea  name="post_content" id="" class="form-control" placeholder="" aria-describedby="helpId"> <?php echo $post_content ?> </textarea>
    </div>

    <div class="form-group">
      <input type="submit" name="update_post" id="" class="btn btn-primary" value="Update Post" aria-describedby="helpId">
    </div>

</form>