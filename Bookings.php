<?php
    include 'NavigationBar.php';
?>

<h1>Chief of Beef</h1>
    <h2>Book a table</h2>

    <?php if(isset($_SESSION['customerID'])){?>
        <?php  include('errors.php');
               include 'Email.php'; ?>
        <form method = "post" action = "Bookings.php">

            * Username: <input type="text" name = "username" > <br>
            * Num of people: <input type="integer" name = "people" > <br>
            * Date and time:  <input type = "datetime-local" name = "datetime"> <br>
            Additional notes: <input type = "text" name = "notes" > <br>
            <button type = "submit" name="BookTable">Submit</button>
        </form>
        * Required <br><br>
    <?php } 
    else {
        echo 'Please log in to use this feature!';
    } ?>

</body>
</html>