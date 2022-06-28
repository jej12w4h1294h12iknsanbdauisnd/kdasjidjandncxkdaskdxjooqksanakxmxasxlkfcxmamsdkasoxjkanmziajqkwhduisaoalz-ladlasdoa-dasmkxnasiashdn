<?php
$output = <<<OUTPUT
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <script charset="utf-8" src="js/antif12.js"></script> 
    <title>Login</title>
</head>
<body>
    <div id="main">
                <h1>Login</h1>
                <div id="login">
                                                <div class="error">Login failed</div>
                                                <form method="post" action="/index.php">
                                <div>Username</div>
                                <div><input type="text" name="login_usr"></div>
                                <div>Password</div>
                                <div><input type="password" name="login_pwd"></div>
                                <div><input type="submit" name="login_btn" value="Login"></div>
                        </form>
                </div>
        </div>
</body>
</html>
OUTPUT;
echo $output;