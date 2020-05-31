<?php
 session_start();  
?>

<!DOCTYPE html>
<html> 


<head>
<meta charset="UTF-8">
<title>PHP1</title> 
</head>

<body> 


<?php
    // Display the session id 
    //echo session_id(); 
      
    // Check the session name exists or not 
    if( isset($_SESSION['name']) ) { 
        echo '<br>' . 'session is set. <br>'; 
    }  
      
    //$_SESSION['name'] = 'trial'; 
    //$_SESSION['email'] = 'trial@email.com' ; 
    
    $timezone = 1394003958;
    echo "Today is " . date("d/m/Y") . "<br>";
    echo date("h:i:s") . "<br>";

    // TO MAKE THIS DYNAMIC AND UPDATE AUTOMATICALLY USE JAVASCRIPT 
    //https://stackoverflow.com/questions/10160810/how-to-make-php-date-and-time-update-automatically
    //https://www.tutorialrepublic.com/php-tutorial/php-date-and-time.php
    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    //https://stackoverflow.com/questions/3080921/how-to-format-date-from-timestamp-in-php
    //https://www.guru99.com/php-date-functions.html
    //https://www.youtube.com/watch?v=S6LoBKMfH-o
    //https://alexwebdevelop.com/php-sessions-explained/
    //https://www.thesitewizard.com/php/sessions.shtml
    //https://alexwebdevelop.com/php-sessions-explained/
    //https://www.geeksforgeeks.org/session_unset-vs-session_destroy-in-php/
    
    if (!array_key_exists('destroyed', $_SESSION))
    {
       $_SESSION['destroyed'] = 0;
    }
    else
    {
        timeofdest($_SESSION['destroyed']);
    }
    
    function timeofdest ($timedest){
    $secsago = time() - $_SESSION['destroyed'];
    echo date("h:i:s", $_SESSION['destroyed'] ) . " time of end session <br>";
    echo  date("s", $secsago ). "s ago <br> ";
    }

    /* Check whether we already set 'visits' for this remote client */
    //if (!array_key_exists('visits', $_SESSION))
    //{
    //   $_SESSION['visits'] = 0;
    //}

    //echo 'You visited this page ' . $_SESSION['visits']++ . ' times.';
    
    
    //session_destroy();
    $_SESSION['destroyed'] = time();



// $link = mysqli_connect("localhost", "root", "");

    // // Check connection
    // if($link === false){
    //     die("ERROR: Could not connect. " . mysqli_connect_error());
    // }

    // // Attempt create database query execution
    // $sql = "CREATE DATABASE demo";
    // if(mysqli_query($link, $sql)){
    //     echo "Database created successfully";
    // } else{
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    // }

    // // Close connection
    // mysqli_close($link);
?>

</body>
</html>