<?php 

require_once "credential.php";

$conn= new mysqli($host,$username,$password,$dbname);

if($conn->connect_error)
{
  die ("Connection error" . $conn->connect_errno);
}
else
{
  echo "connection successful";
  
}



?>

