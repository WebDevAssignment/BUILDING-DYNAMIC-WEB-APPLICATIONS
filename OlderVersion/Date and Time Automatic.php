<!DOCTYPE html>
<html> 


<head>
<meta charset="UTF-8">
<title>PHP1</title> 
</head>

<body> 


<?php
    $dt = new DateTime(); 
    $timezone = date_default_timezone_get();

    echo "Server timezone is " . $timezone . " and the time is " . $dt->format();

?>

</body>


</html>
