    <form action="" method="post">
        <div class="form-group">
            <label for="cat_title">Update Category</label>


            <?php //updateing category from db
            
            if(isset($_POST['update_category'])) {
                $the_cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '$the_cat_title' WHERE cat_id = $cat_id ";
            $select_categories_id = mysqli_query($connection,$query);

            header("Location: categories.php");
    
            if(!$select_categories_id) {

                die('QUERY FAILED' . mysqli_error($connection));

            }
            echo "<p class = text-success>Category was updated successfully</p>";
            
        }         
            ?>
            
                
            <?php // fetching category title into textfield
            
            if(isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection,$query);
                
            while($row = mysqli_fetch_assoc($select_categories_id)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            ?>
                <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" name="cat_title" id="" class="form-control" >

            <?php }} ?>
            

        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_category" value="Update">
        </div>
    </form>