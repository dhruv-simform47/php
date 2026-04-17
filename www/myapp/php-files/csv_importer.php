<?php
// ->>create frontend file to get uploaded file and logic to handle file here  

// ini_set('display Error',1);
// error_reporting(E_ALL);   

// function myexception($exception)
// {
//     echo "Error Handler :" . $exception->getMessage();
// }
// set_exception_handler('myexception');

class fileCException extends Exception
{
    public $ErrorFile;
    public function __construct($fileName)
    {
        $this->ErrorFile = $fileName;
        parent::__construct("File OPening Error");
    }
    public function errorMessage()
    {
        echo "File :" . $this->getFile() . "<br> Line Number :" . $this->getLine() . " <br> Error Opening :-" . $this->ErrorFile . "<br>Sorry!";
    }
}

class DataCInvalid extends Exception
{   
    public function dataMessageError()
    {
        echo "<br>User Data Is Invalid :" . $this->getMessage() ."<br>";
    }
}

class FileExtensionError extends Exception{
    public function Errormessage()
    {
        $_Session['error']="<br> Sorry ! you have Uploaded Wrong File";
        
    }
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
$file_name=$_FILES['csv']['name'];
$extension=pathinfo($file_name,PATHINFO_EXTENSION);
$tmp_file=$_FILES['csv']['tmp_name'];
try{
if($extension!= "csv")
{
throw new FileExtensionError();
}
}
catch(FileExtensionError $f)
{
    $f->Errormessage();
}


try {

    $file = @fopen($file_name, "r");

    if ($file != false) {
        echo "Priniting the user file Data : <br>";
        // echo fgets($file);    -< use this insted of fgetcsv to only show data no processing
        print_r(fgetcsv($file));
        echo "<br>";
        while (($line = fgetcsv($file)) != false) {
            try {
     
                if (is_null($line[2]) || !is_numeric($line[2]) || $line[2] < 18) {
                    throw new DataCInvalid("User $line[0] 's  Age is " . $line[2]);
                } else {
                    echo "<br> Valid Data : $line[0] is having age $line[2]";
                    echo "<br>";
                }
            } catch (DataCInvalid $d) {
               
                $d->dataMessageError();
            }
        }
        // echo fread($file,filesize($file_name));  
    } else {
        throw new fileCException($file_name);
    }
} catch (fileCException $e) {
    $e->errorMessage();
}

finally{
    if($file)
    {
    echo "<br>File Reading Done ......!";
    fclose($file);
    }
}
}

   throw new Exception("Uncaught Exception");
// catch(Exception $e)
// {
//     echo $e->getMessage();
// }
