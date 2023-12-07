<?php
include('db_conn.php');
session_start();

$result = $_POST['card'];
$result_explode = explode(',', $result);

// Card that will be deleted
$cardID = $result_explode[0];
$card_lvl = $result_explode[1];
$discard_value = $result_explode[2];

// Updates user account currency
$userID = $_SESSION['user_id'];
$sql = "UPDATE User SET User.currency = User.currency + ($card_lvl * $discard_value) WHERE User.userID = '$userID' ";
mysqli_query($conn, $sql);

// Deletes card from Owns
$sql = "UPDATE Owns SET Owns.quantity = Owns.quantity - 1 WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl";
mysqli_query($conn, $sql);

// Check if quantity of card is zero
$sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);
if(!empty($resultArray)){
    if($resultArray['quantity'] == 0){
        $sql = "DELETE FROM Owns WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl";
        mysqli_query($conn, $sql);
    }
}

$sql = "SELECT * FROM User WHERE User.userID = '$userID'";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);
$_SESSION['user_currency'] = $resultArray['currency'];
?>

<script> 
    window.location = "../views/firepit.php"; 
    alert('Card Burned');
</script> 