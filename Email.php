<?php
    include 'errors.php';

    if(isset($_POST['BookTable']) || isset($_POST['Contact'])){
        
        //CONTACT VARIABLES
        if(isset($_POST['name']))
        {
	        $name = $_POST['name'];
        }
        if(isset($_POST['surname']))
        {
	        $surname = $_POST['surname'];
        }
        if(isset($_POST['email']))
        {
        	$email = $_POST['email'];
        }

        if(isset($_POST['contactNumber']))
        {
            $contactNumber = $_POST['contactNumber'];
        }

        if(isset($_POST['messageType']))
        {
            $messageType = $_POST['messageType'];
        }

        if(isset($_POST['message']))
        {
            $message = $_POST['message'];
        }

        


        //TABLE BOOKING VARIABLES
        if(isset($_POST['username']))
        {
	        $username = $_POST['username'];
        }
        if(isset($_POST['people']))
        {
	        $people = $_POST['people'];
        }
        
        if(isset($_POST['datetime']))
        {
	        $datetime = $_POST['datetime'];
        }
        if(isset($_POST['notes']))
        {
	        $notes = $_POST['notes'];
        }
    


        //EMAIL SETUP 
        if(!isset($email))
        {
            $email = $_SESSION['email'];
        }



        if(isset($messageType))
        {
            $subject = $messageType;
            $message = "Email from: ". $name. " ". $surname . "\n\n Contact Number: " . $contactNumber. "\n\n Message: ". $message; 
            
        }
        else if (isset($_POST['BookTable']))
        {
            $subject = "Book a table";
            $message = "Booking for Customer: ". $username . "\n\n Num of People: ". $people . "\n Date and Time: ". $datetime . "\n Notes: ". $notes;
            
        }
        else
        {
            $subject = "Undefined";
            $message = "Undefined";
             
        }

    

        if(!empty($email) && !empty($subject) && !empty($message)){

           

            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                array_push($errors, "Please enter your valid email.");
                
            }else{
                $mailTo = 'grixti.luke@gmail.com' ;
                $Subject = 'Subject: '.$subject;
                $txt = "You have received an e-mail \n\n".$message;
                
                // Additional headers
                $headers = 'From: '.$email;
                                
                if(mail($mailTo,$Subject,$txt,$headers)){
                   $statusMsg = 'Your contact request has been submitted successfully !';
                    $msgClass = 'succdiv';
                    echo "Your contact request has been submitted successfully !";
                    
                    
                }else{
                    array_push($errors, "Your contact request submission failed, please try again.");
                    
                }
            }

            }
        else{
                $statusMsg = 'Please fill all the fields.';
                $msgClass = 'errordiv';
            }
    }
    ?>