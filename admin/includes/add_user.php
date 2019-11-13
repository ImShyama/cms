
<?php 

if(isset($_POST['add_user'])) {

    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $user_password = $_POST['user_password'];
    $username = $_POST['username'];
   // $post_comment_count = 4;
    $post_date = date('d-m-y');
    
     move_uploaded_file($user_image_temp, "../images/$user_image" );

     $query = "INSERT INTO users(username, user_password, user_email, 
     user_firstname, user_lastname, date, user_image, user_role, user_randsalt)";

     $query .= "VALUES('{$username}','{$user_password}','{$user_email}', '{$user_firstname}','{$user_lastname}'
     ,now(),'{$user_image}','{$user_role}','randsalt')";

        $add_user_query = mysqli_query($connection, $query);

        confirmquery($add_user_query);
    }

?>
<form action="" method="post" enctype="multipart/form-data" >

    <div class="form-group">
      <label for="firstname">FirstName</label>
      <input type="text" name="firstname" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="lastname">LastName</label>
      <input type="text" name="lastname" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="post_image">User Image</label>
      <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="user_role">Role</label>
        <select class="form-control" name="user_role" id="">
        <option value='Subscriber'>Select Option</option>
          <option value='Subscriber'>Subscriber</option>
          <option value='Admin'>Admin</option>
         <?php
            // $query = "SELECT * FROM users";
            // $select_users = mysqli_query($connection,$query);
    
            // while($row = mysqli_fetch_assoc($select_users)){
            //     $user_id = $row['user_id'];
            //     $username = $row['username'];
          
            //     //echo "<option value='$user_id'>{$user_role}</option>";
            // }
        ?>

        </select>
    </div>

    <div class="form-group">
      <label for="username">UserName</label>
      <input type="text" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId" >
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="user_email" id="" class="form-control" placeholder="" aria-describedby="helpId" >
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="user_password" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <input type="submit" name="add_user" id="" class="btn btn-primary" value="Add User" aria-describedby="helpId">
    </div>

</form>