
 <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                     <td>Comment Id</tr>
                                    <td>Comment Post Id</td>
                                    <td>Author</td>
                                    <td>Email</td>
                                    <td>Content</td>
                                    <td>Status</td>
                                    <td>Data</td>
                                    <td>Approve</td>
                                    <td>Unapprove</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $query = "SELECT * FROM comments";
                                    $select_users = mysqli_query($connection,$query);

                                    while ($row = mysqli_fetch_assoc($select_users)) {
                                        $comment_id = $row['comment_id'];
                                        $comment_post_id = $row['comment_post_id'];
                                        $comment_author = $row['comment_author'];
                                        $comment_email = $row['comment_email'];
                                        $comment_content = $row['comment_content'];
                                        $comment_status = $row['comment_status'];
                                        $comment_date = $row['comment_date'];
                                   

                                        echo "<tr>";
                                        echo "<td>$comment_id</td>";
                                        echo "<td>$comment_post_id</td>";
                                        echo "<td>$comment_author</td>";
                                        echo "<td>$comment_email</td>";
                                        echo "<td>$comment_content</td>";
                                        echo "<td>$comment_status</td>";
                                        echo "<td>$comment_date</td>";
                                
                                        echo "<td><a href='comments.php?edit={$comment_id}'>Edit</a></td>";
                                        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                        echo "</tr>";

                                    }
                                



                                ?>
                            </tbody>
                        </table>




                        <?php 


                            if(isset($_GET['delete'])){
                                $the_user_id = $_GET['delete'];
                                $query = "DELETE FROM comments where post_id = '{$the_user_id}'";
                                $delete_query = mysqli_query($connection,$query);

                                confirmquery($delete_query);

                                   header("location: comments.php");
                            }
                        ?>