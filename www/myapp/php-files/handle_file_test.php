<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    echo $_FILES['csv']['name'];
    echo "<br>";
    echo $_FILES['csv']['tmp_name'];
    echo "<br>";
    echo basename($_FILES['csv']['name']);
    
}
?>