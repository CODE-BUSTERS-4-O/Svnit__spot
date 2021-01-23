<?php
	$servername = "localhost";
	$dbUsername = "Prince";
	$dbPassword = "Prince@1234;
	$dBName = "signup";

	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dBName);

	if(!$conn){
		die("Connetction failed: ".mysqli_connect_error());
	}
?>