<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css
 /bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz
 /K68vbdEjh4u" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="#">Your Website</a></div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="calculator.php">Calculator</a></li>
                    <li><a href="contact.php">Contact</a></li>
                     <li><?php
                       /* 
                       if ( (isset($_COOKIE['user_id']))
                        && (basename($_SERVER['PHP_SELF'])
                        != 'logout.php') ) {
                        echo '<a href="logout.php">
                        Logout</a>';
                        } else {
                        echo '<a href="login_form.php">
                        Login</a>';
                        }
                       */ 
                      if (isset($_SESSION['user_id']))
                         {
                        echo '<a href="logout.php">
                        Logout</a>';
                        } else {
                        echo '<a href="login_form.php">
                        Login</a>';
                        }?>
                    </li> 
                    <li><?php if(isset($_SESSION['user_id'])){ echo session_id();} ?></li> 
                </ul>
            </div>
        </div>
    </nav>
    <?php $ada="adarsh kumar Shah" ?>