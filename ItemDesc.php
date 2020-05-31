<?php
    require_once __DIR__.'/twigLaunch.php';
    include 'Header.php';
        
            $flag = 1; //Flag to mark whether to render the page or not
            $dishID = $_GET['dish']; //Gets dish ID from URL
            $dbRows = mysqli_query($mydb, "SELECT * FROM menu;"); //Getting data from menu table
            
            $sqlStmt = "SELECT * FROM menu WHERE DishID=?;";
            $stmt = mysqli_stmt_init($mydb);

            if(!mysqli_stmt_prepare($stmt, $sqlStmt)){
                echo "Unexpected Failure";
            } 
            else {
                //Fetching data of dish via prepared statements
                mysqli_stmt_bind_param($stmt, "i", $dishID);
                mysqli_stmt_execute($stmt);
                $dbData = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($dbData);
                
                if(mysqli_fetch_lengths($dbData) > 0){
                    $flag = 1;
                }
                else{
                    $flag=0;
                }
            }

        if($flag == 1){ //If the dish is valid, render the page

            $dish['name'] = $row['name'];
            $dish['dishDesc'] = $row['dishDesc'];
            $dish['price'] = $row['price'];
            $dish['image'] = $row['image'];

            $prev = "javascript:history.go(-1)";
            if(isset($_SERVER['HTTP_REFERER'])) {
                $prev = $_SERVER['HTTP_REFERER'];
            }

            echo $twig->render('ItemDesc.html',
                ['dish'=>$dish, 'flag'=>1, 'prev'=>$prev]
            );
        }
        else{
            echo $twig->render('ItemDesc.html',
                ['flag'=>0]
            );
        }
?>