<?php
include("connection.php");
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if($username && $password && $confirmPassword){

		if($password == $confirmPassword){
			$query = "INSERT INTO user(username,password) VALUES ('$username','$password')";
			$result = mysqli_query($connection,$query);  //$connection is variable to connenct into datbase from connection.php
			if(!$result){
				die("Query Failed!");
			}else{
				echo "File inserted";
			}
		}else{
			die("Password not matched!");
		}
	}else{
		die("Please fill all the fields! and try again");
	}


}


?>









<!DOCTYPE html>
<html>
<head>
	<title>Form page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="col-sm-6">
			<div class="form-group">
				<form action="form.php" method="POST">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">

					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">

					<label for="confirmPassword">Password</label>
					<input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="confirmPassword">

					<input type="submit" name="submit" value="submit" class="btn btn-info">
				</form>
			</div>
		</div>		
	</div>

</body>
</html>