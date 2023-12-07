<?php
include('db_conn.php');

$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM Owns INNER JOIN Card ON Card.cardID = Owns.cardID AND Card.card_lvl = Owns.card_lvl WHERE Owns.userID = '$userID' AND Owns.quantity >= 5 AND Owns.card_lvl < 3";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>