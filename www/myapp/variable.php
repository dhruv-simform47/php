<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables</title>
</head>
<body>
    <h2>data-types of variable</h2>   
<?php
        $title = 'PHP is awesome!';
        var_dump($title); echo "<br>";
        $number=1;
        var_dump($number); echo "<br>";
        $float_var=1.1;
        var_dump($float_var); echo "<br>";
        $double_var=1234567891234567.12345678;
        var_dump($double_var); echo "<br>";
        $boolean_true=TRUE;
        var_dump($boolean_true); echo "<br>";
        $boolean_false=FALSE;
        var_dump($boolean_false);  echo "<br>";

        const constant_var ="never changed";
        define('batman','"Men Are Brave"');
        var_dump(constant_var); echo "<br>";
         var_dump(batman); echo "<br>";

    
    ?>
    <h2>This is variable it can be access using $ symbol'</h2>
    <h3><?php echo $title  ?></h3>
    <h3><?php echo $number; ?></h3>
    <h2>This is constant-unlike normal variable it can be  access without $ symbol</h2>
    <h3><?php echo constant_var; ?></h3>
    <h3><?php echo batman; ?></h3>
</body>
</html>
