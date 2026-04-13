<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
echo "<br>";
echo "Hello we are at the line number". __LINE__ . "<br>";
echo "our file name is :". __FILE__ . "<br>";
echo "our Dir name is :". __DIR__ . "<br>";


#magic constants are case insensitive
function greet()
{
echo "our FUNC name is :". __function__ . "<br>";
}
greet();

class simform{
    function getclass()
    {
        echo "we are inside of function : <u><b> ". __method__ ." </b></u> which is in class :<u><b> " . __class__ ."</b></u> <br>";
    }
}

$obj= new simform();
$obj->getclass();


?>    

</body>
</html>