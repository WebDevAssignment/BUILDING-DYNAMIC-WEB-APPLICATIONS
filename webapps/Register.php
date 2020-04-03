
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | Chief of Beef</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<ul>
  <li>About...</li>
  <li>HomePage</li>
  <li><a href="LoginPHP.php">Login</a></li>
</ul>

    <h1>Chief of Beef</h1>
    <h2>Register</h2>
    
    
    <?php  include('errors.php');?>
    <form method = "post" action = "Register.php">
        
        * Name: <input type="text" name = "name" > <br>
        * Surname: <input type="text" name = "surname" > <br>
        * Username: <input type = "text" name = "username" > <br>
        * Password: <input type = "password" name = "password1"> <br>
        * Repeat Password: <input type = "password" name = "password2"> <br>
        * Email: <input type = "text" name = "email" > <br>
          Phone number: <input type="integer" name = "phone" > <br>
        <button type = "submit" name="register">Sign Up</button>
    </form>
    * have to be filled in <br><br>


    <p>Already registered?</p>
    <a href="LoginPHP.php">Login here!</a>

            
</body>
</html>
