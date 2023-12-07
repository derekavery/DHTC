<?php 
include('db_conn.php');
session_start(); 

$userID = $_SESSION['user_id'];


$sql = "DELETE FROM User WHERE User.userID = '$userID'";

mysqli_query($conn, $sql);

unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);
unset($_SESSION['user_currency']);
?>

<script> 
    window.location = "../views/index.php"; 
    alert('Account Deleted');
</script> 
            

