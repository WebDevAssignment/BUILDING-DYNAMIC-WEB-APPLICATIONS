<?php
session_start();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Assignment Q4: Post</title>
    </head>
    <body>

        <form method = "get">
            <input type = "text" name = "name">
            <button type = "submit">SUBMIT</button>
        </form>
        
        <?php
            if(isset($_GET['name'])){
                $_SESSION['name1'] = $_GET['name'];
                echo "<br>".$_SESSION['name1'];
            }
        ?>
    </body>
</html>