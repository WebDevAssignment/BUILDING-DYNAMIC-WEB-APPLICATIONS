<!DOCTYPE html>
<head>
<body>

<?php
#The following php code is heavily based on the code at: https://html.form.guide/email-form/php-form-to-email.html
/*Random Note: <?php
    include 'EmailForm.php';
    //Changing ContactPage.html to ContactPage.php: https://www.quora.com/How-do-you-include-a-PHP-file-into-an-HTML-file
    ?>*/


#if(isset($_POST['name'])){ $name = $_POST['name']; } from: https://www.jotform.com/answers/604469-Receiving-undefined-index-name-error-using-php

if(isset($_POST["name"]))
{
	$name = $_POST["name"];
}

if(isset($_POST["surname"]))
{
	$surname = $_POST["surname"];
}

if(isset($_POST["email"]))
{
	$email = $_POST["email"];
}

if(isset($_POST["contactNumber"]))
{
	$contactNumber = $_POST["contactNumber"];
}

if(isset($_POST["messageType"]))
{
	$messageType = $_POST["messageType"];
}

if(isset($_POST["message"]))
{
	$message = $_POST["message"];
}

if(isset($email))
{
	$sender = $email;
}

if(isset($messageType))
{
	$subject = messageType;
}


#mail(receiver, subject, senderMessage, headers)
$to = 'evieazzopardi@gmail.com';
//$headers = 'Return-Path: test@domain.tld' ."\r\n";
//$headers .= 'From: Sender <test@domain.tld>' . "\r\n";
$emailBody = 'This message is from $name $surname."\r\n" 
			From: $sender\n Contact Number: $contactNumber"\r\n""
			Subject: $messageType"\r\n""
			Here is the message:"\r\n" $message';

			mail('evieazzopardi@gmail', 'Testing...', 'Hi there, pls work!', 'From: evieazzopardi@gmail.com');
//mail($to,$emailBody,/*$headers,*/ "From: evieazzopardi@gmail.com");

?>

</body>
</head>