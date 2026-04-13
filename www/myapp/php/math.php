<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=='POST')
{
$x=$_POST['x'];

$_SESSION['abs']="Absolute Value :" . abs($x);
header('Location: '.$_SERVER['PHP_SELF']);
exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="#" method="post">
    X:
    <input type="text" name="x" id="x">
    <br>
    <input type="submit" value="submit">
    </form>

<?php 
if(isset($_SESSION['abs']))
{
    echo $_SESSION['abs'];
    unset($_SESSION['abs']);
}
?>
</body>
</html>