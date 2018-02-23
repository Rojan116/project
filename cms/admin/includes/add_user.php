<?php

	if(isset($_POST['create_user'])){
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $role = $_POST['role'];
        $randSalt = $_POST['randSalt'];

        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];
		$success = move_uploaded_file($user_image_temp, "../images/$user_image");
		


		$query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,role,randSalt) VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$role}','{$randSalt}')";

		$result = mysqli_query($connection,$query);

		confirmquery($result);	//checking error



		

	}


?>



<form  action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
	    <label for="title">Username</label>
		<input type="text" name="username" class="form-control">
	</div>



	<div class="form-group">
	    <label for="id">Password</label>
		<input type="text" name="user_password" class="form-control">
	</div>

	<div class="form-group">
	    <label for="author">First Name</label>
		<input type="text" name="user_firstname" class="form-control">
	</div>


	<div class="form-group">
	    <label for="status">Last Name</label>
		<input type="text" name="user_lastname" class="form-control">
	</div>

	<div class="form-group">
         <label for="user_image">Post Image</label>
          <input type="file"  name="image">
      </div>

	<div class="form-group">
	    <label for="tag">Email</label>
		<input type="text" name="user_email" class="form-control">
	</div>


	<div class="form-group">
	    <label for="tag">Role</label>
		<input type="text" name="role" class="form-control">
	</div>

	<div class="form-group">
	    <label for="tag">RandSand</label>
		<input type="text" name="randSalt" class="form-control">
	</div>


      <input type="submit" name="create_user" class="btn btn-primary" value="Create User">

</form>