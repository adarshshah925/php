<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
<h1>Login</h1>
<p id="results"></p>
    <form action="login_ajax.php" method="post" id="login">
        <p id="emailP">Email Address:
            <input type="email" name="email" id="email">
            <span class="errorMessage" id="emailError">Please enter your email address</span>
        </p>
        <p id="passwordP">Password:
            <input type="password" name="password" id="password">
            <span class="errorMessage" id="passwordError">Enter your Password</span>
        </p>
        <p><input type="submit" name="submit" value="login"></p>
    </form>
</body>
</html>