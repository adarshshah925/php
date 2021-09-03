<?php define('TITLE', 'contact');
include('header.php');
include('../../config.php');
$error =[];
if (isset($_POST['submit'])) {
    echo "adarsh";
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $body = $_POST['msg'];
    if (!empty($uname)) {
        $uname = mysqli_escape_string($conn, trim($uname));
    } else {
        $error[].= "enter your user name";
    }
    if (!empty($uemail)) {
        $uemail = mysqli_escape_string($conn, trim($uemail));
    } else {
        $error[].= "enter your email";
    }
    if (!empty($body)) {
        $body = mysqli_escape_string($conn, trim($body));
        $body=wordwrap($body,70);
    } else {
        $error[].= "enter your Comment";
    }
    if(empty($error)){
        echo "adarsh";
    $To="adarshah1711@gmail.com";
     $subject="contact form Submition";
     $headers=$uemail;
    mail($To,$subject,$body, $headers);
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
    <div class="container">
        <form action="" method="post">
            <p>Name: <input type="text" name="uname" placeholder="Enter Your Name"></p>
            <p>Email: <input type="email" name="uemail" placeholder="Enter Your email"></p>
            <p>Comment: <textarea name="msg" cols="30" rows="10" placeholder="Ask you query"></textarea></p>
            <input type="submit" name="submit" value="submit">
    </div>
    </form>
    <?php foreach ($error as $key => $value) {
        echo $value;
    } ?>
</body>

</html>