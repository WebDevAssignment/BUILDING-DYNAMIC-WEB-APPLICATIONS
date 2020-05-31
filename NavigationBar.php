<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
        <title>Chief of Beef</title>
        <link rel="stylesheet" href="NavigationStyling.css">
</head>
<body>
<header>
  <a href="HomePage.php">
  <img src="BasicLogoYellow.png">
            
    <div id="NavigationBar">
        <ul>
            <li><a href="AboutPage.php">About Us</a></li>
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="Favourites.php">Favourites</a></li>
            <li><a href="ContactPage.php">Contact Us</a></li>
            <li><a href="Bookings.php">Book A Table</a></li>

            
                    <?php if(!isset($_SESSION['customerID']))
                    {
                    ?>
                    <li id="logButton"><a href="LoginPHP.php">Log In </a></li>
                    <?php
                    }
                    else
                    {
                     ?>
                    <li><a href="ManageAccount.php">Manage Account</a></li>
                    <li><a href="HomePage.php?logout=1">Log Out</a></li>
                    <?php
                    }
                    ?>

        </ul>
    </div>
</header>
</body>
</html>