<?php 
// Defining constant
define('user', 'root');
define('password', '');
define('host', 'localhost');
define('db', 'test');
$mysqli= new mysqli(host, user, password, db);

if($mysqli->connect_error){
    echo $mysqli->connect_error;
    unset($mysqli);
   
}else{
    
    
    $mysqli->set_charset('utf-8');
    /*
    echo "<pre>";
   echo print_r($mysqli,1);
    echo "</pre>";
    */
}
?>