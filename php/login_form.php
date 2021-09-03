<?php
define('TITLE', 'Login');
include('header.php');
include('config.php');
include('login_function.php');

echo dirname($_SERVER['PHP_SELF']);
/*
//form validiation
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
        $error=[];
        if(!empty($_POST['email'])){
          $email=$email=mysqli_real_escape_string($conn,trim($_POST['email']));
        } 
        else{
           $error[].="You forget to enter your email";
        } 
        if(!empty($_POST['password'])){
            $password=mysqli_real_escape_string($conn,trim($_POST['password']));
           
        }else{
            $error[].="You forget to enter your password";
        }
        if(empty($error)){
            $q="SELECT user_id, first_name FROM user where email='$email'  AND pass=SHA2($password,512)";
            $r=mysqli_query($conn, $q);
            if($r==TRUE){
                if(mysqli_num_rows($r)==1){
                    $row=mysqli_fetch_assoc($r); 
                    echo "login Successfull"; 
                    header('location: page.php');
                }
            }
          
            else{
                echo mysqli_error($conn).'<br>'. $q;
                $errors[] = 'The email address and password entered do not match those on file.';
            }
        }else{
            foreach($error as $values){
                echo $values;
            }
        }
    }
    
}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <p>Email address<input type="emaail" name="email" placeholder="Enter Your email"></p>
        <p>Email address<input type="password" name="password" placeholder="Enter Your Paddword"></p>
        <input type="submit" name="submit" value="login" id="">
    </form>
</body>
</html>
<?php include('footer.php'); ?>