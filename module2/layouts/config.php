<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

  // --------------------------- PDO ----------------------------------------

    $servername = "localhost";
	$usernamedb = "root";
	$password = "";
	$dbname = "system_db";

	try {
	    	$pdo = new PDO("mysql:host=$servername;dbname=".$dbname, $usernamedb, $password);
	    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected";
		}
	catch(PDOException $e)
		{
		    echo "Error: " . $e->getMessage();
		}

        // --------------------------- MSQLi ----------------------------------------

$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "system_db";

define('DB_SERVER', 'localhost');
define('DB_USERNAME', $DB_USERNAME);
define('DB_PASSWORD', $DB_PASSWORD);
define('DB_NAME', $DB_NAME);

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>