<?php
    //include_once 'dbh.inc.php';
    include('db_set.php');
    require_once __DIR__.'\twigLaunch.php';

        if(!isset($_SESSION['customerID'])){
            $loggedIn = false;
        }
        else{
           $loggedIn = true;
        }
    
    echo $twig->render('Header.html', 
        ['loggedIn' => $loggedIn, 'location' => $_SERVER['PHP_SELF']]
    );
?>