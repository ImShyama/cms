
<div class="table-responsive">
<table class="table table-bordered table-hover ">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Username</th>
                                   <th>FirstName</th>
                                   <th>LastName</th>
                                   <th>Email</th>
                                   <th>Image</th>
                                   <th>Date</th>
                                   <th>Role</th>
                                   <!-- <th>Randsalt</th> -->
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>

                           <?php
                           //$query = "SELECT * FROM comments"; 
                           $query = "SELECT * FROM users";
                           //$query .= "ORDER BY comment_id DESC";
                          // $query="CALL post_fetch()" ;
                           $select_all_users = mysqli_query($connection,$query);
                    
                            while($row = mysqli_fetch_assoc($select_all_users)){
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
                                
                                
                                echo "<tr>";
                                echo "<td>{$user_id}</td>";
                                echo "<td>{$username}</td>";
                                //echo "<td>{$user_password}</td>";
                                echo "<td>{$user_firstname}</td>";
                                echo "<td>{$user_lastname}</td>";
                                echo "<td>{$user_email}</td>";
                                echo "<td>{$user_image}</td>";
                                echo "<td>{$date}</td>";
                                echo "<td>{$user_role}</td>";
                                // echo "<td>{$user_randsalt}</td>";
                                // echo "<td><a href='../post.php?p_id=$post_id'>{$comment_post_title}</a></td>";
                                // echo "<td>{$comment_date}</td>";
                                // echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                // echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                                 echo "<td><a href='users.php?delete={$user_id}'>delete</a></td>";
                                 echo "</tr>";
                            }
                           ?>
                               
                           </tbody>
                       </table>
                       </div>

                       <?php 
                       
                    //    if(isset($_GET['approve'])) {
                    //         $the_comment_id = $_GET['approve'];

                    //         $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}" ;
                    //         $approve_query = mysqli_query($connection, $query);

                    //         header("Location: comments.php");
                    //     }

                    //     if(isset($_GET['unapprove'])) {
                    //         $the_comment_id = $_GET['unapprove'];

                    //         $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}" ;
                    //         $unapprove_query = mysqli_query($connection, $query);

                    //         header("Location: comments.php");
                    //     }

                        if(isset($_GET['delete'])) {
                            $the_user_id = $_GET['delete'];

                            $query = "DELETE FROM users WHERE user_id = {$the_user_id}" ;
                            $delete_query = mysqli_query($connection, $query);

                            header("Location: users.php");
                        }
                       ?>