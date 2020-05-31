<?php
    //include_once 'dbh.inc.php';
    include('db_set.php');
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Chief of Beef</title>
        <link rel="stylesheet" href="Styles.css">
    </head>
    <body>
    
    <div id="NavBar">
        <ul>
            <li><a href="HomePage.php">HOME</a></li>
            <li><a href="AboutPage.php">ABOUT US</a></li>
            <li><a href="Menu.php">MENU</a></li>
            <li><a href="Favourites.php">FAVOURITES</a></li>
            <li><a href="ContactPage.php">CONTACT US</a></li>
            <li><a href="Bookings.php">BOOK A TABLE</a></li>
            <?php if(!isset($_SESSION['customerID'])){ ?>
                <li id="logButton"><a href="LoginPHP.php">LOG IN</a></li>
            <?php }
            else{ ?>
                <li><a href="ManageAccount.php">MANAGE ACCOUNT</a></li>
                <li><a href="HomePage.php?logout=1">LOG OUT</a></li>
            <?php } ?>
        </ul>
    </div>