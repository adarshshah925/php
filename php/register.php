<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .center {
            margin: auto;
            width: 50%;
            padding: 1rem;
            border: 1px solid blue;
        }

        form input {
            width: 50%;
            padding: 0.5rem;
            text-align: center;
            margin: 10px;
            border: 1px solid blue;
            border-radius: 5px;

        }

        .btn {
            background-color: green;
            padding: 0.5rem;
            width: 30%;
            margin-left: 140px;
            border: none;
            ;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<?php
 require('../../config.php');
// form validation
if (isset($_POST['submit'])) {

 $error = [];
    if (empty($_POST['fname'])) {
        $error[] = 'you forget to enter your first name';
    } else {
        $fn =  mysqli_real_escape_string($conn, trim($_POST['fname']));
        echo $fn;
    
    }
    if (empty($_POST['lname'])) {
        $error[] = 'you forget to enter your last name';
    } else {
        $ln =  mysqli_real_escape_string($conn,trim($_POST['lname']));
    }
    if (empty($_POST['email'])) {
        $error[] = 'you forget to enter your email name';
    } else {
        $e =  mysqli_real_escape_string($conn,trim($_POST['email']));
    }
    // check for a password match
    if (!empty($_POST['password'])) {
        if ($_POST['password'] != $_POST['cnf_password']){
            $error[] = 'your password didnot match confirm your password again';
        } else {
            $pass = mysqli_real_escape_string($conn, trim($_POST['password']));
        }
    }
     else {
        $error[] = 'you forget to enter your password';
    }
    if (empty($error)) {
        $vari="select first_name from registrations where email='$e'";
        $check=mysqli_query($conn, $vari);
        if($check!=TRUE){
            echo "error";
        }
        $num=mysqli_num_rows($check);
        if($num>0){
            echo "The user from this $e is already exists ";
        }else{
            $sql = "insert into registrations(first_name,last_name,email, pass,nacl, registration_date)
        VALUES('$fn','$ln','$e', AES_ENCRYPT('$pass',nacl),UNHEX(SHA2(RAND(),512)), NOW())";
        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            if(mysqli_affected_rows($conn)==1){
                echo "data inserted successfully";
            }
          
        }  else { // If it did not run OK.

            // Public message:
             echo '<h1>System Error</h1>
             <p class="error">You could not be registered due to a system error. We apologize
            (447)
            for
             any inconvenience.</p>';
            
             // Debugging message:
             echo '<p>'. mysqli_error($conn) . '<br><br>Query: ' . $sql . '</p>';
            
             }
        }
        
    }
    else{
        echo "please fill all details";
        foreach($error as $key=>$value){
            echo $value;
        }
    }   
}
$q= "select * from registrations";
//$s="select * from registrations where r_id=1";
//$t=mysqli_query($conn,$s);
$r=mysqli_query($conn,$q);
/*$num=mysqli_num_rows($t);
if($num==1){
    $u="update registration set first_name='Chandan' where r_id=1";
    $c=mysqli_query($conn,$u);
    if($c==TRUE){
        echo "updated successfully";
    }else{
        echo '<p>'.mysqli_error($conn).'<br>'.$u.'</p>';
    }
}
echo $num;
*/

if($r==TRUE){
echo '<table><thead><tr>
         <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Registration Date</th><th>Edit</th><th>Delete</th>
      </tr></thead><tbody>';
while($row=mysqli_fetch_array($r, MYSQLI_NUM)){
    echo '<tr>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
    <td>'.$row[3].'</td>
    <td>'.$row[6].'</td>
    <td><a href="edit.php?id='.$row[0].'">Edit</a></td>
    <td><a href="delete.php?id='.$row[0].'">Delete</a></td>
    </tr>';
}
echo'</tbody></table>';

}else{
    //debugging message
    echo "<p>".mysqli_error($conn)."<br>".$q."</p>";
}
?>
<body>
    <div class="container">
        <div class="registration center">
            <h1>Register Yourself</h1>
            <form action="" method="post">
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