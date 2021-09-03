<?php 

include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['submit'])){
    $e= $_POST['email'];
    $p= $_POST['password'];
    list($check,$data)=check($conn,$e, $p );
    //print_r(list($check, $data));
    if($check){
         // Session
         session_start();
         $_SESSION['user_id']=$data['user_id'];
         $_SESSION['first_name']=$data['first_name'];
         $_SESSION['agent']=sha1($_SERVER['HTTP_USER_AGENT']);
         redirect_user('logged_in.php');
        /*
        // setting cookies
        setcookie('user_id', $data['user_id']);
        setcookie('first_name',$data['first_name']);
        */
        
    }
    else{
        $error=$data;
        echo "fail";
    }
    }
    
}
function redirect_user($page='index.php'){
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;
    //$url .= '?name=' . urlencode(value);
    header("Location: $url");
    exit();
}
function check($conn,$email='', $pass=''){
   $error=[];
   if(empty($email)){
       $error[].="enter your email";
   }
   else{
       $email=mysqli_real_escape_string($conn, trim($email)); 
       
   }
   if(empty($pass)){
    $error[].="enter your password";
    }
    else{
        $pass=mysqli_real_escape_string($conn, trim($pass)); 
    }
    if(empty($error)){
        $q="SELECT user_id, first_name FROM user where email='$email'  AND pass=SHA2($pass,512)";
        $r=mysqli_query($conn, $q);
        print_r($r);
        if($r==TRUE){
            if(mysqli_num_rows($r)==1){
                $row=mysqli_fetch_assoc($r); 
                echo "login Successfull"; 
                //header('location: page.php');
                return [true, $row];
                
            }
        }
        else{
            echo mysqli_error($conn).'<br>'. $q;
            $errors[] = 'The email address and password entered do not match those on file.';
        }
    }else{
        foreach($error as $value){
            echo $value;
        }
    }
}
//check($conn,'adarshshah925@gmail.com', 123 )

?>

