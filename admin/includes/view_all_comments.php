
<div class="table-responsive">
<table class="table table-bordered table-hover ">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Comment</th>
                                   <th>Email</th>
                                   <th>Status</th>
                                   <th>In Response to</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                                   <th>Unapprove</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>

                           <?php
                           //$query = "SELECT * FROM comments"; 
                           $query = "SELECT comment_id, comment_author, comment_email ,comment_status ,comment_content, comment_date ,posts.post_title,posts.post_id FROM comments INNER JOIN posts on posts.post_id = comments.comment_post_id";
                           //$query .= "ORDER BY comment_id DESC";
                          // $query="CALL post_fetch()" ;
                           $select_all_comments = mysqli_query($connection,$query);
                    
                            while($row = mysqli_fetch_assoc($select_all_comments)){
                                $comment_id = $row['comment_id'];
                                $comment_post_title = $row['post_title'];
                                $post_id = $row['post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_status = $row['comment_status'];
                                $comment_content = $row['comment_content'];
                                $comment_date = $row['comment_date'];
                                
                                
                                echo "<tr>";
                                echo "<td>{$comment_id}</td>";
                                echo "<td>{$comment_author}</td>";
                                echo "<td>{$comment_content}</td>";
                                echo "<td>{$comment_email}</td>";
                                echo "<td>{$comment_status}</td>";
                                echo "<td><a href='../post.php?p_id=$post_id'>{$comment_post_title}</a></td>";
                                echo "<td>{$comment_date}</td>";
                                echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                                echo "<td><a href='comments.php?delete={$comment_id}'>delete</a></td>";
                                echo "</tr>";
                            }
                           ?>
                               
                           </tbody>
                       </table>
                       </div>

                       <?php 
                       
                       if(isset($_GET['approve'])) {
                            $the_comment_id = $_GET['approve'];

                            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}" ;
                            $approve_query = mysqli_query($connection, $query);

                            header("Location: comments.php");
                        }

                        if(isset($_GET['unapprove'])) {
                            $the_comment_id = $_GET['unapprove'];

                            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}" ;
                            $unapprove_query = mysqli_query($connection, $query);

                            header("Location: comments.php");
                        }

                        if(isset($_GET['delete'])) {
                            $the_comment_id = $_GET['delete'];

                            $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}" ;
                            $delete_query = mysqli_query($connection, $query);

                            header("Location: comments.php");
                        }
                       ?>