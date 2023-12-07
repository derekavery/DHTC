<?php
include('db_conn.php');
session_start();

//Current User Card
$card1 = $_POST['card1'];
$card1_explode = explode(',', $card1);

// Card that will be deleted
$cardID1 = $card1_explode[0];
$card_lvl1 = $card1_explode[1];
$userID1 = $card1_explode[2];

//Friends Card
$card2 = $_POST['card2'];
$card2_explode = explode(',', $card2);

// Card that will be deleted
$cardID2 = $card2_explode[0];
$card_lvl2 = $card2_explode[1];
$userID2 = $card2_explode[2];



//Create trade record
$date = new DateTime("now", new DateTimeZone('America/New_York') );
$date = $date->format('Y-m-d H:i:s');
$sql = "INSERT INTO Trade(date, status) VALUES ('$date', 'Incomplete')";
$result = mysqli_query($conn, $sql);


$sql = "SELECT * FROM Trade ORDER BY tradeID DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$trade_record = mysqli_fetch_assoc($result);
$tradeID = $trade_record['tradeID'];

//Insert Trader1 
$sql = "INSERT INTO Trader1(tradeID, userID, cardID, card_lvl) VALUES ($tradeID, $userID1, $cardID1, $card_lvl1)";
$result = mysqli_query($conn, $sql);
echo $result;

//Insert Trader2
$sql = "INSERT INTO Trader2(tradeID, userID, cardID, card_lvl) VALUES ($tradeID, $userID2, $cardID2, $card_lvl2)";
mysqli_query($conn, $sql);





// Check if card2 not in user1 collection
$sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID1' AND Owns.cardID = '$cardID2' AND Owns.card_lvl = $card_lvl2";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);
if(empty($resultArray)){
    $sql = "INSERT INTO Owns(userID, cardID, card_lvl) VALUES ($userID1, $cardID2, $card_lvl2)";
    mysqli_query($conn, $sql);
}
else{ // card2 in user1 collection
    $sql = "UPDATE Owns SET Owns.quantity = Owns.quantity + 1 WHERE Owns.userID = '$userID1' AND Owns.cardID = '$cardID2' AND Owns.card_lvl = $card_lvl2";
    mysqli_query($conn, $sql);
}


// Adjust quantity of card in user2
$sql = "UPDATE Owns SET Owns.quantity = Owns.quantity - 1 WHERE Owns.userID = '$userID2' AND Owns.cardID = '$cardID2' AND Owns.card_lvl = $card_lvl2";
mysqli_query($conn, $sql);






// Check if card1 not in user2 collection
$sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID2' AND Owns.cardID = '$cardID1' AND Owns.card_lvl = $card_lvl1";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);
if(empty($resultArray)){
    $sql = "INSERT INTO Owns(userID, cardID, card_lvl) VALUES ($userID2, $cardID1, $card_lvl1)";
    mysqli_query($conn, $sql);
}
else{ // card1 in user2 collection
    $sql = "UPDATE Owns SET Owns.quantity = Owns.quantity + 1 WHERE Owns.userID = '$userID2' AND Owns.cardID = '$cardID1' AND Owns.card_lvl = $card_lvl1";
    mysqli_query($conn, $sql);
}

// Adjust quantity of card in user1
$sql = "UPDATE Owns SET Owns.quantity = Owns.quantity - 1 WHERE Owns.userID = '$userID1' AND Owns.cardID = '$cardID1' AND Owns.card_lvl = $card_lvl1";
mysqli_query($conn, $sql);






// Delete if quantity 0 in either user1 or user 2
$sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID1' AND Owns.cardID = '$cardID1' AND Owns.card_lvl = $card_lvl1";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);
if(!empty($resultArray)){
    if($resultArray['quantity'] == 0){
        $sql = "DELETE FROM Owns WHERE Owns.userID = '$userID1' AND Owns.cardID = '$cardID1' AND Owns.card_lvl = $card_lvl1";
        mysqli_query($conn, $sql);
    }
}

$sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID2' AND Owns.cardID = '$cardID2' AND Owns.card_lvl = $card_lvl2";
$result = mysqli_query($conn, $sql);
$resultArray = mysqli_fetch_assoc($result);
if(!empty($resultArray)){
    if($resultArray['quantity'] == 0){
        $sql = "DELETE FROM Owns WHERE Owns.userID = '$userID2' AND Owns.cardID = '$cardID2' AND Owns.card_lvl = $card_lvl2";
        mysqli_query($conn, $sql);
    }
}

$sql = "UPDATE Trade SET Trade.status = 'Completed' WHERE Trade.tradeID = '$tradeID'";
mysqli_query($conn, $sql);

?>

<script> 
    window.location = "../views/collection.php"; 
    alert('Traded');
</script> 