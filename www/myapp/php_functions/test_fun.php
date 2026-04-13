
<?php 

 foo();

include_once "functions.php";

// =========below function if it is declared then we can call this function before declaration
// because php first parse the code and at this phase it knows foo function exist so in run phase it will allow to execute the foo,but
// if this foo is defined in other file like in function.php and we include it and call foo before include then it will not detect other file function declaration and give error

// function foo()
// {
//     echo "helooo"; 
// }

?>    
