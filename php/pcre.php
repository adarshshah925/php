<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
 if($_SERVER['REQUEST_METHOD']=="POST"){
     if(isset($_POST['submit'])){
         $pattern=htmlentities($_POST['pattern']);   
         $replace=htmlentities($_POST['replace']);      
         $subject=htmlentities($_POST['subject']);
         echo "<p>The result of Checking<br><strong>$pattern</strong><br>against<br>$subject<br> is";
         if(preg_match($pattern, $subject)==TRUE){
             echo preg_replace($pattern,$replace,$subject);
             echo 'TRUE !</p>';
             echo "<pre>";
            // print_r($array);
             echo "</pr>";
         }else{
            echo 'False !</p>';
         }
     }
 }
?>

<form action="" method="post">
    <p>Regular Expression Pattern: <input type="text" name="pattern"
    value="<?php if(isset($pattern)) echo $pattern; ?>">(include the delimiters)</p>
    <p>Replacement <input type="text" name="replace"
    value="<?php if(isset($replace)) echo $replace; ?>"></p>
    <p>Test Subject: <textarea name="subject" rows="5" cols="40"><?php if(isset($subject)) echo $subject;?></textarea></p>
     <input type="submit" name="submit"  value="Test!">
</form>
