<?php
   namespace space12;
   include 'b.php';
   function hello() {
      echo "Hello from current namespace:" . __NAMESPACE__ ."\n<br>" ;
   }
   const TEMP = 100;
    hello();	             //current namespace
    space1\myspace\hello();	    //sub namespace

   echo "<br>TEMP: " . \space12\TEMP . " in " . __NAMESPACE__ . "<br>";
   echo "<br>TEMP: " . \space1\myspace\TEMP  . " in space1\\myspace\n";
?>



<?php
   namespace space1;
   include 'b.php';
   function hello() {
      echo "Hello from current namespace:" . __NAMESPACE__ ."<br>" ;
   }
   const TEMP = 100;
   hello();            // current namespace
   myspace\hello();   // sub namespace

   echo "<br>TEMP : " . TEMP . " in " . __NAMESPACE__ ."<br>" ;
   echo "<br>TEMP : " . myspace\TEMP  . " \\in space1\\myspace\n";
?>