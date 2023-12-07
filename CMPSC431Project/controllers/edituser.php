<?php 
include('db_conn.php');
session_start(); 

$email = $_POST['email'];
$name = $_POST['uname'];
$unhashedpassword = $_POST['psw'];
$userID = $_SESSION['user_id'];


if (!empty($unhashedpassword)){
    $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    $sql = "UPDATE User SET email = '$email', uname = '$name', password = '$password' WHERE User.userID = '$userID'";

}else{
    $sql = "UPDATE User SET email = '$email', uname = '$name' WHERE User.userID = '$userID'";
}

mysqli_query($conn, $sql);

$_SESSION['user_email']= $email;
$_SESSION['user_name']= $name;
?>

<script> 
    window.location = "../views/accountmanagement.php"; 
    alert('Account Info Updated');
</script> 
            

