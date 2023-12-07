<?php
include('db_conn.php');
session_start();

$result = $_POST['card'];
$result_explode = explode(',', $result);

// Card that will be deleted
$cardID = $result_explode[0];
$card_lvl = $result_explode[1];
$userID = $_SESSION['user_id'];

// Adjust card quantity in Owns
$sql = "UPDATE Owns SET Owns.quantity = Owns.quantity - 5 WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl";
mysqli_query($conn, $sql);

// Insert leveled up card into table
$sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl + 1";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (empty($resultArray)){
    // Inserting card into user collection
    $sql = "INSERT INTO Owns(userID, cardID, card_lvl) VALUES ($userID, $cardID, $card_lvl + 1)";
    mysqli_query($conn, $sql);
    mysqli_commit($conn);
}
else{
    // Updating card quantity
    $sql = "UPDATE Owns SET Owns.quantity = Owns.quantity + 1 WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl + 1";
    mysqli_query($conn, $sql);
    mysqli_commit($conn);
}

// Check if quantity of card is zero and delete
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
    window.location = "../views/collection.php"; 
    alert('Card Leveled Up');
</script> 
            