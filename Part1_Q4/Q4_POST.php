<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Assignment Q4: Post</title>
    </head>
    <body>

        <form method = "post">
            <input type = "text" name = "name">
            <button type = "submit">SUBMIT</button>
        </form>
        
        <?php
            if(isset($_POST['name'])){
                $_SESSION['name1'] = $_POST['name'];
                echo "<br>".$_SESSION['name1'];
            }
        ?>
    </body>
</html>