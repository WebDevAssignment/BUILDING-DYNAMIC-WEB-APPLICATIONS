<?php
    include 'Header.php';
?>

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
    * Required <br><br>


    <p>Already registered?</p>
    <a href="LoginPHP.php">Login here!</a>

            
</body>
</html>