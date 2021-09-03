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
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "<h2>Original Data</h2><p> {$_POST['data']}</p>";
    echo '<h2>After htmlentities()</h2>
    <p>' . htmlentities($_POST['data']). '</p>';
echo '<h2>After strip_tags()
</h2><p>' . strip_tags($_POST['data']). '</p>';


echo '<h2>After Filter var</h2>
<p>'.filter_var($_POST['data'], FILTER_SANITIZE_STRING).'</p>';

}




?>
<form action="" method="post">
    <p>Do Your worst! <textarea name="data" id="" cols="30" rows="10"></textarea></p>
    <div align="center">
        <input type="submit" name="submit" value="submit" id="">
    </div>
</form>
</html>