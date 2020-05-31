<?php
    include 'Header.php';
?>
        
        <h1>Our Menu</h1>

        <?php
            $catData = mysqli_query($mydb, "SELECT DISTINCT category FROM menu ORDER BY categoryID ASC;");
        
            if(mysqli_num_rows($catData) > 0){
                $sql = "SELECT * FROM menu WHERE category=?;";
                $stmt = mysqli_stmt_init($mydb);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Unexpected Failure";
                } 
                else {
                    for($i = 0; $i < mysqli_num_rows($catData); $i++):
                        $row = mysqli_fetch_assoc($catData);
                        //Fetching data of dish via prepared statements
                        mysqli_stmt_bind_param($stmt, "s", $row['category']);
                        mysqli_stmt_execute($stmt);
                        $dbData = mysqli_stmt_get_result($stmt);
                        
                        echo '<h2>'.$row['category'].'</h2>';

                        if(mysqli_num_rows($dbData) > 0){?>
                            <div class="grid-container">
                            <?php for($k = 0; $k < mysqli_num_rows($dbData); $k++): 
                                $menuRow = mysqli_fetch_assoc($dbData); ?>
                                <div class="grid-item">
                                    <div>
                                        <?php if(isset($_SESSION['customerID'])){
                                            echo '<br>
                                                <a href="Menu.php?DishID=' . $menuRow['DishID'] . '&CustomerID=' . $_SESSION['customerID'] .'&AddFav=1">
                                                    <img id="icon" src="Heart.png" alt="Add to Favourites">
                                                </a>'; 
                                        }?>
                                    </div>
                                    <p> <?php echo '<br>' . $menuRow['name'] ?> <br> Price: <?php echo $menuRow['price'] ?>€ <br> </p>
                                    <?php echo '<a href="ItemDesc.php?dish=' . $menuRow['DishID']. '">Item Description</a>'; ?>
                                    <?php echo '<br><img id="menuImage" src="'. $menuRow['image'] .'" alt="'. $menuRow['name'] .'">' ?>
                                </div>     
                                <?php endfor; ?>
                            </div>
                        <?php }
                    endfor;
                }
        } ?>

        <script src="" async defer></script>
    </body>
</html>