
<div class="table-responsive">
<table class="table table-bordered table-hover ">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Title</th>
                                   <th>Author</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tags</th>
                                   <th>Content</th>
                                   <th>Comments</th>
                                   <th>Date</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                                   <th>Publish</th>
                                   <th>Draft</th>
                               </tr>
                           </thead>
                           <tbody>

                           <?php 
                           $query = "SELECT post_id, post_title, post_author, post_image, post_tags, post_comment_count ,post_status ,post_content, post_date ,categories.cat_title FROM posts INNER JOIN categories on posts.post_category_id = categories.cat_id";
                          // $query="CALL post_fetch()" ;
                           $select_all_posts = mysqli_query($connection,$query);
                    
                            while($row = mysqli_fetch_assoc($select_all_posts)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $cat_title = $row['cat_title'];
                                $post_status = $row['post_status'];
                                $post_image = $row['post_image'];
                                $post_tags = $row['post_tags'];
                                $post_content = $row['post_content'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_date = $row['post_date'];
                                
                                echo "<tr>";
                                echo "<td>{$post_id}</td>";
                                echo "<td>{$post_title}</td>";
                                echo "<td>{$post_author}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td>{$post_status}</td>";
                                echo "<td><img width=200 src='../images/{$post_image}' alt='image'></td>";
                                echo "<td>{$post_tags}</td>";
                                echo "<td>{$post_content}</td>";
                                echo "<td>{$post_comment_count}</td>";
                                echo "<td>{$post_date}</td>";
                                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
                                echo "<td><a href='posts.php?delete={$post_id}'>delete</a></td>";
                                echo "<td><a href='posts.php?publish={$post_id}'>publish</a></td>";
                                echo "<td><a href='posts.php?draft={$post_id}'>draft</a></td>";
                                echo "</tr>";
                            }
                           ?>
                               
                           </tbody>
                       </table>
                       </div>

                       <?php 
                       
                            if(isset($_GET['delete'])) {
                                
                                $the_post_id = $_GET['delete'];

                               $query = "DELETE FROM posts WHERE post_id = {$the_post_id}" ;
                               // $query = "CALL post_del (".$the_post_id.")";
                                $delete_query = mysqli_query($connection, $query);


                                header("Location: posts.php");
                            }

                            if(isset($_GET['publish'])) {
                                $the_post_id = $_GET['publish'];
    
                                $query = "UPDATE posts SET post_status = 'published' WHERE post_id = {$the_post_id}" ;
                                $publish_query = mysqli_query($connection, $query);
    
                                header("Location: posts.php");
                            }
    
                            if(isset($_GET['draft'])) {
                                $the_post_id = $_GET['draft'];
    
                                $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$the_post_id}" ;
                                $draft_query = mysqli_query($connection, $query);
    
                                header("Location: posts.php");
                            }
                       ?>