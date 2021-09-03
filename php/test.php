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
     <input type="text" name="number" value="<?php /*if(isset($_POST['number'])){echo $_POST['number'];}else if(isset($_GET['number'])){echo $_GET['number'];}*/?>" required>
     <input type="submit" name="submit" value="submit">
    </form>

    <?php
   // echo $_GET['number'];
    
   /*  
    
    function table($n){
        $i=1;
            for($i=1;$i<=10;$i++){
                $t=$i*$n;
                echo "<tr>
                <td>$i</td><td>*</td><td>$n</td><td>=</td><td>$t</td>
                </tr><br>";
            }
    }
        if(isset($_POST['submit']) && is_numeric($_POST['number'])){
            $n=$_POST['number'];
            table($n);
           
        }  
      else if(isset($_GET['number'])){
            $n=$_GET['number'];
            if(isset($n)){    
           table($n);
        }
        }else{
            echo "adarsh";
        }*/      
    ?>
</body>
</html>