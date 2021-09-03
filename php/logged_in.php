<?php
define('TITLE', 'Logged_In');
session_start();
// using session
if(!isset($_SESSION['agent']) or 
($_SESSION['agent']!=sha1($_SERVER['HTTP_USER_AGENT']))){
    echo "<h1>Logged In!</h1>
<p>You are now logged in,
{$_SESSION['first_name']}!</p>
<p><a href=\"logout.php\">Logout
</a></p>";
}
/*if(!isset($_COOKIE['user_id'])){
    include('login_function.php');
    redirect_user();
}
*/
include('header.php');
echo "<h1>Logged In</h1>
<p>You are now logged In {$_SESSION['first_name']}</p>
";
include('footer.php');
?>