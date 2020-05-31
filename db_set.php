<?php

include_once 'dbh.inc.php';

if(!isset($_SESSION['set'])){
session_start();
$_SESSION['set']=1;}
$errors = array();

if ($mydb->connect_error) {
    die("Connection failed: " . $mydb->connect_error);
}

if (isset($_POST['register']))
{
    $name = $mydb -> real_escape_string($_POST['name']);
    $surname = $mydb -> real_escape_string($_POST['surname']);
    $username = $mydb -> real_escape_string($_POST['username']);
    $password1 = $mydb -> real_escape_string($_POST['password1']);
    $password2 = $mydb -> real_escape_string($_POST['password2']);
    $email = $mydb -> real_escape_string($_POST['email']);
    $phone = $mydb -> real_escape_string($_POST['phone']);
    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;


    $query = "SELECT * FROM customers WHERE email = '$email'";
    $res = mysqli_query($mydb, $query);
        

    if(mysqli_num_rows($res)>0)
    {
        array_push($errors, "An account with this email already exists");
    }
    if(empty($name))
    {
        array_push($errors, "Name required");
    }
    if(empty($surname))
    {
        array_push($errors, "Surname required");
    }
    if(empty($username))
    {
        array_push($errors, "Username required");
    }
    if(empty($password1) || empty($password2))
    {
        array_push($errors, "Password required");
    }
    if(empty($email))
    {
        array_push($errors, "Email required");
    }
    if($password1 != $password2)
    {
        array_push($errors, "2 passwords do not match");
    }
    if(count($errors) == 0)
    {
        $password =  md5($password1);
        $sql = "INSERT INTO Customers (`Name`, `Surname`, `Username`, `Password`, `Phone`, `Email`) 
                VALUES ('$name', '$surname', '$username', '$password', '$phone', '$email')";
        mysqli_query($mydb, $sql);    
        $query = "SELECT * FROM customers WHERE username = '$username' AND password = '$password' ";
        $res = mysqli_query($mydb, $query);
        

        if(mysqli_num_rows($res)==1)
        {
            while($row = mysqli_fetch_assoc($res)) {
                $_SESSION['customerID'] = $row["CustomerID"];
                $_SESSION['name'] = $row["Name"];
                $_SESSION['surname'] = $row["Surname"];
                $_SESSION['username'] = $row["Username"];
                $_SESSION['email'] = $row["Email"];
                $_SESSION['phone'] = $row["Phone"];
            }
        }
        $_SESSION['login'] = "Welcome"." ".$name; 
        header('location: ManageAccount.php'); //taking into system
    }
}

if (isset($_POST['Update']))
{
    $name = $mydb -> real_escape_string($_POST['name']);
    $surname = $mydb -> real_escape_string($_POST['surname']);
    $username = $mydb -> real_escape_string($_POST['username']);
    $email = $mydb -> real_escape_string($_POST['email']);
    $phone = $mydb -> real_escape_string($_POST['phone']);
    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    if(empty($name))
    {
        array_push($errors, "Name required");
    }
    if(empty($surname))
    {
        array_push($errors, "Surname required");
    }
    if(empty($username))
    {
        array_push($errors, "Username required");
    }
    if(empty($email))
    {
        array_push($errors, "Email required");
    }
    if(empty($phone))
    {
        $phone = 0;
    }
    if(count($errors) == 0)
    {
            $customerID = $_SESSION['customerID'];


        $sql = "UPDATE customers SET Name='$name', Surname='$surname', Username='$username', Email = '$email', Phone=$phone WHERE CustomerID = $customerID ;";

        if (mysqli_query($mydb, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($mydb);
        }
        $_SESSION['login'] = "Welcome"." ".$name; 
        header('location: ManageAccount.php'); //taking into system
    }
}

if(isset($_POST['login']))
{
    $userLog = $mydb -> real_escape_string($_POST['userLog']);
    $passLog = $mydb -> real_escape_string($_POST['passLog']);

    if(empty($userLog))
    {
        array_push($errors, "Username is required");
    }
    if(empty($passLog))
    {
        array_push($errors, "Password is required");
    }

    if(count($errors)==0)
    {
        $passLog = md5($passLog);
        $query1 = "SELECT * FROM customers WHERE Username = '$userLog' AND Password = '$passLog'; ";
        $res = mysqli_query($mydb, $query1);
        
        if(mysqli_num_rows($res)>0)
        {
            while($row = mysqli_fetch_assoc($res)) {
                $_SESSION['customerID'] = $row["CustomerID"];
                $_SESSION['name'] = $row["Name"];
                $_SESSION['surname'] = $row["Surname"];
                $_SESSION['username'] = $row["Username"];
                $_SESSION['email'] = $row["Email"];
                $_SESSION['phone'] = $row["Phone"];
            }
            $_SESSION['login'] = "Welcome"." ".$_SESSION['name'];
            header('location: ManageAccount.php'); //taking into system
        }
        else
        {
            array_push($errors, "Wrong username/password");
        }

    }

}

if(isset($_GET['logout']))
{
    setcookie(session_name(),"",time()-3600);
    session_unset();
    session_destroy();
    header('location: '.$_GET['loc']);
    unset($_GET['loc']);
}

if(isset($_GET['AddFav']))
{
    $customerID=$_GET['CustomerID'];
    $dishID=$_GET['DishID'];

    $query="SELECT * FROM favourites WHERE CustomerID='$customerID' AND DishID ='$dishID'";
    $res = mysqli_query($mydb, $query);

    if(mysqli_num_rows($res)==0 & $customerID>0){
        $sql = "INSERT INTO favourites (CustomerID, DishID) VALUES ('$customerID', '$dishID')";
        mysqli_query($mydb, $sql);
    }

    unset($_GET['DishID']);
    unset($_GET['CustomerID']);
    unset($_GET['AddFav']);
    header('location: Menu.php');
}

if(isset($_POST['AddFav']))
{
    $customerID=$_POST['CustomerID'];
    $dishID=$_POST['DishID'];

    $query="SELECT * FROM favourites WHERE CustomerID='$customerID' AND DishID ='$dishID'";
    $res = mysqli_query($mydb, $query);

    if(mysqli_num_rows($res)==0 & $customerID>0){
        $sql = "INSERT INTO favourites (CustomerID, DishID) VALUES ('$customerID', '$dishID')";
        mysqli_query($mydb, $sql);
    }

    unset($_POST['DishID']);
    unset($_POST['CustomerID']);
    unset($_POST['AddFav']);
    header('location: Menu.php');
}

if(isset($_GET['RemFav']))
{
    $customerID=$_GET['CustomerID'];
    $dishID=$_GET['DishID'];

    $query="SELECT * FROM favourites WHERE CustomerID='$customerID' AND DishID ='$dishID'";
    $res = mysqli_query($mydb, $query);

    if(mysqli_num_rows($res)!=0 & $customerID>0){
        $sql = "DELETE FROM favourites WHERE CustomerID='$customerID' AND DishID='$dishID';";
        mysqli_query($mydb, $sql);
    }

    unset($_GET['DishID']);
    unset($_GET['CustomerID']);
    unset($_GET['AddFav']);
    header('location: Favourites.php');
}
?>