<?php
    include 'Header.php';
?>
        
        <?php
            $dbData = mysqli_query($conn, "SELECT * FROM menu;");
        ?>

        <h1>Our Menu</h1>

        <?php if(mysqli_num_rows($dbData) > 0){?>
            <div class="grid-container">
                <?php for($i = 0; $i < mysqli_num_rows($dbData); $i++): 
                    $row = mysqli_fetch_assoc($dbData);
                    $dishID = $row['id'];
                    $url = "ItemDesc.php?dish=.$dishID";
                    ?>
                    <div class="grid-item">
                        <p> <?php echo $row['name'] ?> <br> Price: <?php echo $row['price'] ?>€ <br> </p>
                        <?php echo '<img id="menuImage" src="'. $row['image'] .'" alt="'. $row['name'] .'">' ?>
                        <?php echo '<a href="ItemDesc.php?dish=' . $row['id']. '">Item Description</a>'; ?>
                    </div>
                <?php endfor; ?>
            </div>
        <?php } ?>

        <script src="" async defer></script>
    </body>
</html>