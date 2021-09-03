<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
    .msg{  
        color: #fff;
        padding:0.5rem;
        margin: 20px;
        text-align: center;
        border-radius: 5px;

    }
    .container{
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }
    .center{
        margin:auto;
        width: 50%;
        padding: 1rem;
        border: 1px solid blue;
    }
    form input{
        width: 50%;
        padding: 0.5rem;
        text-align: center;
        margin: 10px;
        border: 1px solid blue;
        border-radius: 5px;
    }
    .btn{
        background-color: green;
        padding: 0.5rem;
        width: 30%;
        margin-left:140px;
        border: none;;
        color: #fff;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (
            isset(
                $_POST['distance'],
                $_POST['speed']
            ) &&
            is_numeric($_POST['distance']) &&
            is_numeric($_POST['speed'])
        ) {
            $distance = $_POST['distance'];
            $speed = $_POST['speed'];
            $total_hours = floor($distance / $speed);
            $days = floor($total_hours / 24);
            $hour = $total_hours % 24;
            $msg = "<div class='msg' style='background-color:green'> $days Days and  $hour hours  require to cover the distance $distance</div>";
        } else {
           $msg= "<div class='msg' style='background-color:red'>please Fill all details</div>";
    }
    }
    ?>
    <?php
    function speed()
    {
        echo ' <input type="number" name="speed"';
        if (isset($_POST['speed'])) {
            echo 'select="selected"';
        }
        echo '>';
    }
    ?>
    <div class="container">
    <div class="center">
        <h2>Calculate days and hour for your Trip</h2>
    <form action="" method="post">
        <p>Distance (in miles): <input type="number" name="distance" 
        value="<?php if (isset($_POST['distance'])) { echo $_POST['distance']; } ?>"></p>
        <p>Velocity(Per hour):<?php speed();?></p>  
        <input type="submit" name="submit" value="calculate" class="btn">
    </form>
    </div>
   
    </div>
    
    <?php if (isset($msg)) {
        echo $msg;
    }?>
</body>
</html>