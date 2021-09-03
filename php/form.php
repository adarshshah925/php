<?php 
// get method sends the submited the data to the receieving page name value pair.

// form validiation
if(!empty($_REQUEST['username'])){
    $name=$_REQUEST['username'];
}
else{
    $msg='<div style="color:red;">It is a required field</div>';
} 
if(!empty($_REQUEST['email'])){
    $email=$_REQUEST['email'];
}
else{
    $msg='<div style="color:red;">It is a required field</div>';
} 
if(isset($_REQUEST['age'])){
    $age=$_REQUEST['age'];
}
else{
    $msg='<div style="color:red;">It is a required field</div>';
} 
if(isset($_REQUEST['gender'])){
    $gender=$_REQUEST['gender'];
}
else{
    $msg='<div style="color:red;">It is a required field</div>';
} 
  echo gettype($_REQUEST);
  $array=$_REQUEST;
  foreach($array as $value){
     echo $value;
  }
  $server=$_SERVER;
  echo '<br>'.gettype($server);

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
    <form action=""mathod="post">
   Name:  <input type="text" name="username" placeholder="user name"><br>
   <?php if(isset($msg)){echo $msg;}?> 
   Email: <input type="email" placeholder="email" name="email"><br>
     Gender:<input type="radio" name="gender" id="gender" value="male">
     <input type="radio" name="gender" id="gender" value="female" ><br>
   Age: <input type="number" name="age" id="age"><br>
     <input type="submit" name="submit">
    </form>
</body>
</html>