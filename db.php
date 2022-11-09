<?php
## FOR OFFLINE

	## FOR ONLINE
	$servername = "localhost";
	$username = "root";
	$password = "abarest";
	$database = "user_profle";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password,array(PDO::MYSQL_ATTR_LOCAL_INFILE => true));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Print "Connected successfully"; 
    }
catch(PDOException $e)
{
Print "Connection failed: " . $e->getMessage();
}


?>