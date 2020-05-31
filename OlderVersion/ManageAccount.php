<?php
    include 'Header.php';
    
?>

    <h1>Chief of Beef</h1>
    <h2>Manage Account:</h2>
    
    <?php 
        //print_r($_SESSION);
        if (isset($_SESSION['login'])){
    ?>
        <h3>
            <?php
              
             
              echo $_SESSION['login']; 
              
              
              if(isset($_GET['logout'])){
              unset($_SESSION['login']);
                }
            ?>

        </h3>

    <?php  include('errors.php');  ?>
    
    <form method = "post" action = "ManageAccount.php">
        Name: <input type="text" name = "name" value="<?php echo  $_SESSION['name']?>"> <br>
        Surname: <input type="text" name = "surname" value="<?php echo  $_SESSION['surname']?>"> <br>
        Username: <input type = "text" name = "username" value="<?php echo  $_SESSION['username']?>"> <br>
        Email: <input type = "text" name = "email" value="<?php echo  $_SESSION['email']?>"> <br>
        Phone number: <input type="integer" name = "phone" value="<?php echo  $_SESSION['phone']?>"> <br>
        <button type = "submit" name="Update">Save</button>
        <br><a href="">(Change password)</a>
    </form>
    
    <?php }
    else{
        echo 'Log In to Manage your Account';
    } ?>

    


            
</body>
</html>