
<?php

function confirmquery($result) {
global $connection;

    if(!$result) {

        die("QUERY FAILED ." . mysqli_error($connection));

    }
    
}

// INSERTING CATEGORY FUNCTION  
function InsertCategories() {
global $connection;

        if(isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];

            if($cat_title == "" || empty($cat_title)) {

                echo "<p class = text-danger>This field should not be empty</p>";

            } else {

                $query = "INSERT INTO categories(cat_title)";
                $query .= "VALUE('{$cat_title}')";

                $create_category_query = mysqli_query($connection, $query);

                if(!$create_category_query) {

                    die('QUERY FAILED' . mysqli_error($connection));

                }
                echo "<p class = text-success>Category was added successfully</p>";
            }
        }
                       
}


//FINDING ALL CATEGORIES FUNCTION
function FindAllCategories() {
global $connection;

    $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_all_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
            echo "</tr>";
        } 

}

// DELETING CATEGORY FUNCTION
function DeleteCategories() {
global $connection;

    if(isset($_GET['delete'])) {

        $the_cat_id = $_GET['delete'];
    
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    
    $delete_query = mysqli_query($connection, $query); 
    
    header("Location: categories.php");
    }

}
?>