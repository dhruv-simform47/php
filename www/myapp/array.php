<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>
<body>
    <?php 
    
    $food=['sambhar','idli','mendu vada'];

    echo "<br> normal access<br> $food[0] - $food[1] - $food[2] <hr> ";
    
    $sauses=array(
        "type1" => "tomato",
        "type2" => "green",
        "type3" => "coconut"
    );
    echo "<br> using print_r function <br>";
    print_r($food);
    echo "<br> ";
    print_r($sauses);
    
    $desert=['lava-cake','basundi','sherra','jalebi','rabdi'];
    
    $var="some";
 echo "<br> <hr>using for each and for loop<br>";   
echo "<br><h3>food items</h3>";
 foreach($food as $f)
 {
    echo "$f<br> ";
 }

echo "<hr><h3>Sauses</h3>";
   foreach($sauses as $key => $value)
   {
    echo "$key -> $value <br> ";
   }

   echo "<hr><h3>Deserts</h3>";
   for($i=0;$i<count($desert);$i++)
   {
    echo "$desert[$i] <br> ";
   }

   echo "<hr><h3>tasks</h3>";

  
$tasks = [
	['Learn PHP programming', 2],
	['Practice PHP', 2],
	['Work', 8],
	['Do exercise', 1],
];
print_r($tasks); 
echo "<br>";
array_splice($tasks,2,1);

print_r($tasks); 
?>

<?php
echo "<br><hr><h3> Lets Try While Loop to print number from 0 to 10</h3>";
$i=1;
while($i <= 20)
{
echo "Number is - $i <br>";
$i+=1;
}   

echo "last<br>";
$d1=["hello","hi","bye"];
print_r($d1);
var_dump($d1);
?>

<?php
$d1=["hello","hi","bye"];
print_r($d1);
var_dump($d1);

$tasks = [
	['Learn PHP programming', 2],
	['Practice PHP', 2],
	['Work', 8],
	['Do exercise', 1],
];

$flash=[
    "Success"=>[
        "Message"=>[
            "Verified done",
            "Authentication done"
                  ]
              ]
        ];
print_r($flash);

 $x=json_encode($flash["Success"]);


$arr["FLASH"]["Success"]=["Message"=>"Verified"];
print_r($arr);
echo $arr["FLASH"]["Success"]["Message"];


 
echo "\n". $x;

// echo strpos($x,"[");
// echo strpos($x,"]");
echo "\n".substr($x,strpos($x,"["),(strpos($x,"]")+1)-(strpos($x,"[")));
// echo "\n". $x;

?>

</body>
</html>