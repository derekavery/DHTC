<?php 
include('db_conn.php');

$userID = $_SESSION['user_id'];

$sql = "SELECT User.* FROM User WHERE User.userID != '$userID' 
AND User.userID NOT IN (SELECT User.userID FROM Friends 
INNER JOIN User ON Friends.userID2 = User.userID
WHERE Friends.userID1 = '$userID')";
$result = mysqli_query($conn, $sql);
if(!empty($result)){
    $Users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}