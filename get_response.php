<?php
require_once("config.php");
if((isset($_POST['your_name'])&& $_POST['your_name'] !=''))
{

$yourName = $conn->real_escape_string($_POST['your_name']);


$sql="INSERT INTO articles (TITLE,DATE,DESCRIPTION,IMAGE,TEXT) VALUES ('".$yourName."','".$yourName."','".$yourName."','".$yourName."','".$yourName."')";


if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Thank you!";
}
}
else
{
echo "Please fill Text";
}
?>