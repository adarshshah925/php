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
     <input type="text" name="number">
     <input type="submit" name="submit" value="submit">
    </form>

    <?php 
     if(isset($_POST['submit']) && is_numeric($_POST['number'])){
         $n=$_POST['number'];
         if($n==1 || $n==2){
             echo "Please enter a no greater then 2";
         }else{
            $i=1;
            for($i=2;$i<=$n/2;$i++){
               $t=$n%$i;
            }
            if($t==0){ 
                echo "$n is not an prime no";
              }else{
                echo "It is a prime no";
              } 
         }     
     } else{
         echo "please enter a valid no";
     }
    ?>
</body>
</html>