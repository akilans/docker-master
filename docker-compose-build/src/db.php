<?php


$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PWD');
$dbname = getenv('DB_NAME');

/*
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "infosys";
*/

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
