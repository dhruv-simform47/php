<?php 

require_once "credential.php";
$col_name=[];
$val_name=[];
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Try different modes here

    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    // different fetch mode 
    // $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    echo "Connected<br>";

    // Force query error
    $result=$conn->query("SELECT * FROM employees");
    var_dump($result);
    // foreach($result as $row)
    // {
    //     foreach($row as $col=>$val)
    //     {
    //         $col_name[]=$col;
    //         $val_name[]=$val;
    //     }
    // }

echo "<br>";
// $col_name=array_unique($col_name);

//     foreach($col_name as $col)
//     {
//         echo "$col &nbsp;";
//     }
// echo "<br>";
//     foreach($val_name as $val)
//     {
//         echo "$val &nbsp;";
//     }
//     echo "After query<br>";

echo "<br>";echo "<br>";
echo "<h2>fetch array_assoc </h2>";
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
    echo "<br>";
}

// 👉 “Fetch once = data consumed”

// echo "<br>";echo "<br>";
// echo "<h2>fetch object </h2>";
//     foreach($result as $row)
//     {
//         foreach($row as $value)
//         {
//             echo $value . "&nbsp;";
//         }
//         echo "<br>";
//     }


} catch (PDOException $e) {

    echo "Caught: " . $e->getMessage();

}