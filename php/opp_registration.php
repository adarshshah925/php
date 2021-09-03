<?php
include('connection.php');
if (isset($_POST['submit'])) {

    $error = [];
       if (empty($_POST['fname'])) {
           $error[] = 'you forget to enter your first name';
       } else {
           $fn =$mysqli->real_escape_string( trim($_POST['fname']));
           echo $fn;
       
       }
       if (empty($_POST['lname'])) {
           $error[] = 'you forget to enter your last name';
       } else {
           $ln =  $mysqli->real_escape_string(trim($_POST['lname']));
       }
       if (empty($_POST['email'])) {
           $error[] = 'you forget to enter your email name';
       } else {
           $e =  $mysqli->real_escape_string(trim($_POST['email']));
       }
       // check for a password match
       if (!empty($_POST['password'])) {
           if ($_POST['password'] != $_POST['cnf_password']){
               $error[] = 'your password didnot match confirm your password again';
           } else {
               $pass = $mysqli->real_escape_string( trim($_POST['password']));
           }
       }
        else {
           $error[] = 'you forget to enter your password';
       }
       if (empty($error)) {
           $vari="select first_name from registrations where email='$e'";
           $check=$mysqli->query( $vari);
           if($check!=TRUE){
               echo "error";
           }
           if($check->num_rows>0){
               echo "The user from this $e is already exists ";
           }else{
               $sql = "insert into registrations(first_name,last_name,email, pass,nacl, registration_date)
           VALUES('$fn','$ln','$e', AES_ENCRYPT('$pass',nacl),UNHEX(SHA2(RAND(),512)), NOW())";
           $result = $mysqli->query( $sql);
           if ($result == TRUE) {
               if($mysqli->affected_rows==1){
                   echo "data inserted successfully";
                   echo $mysqli->insert_id;
               }
             
           }  else { // If it did not run OK.
               // Public message:
                echo '<h1>System Error</h1>
                <p class="error">You could not be registered due to a system error. We apologize
               (447)
               for
                any inconvenience.</p>';
               
                // Debugging message:
                echo '<p>'. $mysqli->error. '<br><br>Query: ' . $sql . '</p>';
               
                }
           }    
       }
       else{
           echo "please fill all details";
           foreach($error as $key=>$value){
               echo $value.'<br>';
           }
       }   
   }
   // executing a simple query
$q="select * from registrations";
$r=$mysqli->query($q);
if($r->num_rows >0){
    // creating table 
    echo '<table>
    <tr>
    <th>First Name </th>
    <th>Last Name </th>
    <th>Emai; </th>
    </tr>
    <tbody>';
    while($row=$r->fetch_array(MYSQLI_ASSOC)){
        echo '<tr><td>'.$row['first_name'].'</td>
        <td>'.$row['last_name'].'</td>
        <td>'.$row['email'].'</td>
        </tr>';
    }
    echo '</tbody></table>';
}
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
<div class="container">
        <div class="registration center">
            <h1>Register Yourself</h1>
            <form action="opp_prepared_statement.php" method="post">
                Name:<input type="text" name="fname" placeholder="first Name"><br>
                Last Name:<input type="text" name="lname" placeholder="Last Name"><br>
                email:<input type="email" name="email" placeholder="Email"><br>
                Password:<input type="password" name="password" placeholder="Password"><br>
                Conform password<input type="password" name="cnf_password" placeholder="confirm Password"><br>
                <input type="submit" name="submit" value="Register" class="button">
            </form>
        </div>
    </div>
</body>
</html>
