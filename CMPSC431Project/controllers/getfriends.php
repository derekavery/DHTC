<?php 
include('db_conn.php');

$userID = $_SESSION['user_id'];

$sql = "SELECT User.userID, User.uname FROM Friends INNER JOIN User ON Friends.userID2 = User.userID WHERE Friends.userID1 = $userID";
$result = mysqli_query($conn, $sql);
if (!empty($result)){
    $Friends = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

