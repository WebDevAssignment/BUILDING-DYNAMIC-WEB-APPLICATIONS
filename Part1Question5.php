<?php
//starting the session
session_start();
?>

<!DOCTYPE html>
<head>
<body>


<?php

//variables
$datetime = date("d.m.Y H:i"); 
$timezone = date_default_timezone_get();


//session variables
$_SESSION['$datetime'] = $datetime;
$_SESSION['$timezone'] = $timezone;

echo "Session ID: " .  session_id() . "<br>";
echo "Date and Time: " . $_SESSION['$datetime'] . "<br>";
echo "Timezone: " . $_SESSION['$timezone'] . "<br>";

//destroy the session
session_destroy();
?>

</body>
</head>