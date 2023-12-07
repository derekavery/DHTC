<?php
include('db_conn.php');

if(isset($_POST['login']))
{
    session_start(); 
    $email = $_POST['email'];
    $password = $_POST['psw'];
    
    $sql = "SELECT * FROM USER WHERE User.email = '$email'";
    $result = mysqli_query($conn, $sql);
    $resultArray = mysqli_fetch_assoc($result);
    if(password_verify($password, $resultArray['password'])){ 
        
        $_SESSION['user_id']= $resultArray['userID'];
        $_SESSION['user_email']= $resultArray['email'];
        $_SESSION['user_name']= $resultArray['uname'];
        $_SESSION['user_currency']= $resultArray['currency'];?>
        <script> 
        window.location = "../views/dashboard.php"; 
        alert('Logged In!');
        </script> 
    <?php
    } else{
    ?>
            <script> 
            window.location = "../views/index.php"; 
            alert('Invalid Login');
            </script> 
    <?php

    }
}else if(isset($_POST['register']))
{
    $uname =  $_POST['uname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO User (uname, email, password) VALUES ('$uname', '$email', '$password')";
    if(mysqli_query($conn, $sql)){ ?>
        <script> 
        window.location = "../views/index.php"; 
        alert('Account Created, please login');
        </script> 
    <?php
    } else if(mysqli_error($conn) == 'Duplicate entry \'' . $email . '\' for key \'user.email\''){
    ?>
            <script> 
            window.location = "../views/register.php"; 
            alert('Account exists with that email, please try again');
            </script> 
    <?php
    }else{
    ?>
            <script> 
            window.location = "../views/register.php"; 
            alert('Something went wrong, please try again');
            </script> 
    <?php

    }
}
?>

