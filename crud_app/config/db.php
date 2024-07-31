<?php
$host = 'localhost';
$dbname = 'student_db';
$username = 'root';  
$password = '';     

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
