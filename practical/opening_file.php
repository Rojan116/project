<?php

$file = "example.txt";

if($handle = fopen($file, 'w')){

fwrite($handle, "I am writing from php.");


fclose($handle);

}
else{
	echo "The application cannot write on file";
}









?>