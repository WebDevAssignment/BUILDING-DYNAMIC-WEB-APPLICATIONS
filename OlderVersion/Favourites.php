<?php
    include 'Header.php';
?>
        
        <?php
            if(isset($_SESSION['customerID'])){
                $sql = "SELECT *, favourites.CustomerID FROM menu INNER JOIN favourites ON menu.DishID = favourites.DishID WHERE CustomerID=?";
                $stmt = mysqli_stmt_init($mydb);
                
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Unexpected Failure";
                } 
                else {
                    //Fetching data of dish via prepared statements
                    mysqli_stmt_bind_param($stmt, "i", $_SESSION['customerID']);
                    mysqli_stmt_execute($stmt);
                    $dbData = mysqli_stmt_get_result($stmt);     
                }
            }
        ?>

        <?php if(isset($_SESSION['customerID'])){
            if(mysqli_num_rows($dbData)>0){ ?>   
                <h1>Your Favourite Dishes:</h1>

                <div class="grid-container">
                    <?php for($i = 0; $i < mysqli_num_rows($dbData); $i++): 
                        $row = mysqli_fetch_assoc($dbData);?>
                        <div class="grid-item">
                        <p> <?php echo $row['name'] ?> <br> Price: <?php echo $row['price'] ?>€ <br> </p>
                            <?php echo '<a href="ItemDesc.php?dish=' . $row['DishID']. '">Item Description</a>'; ?>
                            <br>
                            <?php echo '<a href="Favourites.php?DishID=' . $row['DishID'] . '&CustomerID=' . $_SESSION['customerID'] .'&RemFav=1">Remove from Favourites</a>'; ?>
                            <br>
                            <?php echo '<img id="menuImage" src="'. $row['image'] .'" alt="'. $row['name'] .'">' ?>
                        </div>
                    <?php endfor; ?>
                </div>
        <?php } else{
            echo 'You have no favourite dishes yet!';   
        }
        } else{
            echo 'Please log in to use this feature!';
        } ?>

        <script src="" async defer></script>
    </body>
</html>