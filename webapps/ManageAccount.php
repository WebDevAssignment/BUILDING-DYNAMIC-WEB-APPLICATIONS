<?php include('db_set.php'); ?>
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
  <li><a href="ManageAccount.php?logout=1">Logout</a></li>
</ul>


    <h1>Chief of Beef</h1>
    <h2>Manage Account:</h2>
    
    <?php 
        print_r($_SESSION);
        if (isset($_SESSION['login'])):
    ?>
        <h3>
            <?php
              
             
              echo $_SESSION['login']; 
              
              
              if(isset($_GET['logout'])){
              unset($_SESSION['login']);
                }
            ?>

        </h3>
            

    <?php endif ?>
    

    <?php  include('errors.php');?>
    
    <form method = "post" action = "ManageAccount.php">
        Name: <input type="text" name = "name" value="<?php echo  $_SESSION['name']?>"> <br>
        Surname: <input type="text" name = "surname" value="<?php echo  $_SESSION['surname']?>"> <br>
        Username: <input type = "text" name = "username" value="<?php echo  $_SESSION['username']?>"> <br>
        Email: <input type = "text" name = "email" value="<?php echo  $_SESSION['email']?>"> <br>
        Phone number: <input type="integer" name = "phone" value="<?php echo  $_SESSION['phone']?>"> <br>
        <button type = "submit" name="Update">Save</button>
        <br><a href="">(Change password)</a>
    </form>
    
            

    


            
</body>
</html>
