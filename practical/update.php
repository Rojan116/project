<?php
include("connection.php");


$query = "SELECT * FROM user";
	$result = mysqli_query($connection,$query);  //$connection is variable to connenct into datbase from connection.php
	if(!$result){
				die("Query Failed!");
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
				<form action="logn.php" method="POST">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">

					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					
					<div class="form-group">
						<select name="" id="">
							<?php
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									echo "<option value='$id'>$id</option>";
								}


							?>	

						</select>	
					</div>

					<input type="submit" name="submit" value="Update" class="btn btn-info">
				</form>
			</div>
		</div>		
	</div>

</body>
</html>