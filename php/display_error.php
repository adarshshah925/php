<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Testing Display Errors</h2>
<?php # Script 8.1 - display_errors.php
// error_reporting(0); this function turns off the error when passing the value 0.
 // Show errors:
 //ini_set('display_errors', 1);
// error_reporting(E_ALL);
 //Create errors:

 // Flag variable for site status:
define('LIVE', false);

 // Create the error handler:
 function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

 // Build the error message:
 $message = "An error occurred in script '$e_file' on line $e_line: $e_message\n";

 // Append $e_vars to $message:
 $message .= print_r ($e_vars, 1);

 if (!LIVE) { // Development (print the error).
 echo '<pre>' . $message . "\n";
 debug_print_backtrace();
 echo '</pre><br>';
 } else { // Don't show the error.
 echo '<div class="error">A system error occurred. We apologize for the
 inconvenience.</div><br>';
 }

 } // End of my_error_handler() definition.
 // Use my error handler:
 set_error_handler('my_error_handler');
//error_reporting(E_ALL);

 foreach ($var as $v) {}
 $result = 1/0;//by using @ we can prevent to display specific error.
echo "adarsh Kumar Shah";
include('requester.php');
$b;
echo $b;
ada();


 ?>
</body>
</html>