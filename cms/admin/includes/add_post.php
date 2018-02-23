<?php

	if(isset($_POST['create_post'])){
		$post_category_id = $_POST['id'];
		$post_author = $_POST['author'];
		$post_title = $_POST['title'];
		
		$post_status = $_POST['status'];


		$post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

		$post_tag = $_POST['tag'];
		$post_content = $_POST['post_content'];
		$pos_date = date('d-m-y');
		$post_comment_count = 4;

		$path = '../images';

		if(!is_dir($path)){
			mkdir($path, 0777, true);
		}

		$success = move_uploaded_file($post_image_temp, "../images/$post_image");
		


		$query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,
		post_tags,post_comment_count,post_status) VALUES ({$post_category_id},'{$post_title}','{$post_author}',now(),
		'{$post_image}','{$post_content}','{$post_tag}','{$post_comment_count}','{$post_status}')";

		$result = mysqli_query($connection,$query);

		if(!$result){
			echo "Query Error adding post";
		}else{
			header("Location: posts.php");
		}



		

	}


?>



<form  action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
	    <label for="title">Post Title</label>
		<input type="text" name="title" class="form-control">
	</div>



	<div class="form-group">
	    <label for="id">Post Category Id</label>
		<input type="text" name="id" class="form-control">
	</div>

	<div class="form-group">
	    <label for="author">Author</label>
		<input type="text" name="author" class="form-control">
	</div>


	<div class="form-group">
	    <label for="status">Status</label>
		<input type="text" name="status" class="form-control">
	</div>

	<div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

	<div class="form-group">
	    <label for="tag">Tag</label>
		<input type="text" name="tag" class="form-control">
	</div>

	  <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
         </textarea>
      </div>

      <input type="submit" name="create_post" class="btn btn-primary" value="Create Post">

</form>