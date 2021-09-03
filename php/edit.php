
<?php 
require('../../config.php');
$sql= "select * from registrations where id='{$_GET["id"]}'";
$r=mysqli_query($conn,$sql);
if($r==TRUE){
    echo "success";
}
else{
    echo mysqli_error($conn);
    echo $sql;
}
$num=mysqli_num_rows($r);
if($num==1){
    $row=mysqli_fetch_assoc($r);
    $fname=$row['first_name'];
    $lname=$row['last_name'];
    $email=$row['email'];
    $r_date=$row['registration_date'];
    echo' <form action="" method="post">
    Name:<input type="text" name="fname" value="'.$fname.'" placeholder="first Name"><br>
    Last Name:<input type="text" name="lname" value="'.$lname.'" placeholder="Last Name"><br>
    email:<input type="email" name="email" value="'. $email.'" placeholder="Email"><br>
    <input type="submit" name="submit" value="Register" class="button">
</form>';


}
// form validation for editing

if(isset($_POST['submit'])){
    $error=[];
    if (empty($_POST['fname'])) {
        $error[] = 'you forget to enter your first name';
    } else {
        $fn =  mysqli_real_escape_string($conn, trim($_POST['fname']));
        
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
    if(empty($error)){
        $q="update  registrations set first_name='$fn', last_name='$ln',email='$e'  where id={$_GET['id']}";
        $result=mysqli_query($conn,$q);
        if($result==TRUE){
            echo "successful";
            
        }
        else{
            echo mysqli_errno($conn);
            echo $q;
        }
        
    }else{
    foreach($error as $key=>$value){
        echo $value;
    }
}
}
?>
