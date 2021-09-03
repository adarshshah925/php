
<?php
if(isset($_POST['submit'])){
    $file=$_FILES['image'];
    
    echo gettype($file);


    foreach($file as $key=>$values){
        echo $key .':'.$values.'<br>';
    }
    
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
<form action="" method="post" enctype="multipart/form-data">
        File: <input type="file" name="image">
        <input type="submit" name="submit">
    </form>
</body>
</html>