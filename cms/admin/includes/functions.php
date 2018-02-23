<?php 


     function insert_category(){
        global $connection;
        if(isset($_POST['submit'])){
                      $cat_title = $_POST['cat_title'];

                            if($cat_title == "" || empty($cat_title)) {
                                echo "This feild should not be empty";
                            } else{
                                $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
                                $create_category_query = mysqli_query($connection,$query);

                                if(!$create_category_query){
                                    die("Query Failed" .mysqli_error($connection));
                                }
                            }
                        }

    }

?>


<?php 

function findAllCategories(){
      global $connection;

     $query = "SELECT * FROM categories";
                            $select_catagories = mysqli_query($connection,$query);
                          
                            while($row = mysqli_fetch_assoc($select_catagories)){
                          
                            $cat_id = $row['cat_id'];
                             $cat_title = $row['cat_title'];
                          

                             echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                            echo "<tr>";
                            }
                  

}




 ?>




 <?php 
 function delete_categories(){
    global $connection;
    if(isset($_GET['delete'])){
     $teh_cat_id = $_GET['delete'];

     $query = "DELETE FROM categories WHERE cat_id = {$teh_cat_id}";
    $delete_query = mysqli_query($connection,$query);
    header("location: categories.php");
                                }

 }


  ?>




<?php  

    function debug($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
    }

   ?>



   <?php
   global $connection;

   function confirmquery($result){
    if(!$result){
            echo "QUERY FAILED" .query_error($connection);
        }

   }

   ?>