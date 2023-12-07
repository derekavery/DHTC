<?php 
include('db_conn.php');
session_start();

$userID1 = $_SESSION['user_id'];
$userID2 = $_POST['userid'];

$sql = "INSERT INTO Friends(userID1, userID2) VALUES ($userID1, $userID2)";
mysqli_query($conn, $sql);


?>
<script> 
    window.location = "../views/friends.php"; 
    alert('Friended');
</script> 

