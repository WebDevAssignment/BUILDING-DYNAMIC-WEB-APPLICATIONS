<?php
    include 'NavigationBar.php';
?>

<body>
    <h1>Chief of Beef</h1>
    <h2>Login</h2>
    <?php  include('errors.php');
    if(!isset($_SESSION['login'])){ ?>
        <form method = "post" action="LoginPHP.php">
                <input type = "text" name = "userLog">
                <input type = "password" name = "passLog">
                <button type = "submit" name="login">LOGIN</button>
        </form>
        <p><a href="">(Forgot Password?)</a>&nbsp;&nbsp;&nbsp;&nbsp;Not registered yet?&nbsp;&nbsp;<a href="Register.php">Create account here!</a></p>
    <?php } 
    else{
        echo 'Already logged in';
    }
    ?>           
</body>
</html>