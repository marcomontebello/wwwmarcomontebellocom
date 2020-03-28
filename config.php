<?php
$dbhost = "localhost";
$dbname = "id6748206_blog";
$dbuser = "id6748206_marcomontebello";
$dbpass = "Marcom88";
// Create connection
$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>