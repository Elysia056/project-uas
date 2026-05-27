<?php
define ('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'sia');

$mysqli = new mysqli (DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if ($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connection to MySQL successfully using MySQLi.";
?>