<?php
include('db_conn.php');

$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM User WHERE User.userID = '$userID'";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);

?>