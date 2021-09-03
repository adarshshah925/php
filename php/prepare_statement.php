<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
                Name:<input type="text" name="fname" placeholder="first Name"><br>
                Last Name:<input type="text" name="lname" placeholder="Last Name"><br>
                email:<input type="email" name="email" placeholder="Email"><br>
                Password:<input type="password" name="password" placeholder="Password"><br>
                Conform password<input type="password" name="cnf_password" placeholder="confirm Password"><br>
                <input type="submit" name="submit" value="Register" class="button">
           </form>
</body>
</html>
<?php
include('../../config.php');

    if(isset($_POST['submit'])){
    $fname=  strip_tags($_POST['fname']);
   
    $lname=  strip_tags($_POST['lname']);
    $email=  strip_tags($_POST['email']);
    $p=  strip_tags($_POST['password']);
    $p1= strip_tags($_POST['cnf_password']);
    $error=[];
        if(!empty($fname)){
            $fname=mysqli_real_escape_string($conn, trim($fname));
        }else{
            $error[].="enter your first name";  
        }
        if(!empty($lname)){
            $lname=mysqli_real_escape_string($conn, trim($lname));
        }else{
            $error[].="enter your last name";
        }if(!empty($email)){
            $email=mysqli_real_escape_string($conn, trim($email));
        }else{
            $error[].="enter your email";
        }
        if (!empty($p)) {
            if ($p != $p1) {
            $errors[] = 'Your password did not match the confirmed password.';
            } 
            else {
            $p = mysqli_real_escape_string($conn, trim($p));
            echo $p;
                }
            } 
            else {
            $errors[] = 'You forgot to enter your password.';
            }
        if(!empty($error)){
            foreach($error as $value){
                echo $value;
            }
        }
        else{
            // creating prepared statement
            $q = "INSERT INTO registration (first_name, last_name, email, pass, registration_date)
            VALUES (?, ?, ?,SHA2(?, 512), NOW())";
            //preparing prepared statement
            $r=mysqli_prepare($conn, $q);

            //Binding variable

            mysqli_stmt_bind_param($r, 'sssb', $fname, $lname, $email,$p);

            // executing query

            mysqli_stmt_execute($r);
            if(mysqli_stmt_affected_rows($r)==1){
                echo "data inserted successful";
            }else{
                echo mysqli_stmt_error($r).'<br>Query :'.$q;      
            }
        }      
    }
?>
