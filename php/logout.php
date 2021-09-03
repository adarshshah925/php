<?php
session_start();
define('TITLE', 'Logout');
if(!isset($_SESSION['first_name'])){
    include('login_function.php');
    redirect_user();
}else{
    
    $_SESSION = [];
    session_destroy();
    setcookie('PHPSESSID', '',
    time()-3600, '/', '', 0, 0);
//The first line here will reset the ent
  
    // setcookie('user_id','', time()-3600, '/', 0, 0);
    // setcookie('first_name','', time()-3600, '/', 0, 0);

}
/*if(!isset($_COOKIE['first_name'])){
    include('login_function.php');
    redirect_user();
}else{
    setcookie('user_id','', time()-3600, '/', 0, 0);
    setcookie('first_name','', time()-3600, '/', 0, 0);

}
*/
include('header.php');
//echo "<p>You are now logged out</p> {$_SESSION['first_name']}";

include('footer.php');
?> 