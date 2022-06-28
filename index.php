<?php
echo '<!doctype html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<link rel="stylesheet" href="style.css">';
echo '<script charset="utf-8" src="js/antif12.js"></script>';
echo '<title>Login</title>';
echo '</head>';
echo '<body>';
echo '<div id="main">';
echo '<h1>Login</h1>';
echo '<div id="login">';
echo '<div class="error">Login failed</div>';
echo '<form method="post" action="/kkk">';
echo '<div>Username</div>';
echo '<div><input type="text" name="login_usr"></div>';
echo '<div>Password</div>';
echo '<div><input type="password" name="login_pwd"></div>';
echo '<div><input type="submit" name="login_btn" value="Login"></div>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';
?>