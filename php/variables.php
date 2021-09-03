<?php echo "hello world"; 

$file=$_SERVER['SCRIPT_FILENAME'];// this variable stores the path of the file that runs.
echo $file.'<br>';
$user=$_SERVER['HTTP_USER_AGENT'];// this variable stores the web browser and operating system of the user accessing the script.
echo $user;

$server=$_SERVER['SERVER_SOFTWARE'];
echo '.<br>'.$server;
$$a1=5;
?>