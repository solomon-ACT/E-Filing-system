   
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "Mysoul@141981";
	$dbname = "e-file";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$conn -> set_charset('utf8');
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	
?>
 