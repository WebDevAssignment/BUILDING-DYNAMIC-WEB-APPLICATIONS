<?php
// https://www.youtube.com/watch?v=arqv2YVp_3E 
//https://stackoverflow.com/questions/14833426/php-set-session-with-cookies
include 'db_set.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Chief of Beef</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<ul>
  <li>About...</li>
  <li>HomePage</li>
  <a href="Register.php">Register</a>
</ul>

    <h1>Chief of Beef</h1>
    <h2>Login</h2>
    <?php  include('errors.php'); ?>
    <form method = "post" action="LoginPHP.php">
            <input type = "text" name = "userLog">
            <input type = "password" name = "passLog">
            <button type = "submit" name="login">LOGIN</button>
        </form>
        
    
        <p><a href="">(Forgot Password?)</a>&nbsp;&nbsp;&nbsp;&nbsp;Not registered yet?&nbsp;&nbsp;<a href="Register.php">Create account here!</a></p>

          
    
</body>
</html>

