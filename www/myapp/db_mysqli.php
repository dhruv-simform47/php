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
  // 1. Connect to the database


// 2. Data coming from a user (imagine they typed a quote: O'Reilly)
$user_input = " ' OR '1'='1 ";

// 3. Clean the data
$safe_input = mysqli_real_escape_string($conn, $user_input);

// 4. Use it in a query
$query = "SELECT * FROM users WHERE last_name = '$safe_input'";

$unsafequery = "SELECT * FROM users WHERE last_name = '$user_input'";
echo "<br>";
echo "<br>";

echo "================ unsafe query =============" ."<br>";
echo "<br>";
echo "<br>";

echo $unsafequery;
echo "<br>";
echo "<br>";

echo "================ safe query =============" ."<br>";
echo "<br>";

echo $query;
// Resulting query: SELECT * FROM users WHERE last_name = 'O\'Reilly'
}

filter_var($user_input,FILTER_SANITIZE_SPECIAL_CHARS);

?>

