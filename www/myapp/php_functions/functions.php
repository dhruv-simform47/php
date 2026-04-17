<?php

// this foo is defined in this file  we include it in other file like test_fun and call foo before include then it will not detect included file function declaration and give error
function foo()
{
    echo "helooo"; 
}
function goo()
{
    echo "another function";
}
?>