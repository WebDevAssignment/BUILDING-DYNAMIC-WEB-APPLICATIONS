<?php
    include 'NavigationBar.php';
    include 'errors.php';
    require_once __DIR__.'/twigLaunch.php';

        

    $favourites = array();
        
    if(isset($_SESSION['customerID'])){
        $sql = "SELECT *, favourites.CustomerID FROM menu INNER JOIN favourites ON menu.DishID = favourites.DishID WHERE CustomerID=?";
        $stmt = mysqli_stmt_init($mydb);
                
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Unexpected Failure";
        } 
        else {
            //Fetching data of dish via prepared statements
            mysqli_stmt_bind_param($stmt, "i", $_SESSION['customerID']);
            mysqli_stmt_execute($stmt);
            $dbData = mysqli_stmt_get_result($stmt);     
        }

        $favLength = mysqli_num_rows($dbData);
        if(mysqli_num_rows($dbData)>0){

            $favs="<html><body>";
            $favs.= "<p>". $_SESSION['name'] . " " . $_SESSION['surname'] . "'s favourites:<br>";
                for($i = 0; $i < mysqli_num_rows($dbData); $i++):
                    $row = mysqli_fetch_assoc($dbData); 
                    $favs .= "<br>".$row['name'].", €".$row['price'];
                    $favourites[$i]['name'] = $row['name'];
                    $favourites[$i]['price'] = $row['price'];
                    $favourites[$i]['DishID'] = $row['DishID'];
                    $favourites[$i]['image'] = $row['image'];
                endfor;
                
            if(!isset($_GET['emFav'])){
                echo $twig->render('Favourites.html',
                    ['favs'=>$favourites, 'favLength'=>$favLength, 'customerID'=>$_SESSION['customerID']]
                );
            }
            elseif(isset($_GET['emFav']) & $_GET['emFav']== 1){
                    
                    
                $name = $_SESSION['name'];
                $surname = $_SESSION['surname'];
                $email = $_POST['email'];
                $subject = "Chief of Beef Favourites ";
                $favs .= "</p></body></html>";
                    
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    array_push($errors, "Please enter your valid email.");
                        
                }else{
                    $Subject = 'Subject: '.$subject;
                        
                    // Additional headers
                    $headers = "From: ". $_SESSION['email'] . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=utf-8";
                                        
                    if(mail($email,$subject,$favs,$headers)){
                    $statusMsg = 'Your contact request has been submitted successfully !';
                        $msgClass = 'succdiv';
                            
                    }else{
                        array_push($errors, "Your contact request submission failed, please try again.");
                            
                    }
                }
                unset($_GET['emFav']);
                unset($_POST['email']);
                header('location: Favourites.php');

            }
            elseif(isset($_GET['emFav']) & $_GET['emFav']== 0){
                echo $twig->render('Favourites.html',
                    ['favs'=>$favourites, 'favLength'=>$favLength, 'customerID'=>$_SESSION['customerID'], 'emFav'=>0]
                );
            }
                
        }
    }else{
        echo $twig->render('Favourites.html');
    }
?>