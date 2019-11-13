<?php

if(isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
//$query = "CALL post_update_fetch('$the_post_id')";
$select_all_users_query = mysqli_query($connection,$query);

confirmquery($select_all_users_query);

while($row = mysqli_fetch_assoc($select_all_users_query)){
  $user_id = $row['user_id'];
  $username = $row['username'];
  $user_password = $row['user_password'];
  $user_email = $row['user_email'];
  $user_firstname = $row['user_firstname'];
  $user_lastname = $row['user_lastname'];
  $user_image = $row['user_image'];
  $date = $row['date'];
  $user_role = $row['user_role'];
  $user_randsalt = $row['user_randsalt'];
  
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


<form action="" method="post" enctype="multipart/form-data" >

    <div class="form-group">
      <label for="firstname">FirstName</label>
      <input type="text" name="firstname" value="<?php echo $user_firstname; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="lastname">LastName</label>
      <input type="text" name="lastname" value="<?php echo $user_lastname; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_image">User Image</label><br>
      <img width="120px" src="../images/<?php echo $user_image ; ?>" alt='user image'>
      <input value = "" type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="user_role">Role</label>
        <select class="form-control" name="user_role" id="">
        <option value="<?php echo $user_role; ?>" ><?php echo $user_role; ?></option>
          
         <?php
            if ($user_role == Admin) {
              echo "<option value='Subscriber'>Subscriber</option>";
            } else {
              echo "<option value='Admin'>Admin</option>";
            }
        ?>

        </select>
    </div>

    <div class="form-group">
      <label for="username">UserName</label>
      <input type="text" name="username" value="<?php echo $username; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId" >
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="user_email" value="<?php echo $user_email; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId" >
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="user_password" value="<?php echo $user_password; ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <input type="submit" name="edit_user" id="" class="btn btn-primary" value="Update User" aria-describedby="helpId">
    </div>

</form>