<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
</head>
<body>
    <?php
    
    $fileName="dummy.txt";
    try{
    $file=fopen($fileName,"r");
    
    if($file == false)
    {
     echo "Not able to read file";   
    }
    else{
        $fileSize=filesize($fileName);
        $data=fread($file,$fileSize);
        echo "File data is <br><hr>";
        
        $metadata=stream_get_meta_data($file);  echo "<br>";
        
        
        $path=$metadata['uri']; 
        $fname=basename($path);
        echo "<b><i> 
        File Path : {$path} <br> File name :{$fname}
        </i></b> <hr>";

        echo $data;
        echo "<br><br>";
        print_r($metadata);
    
    }
}
catch(Exception $e)
{
echo "<br> Error :" . $e->getMessage();
}
finally
{
    fclose($file);
}
    ?>
</body>
</html>