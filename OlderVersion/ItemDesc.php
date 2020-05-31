<?php
    include 'Header.php';
?>
        
        <?php
            $flag = 1; //Flag to mark whether to render the page or not
            $dishID = $_GET['dish']; //Gets dish ID from URL
            $dbRows = mysqli_query($mydb, "SELECT * FROM menu;"); //Getting data from menu table
            
            if(mysqli_num_rows($dbRows) < $dishID || $dishID < 0){ //Checks that dish ID exists by seeing that it is not below 0 or greater than the total number of dishes
                echo "Dish does not exist";
                $flag = 0;
            } 
            else{
                $sqlStmt = "SELECT * FROM menu WHERE DishID=?;";
                $stmt = mysqli_stmt_init($mydb);

                if(!mysqli_stmt_prepare($stmt, $sqlStmt)){
                    echo "Unexpected Failure";
                } 
                else {
                    //Fetching data of dish via prepared statements
                    mysqli_stmt_bind_param($stmt, "i", $dishID);
                    mysqli_stmt_execute($stmt);
                    $dbData = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($dbData);        
                }
            }   
        ?>

        <?php if($flag == 1){?> <!-- If the dish is valid, render the page -->
            
            <h1><?php echo $row['name'] ?>:</h1>

            <div>
                <p>Item Description: <?php echo $row['dishDesc'] ?>
                <br>
                Item Price: <?php echo $row['price'] ?>€
                <br>
                Image: <?php echo '<br><img id="itemImage" src="'. $row['image'] .'" alt="'. $row['name'] .'">' ?> </p>
            </div>

            <a href="Menu.php">Back to Menu</a>
            <br>
            <a href="Favourites.php">Back to Favourites</a>
        <?php } ?>

        <script src="" async defer></script>
    </body>
</html>