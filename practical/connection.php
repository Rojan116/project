<?php

	$connection = mysqli_connect('localhost','root','','phpclass');
	if($connection){
		echo "Connected to database ";
	}
	else {
		die("Database connecetion failed!");
	}


?>