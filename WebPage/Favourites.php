<?php
    include 'Header.php';
?>
        
        <h1>Your Favourite Dishes:</h1>

        <div class="grid-container">
            <?php for($i = 0; $i < 3; $i++): ?>
                <div class="grid-item">
                    <p>This is a Menu Item<br>Price: Euros<br></p>
                    <a href="ItemDesc.php">Item Description</a>
                </div>
            <?php endfor; ?>
        </div>

        <script src="" async defer></script>
    </body>
</html>