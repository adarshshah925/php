<?php
// creating own functions 
include('header.php');

function stic()
{
    static $n=1;
   echo $n++;
   echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is
 an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>'; 
    
}
stic();
echo $ada;


// variable Scope
// function scope variabe 
function func(){
    global $num;
    $num =10;
}

func();
// echo $num; On accessing the variable which is defined inside a function gives an error(Notice: Undefined variable: num in /opt/lampp/htdocs/php/function.php on line 22)
// for accessing the variable which is declare inside a function first need to define it global variable

echo $num;
include('config.inc.php') OR
die('Could not open the file.');

?>