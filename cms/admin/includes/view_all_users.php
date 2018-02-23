

 <table class="table table-bordered table-hovered">
                            <thead>
                                <tr>
                                    <td>user Id</td>
                                    <td>Username</td>
                                    <td>Password</td>
                                    <td>Firstname</td>
                                    <td>Lastname</td>
                                    <td>Email</td>
                                    <td>Image</td>
                                    <td>Role</td>
                                    <td>Randsalt</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connection,$query);

                                    while ($row = mysqli_fetch_assoc($select_users)) {
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_password = $row['user_password'];
                                        $user_image = $row['user_image'];
                                        $user_email = $row['user_email'];
                                        $role = $row['role'];
                                        $randSalt = $row['randSalt'];
                                   

                                        echo "<tr>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$username</td>";
                                        echo "<td>$user_password</td>";
                                        echo "<td>$user_firstname</td>";
                                        echo "<td>$user_lastname</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td><img class='img-responsive' src='../images/$user_image' alt='Image' width='100px' ></td>";
                                        echo "<td>$role</td>";
                                        echo "<td>$randSalt</td>";
                                        
                                        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                        echo "</tr>";

                                    }
                                



                                ?>
                            </tbody>
                        </table>




                        <?php 


                            if(isset($_GET['delete'])){
                                $the_user_id = $_GET['delete'];
                                $query = "DELETE FROM posts where post_id = '{$the_user_id}'";
                                $delete_query = mysqli_query($connection,$query);

                                confirmquery($delete_query);

                                   header("location: posts.php");
                            }
                        ?>