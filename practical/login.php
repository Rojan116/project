<?php
include("connection.php");
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM user";
	$result = mysqli_query($connection,$query);  //$connection is variable to connenct into datbase from connection.php
	if(!$result){
				die("Query Failed!");
			}

	while ($row = mysqli_fetch_assoc($result)) {
		print_r($row); 
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
				<form action="login.php" method="POST">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">

					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">

					<input type="submit" name="login" value="login" class="btn btn-info">
				</form>
			</div>
		</div>		
	</div>

</body>
</html>