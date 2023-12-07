<?php
include('db_conn.php');
mysqli_begin_transaction($conn);

try{
    // global $sql;

    // Selecting card for pack output
    $sql = "SELECT * FROM Card WHERE Card.packID = 1 AND Card.card_lvl = 1";
    $result = mysqli_query($conn, $sql);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cardNumPulled = random_int(0,9);

    $card = $resultArray[$cardNumPulled];

    // Selecting user to check currency
    $userID = $_SESSION['user_id'];
    $sql = "SELECT * FROM User WHERE User.userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    $resultArray = mysqli_fetch_assoc($result);

    $currency = $resultArray['currency'];

    //Update User Currency
    $sql = "UPDATE User SET currency = ($currency - 1000)  WHERE User.userID = '$userID'";
    mysqli_query($conn, $sql);

    // User doesn't have enough currency to buy pack
    if($currency < 1000){
        throw new Exception("Insufficient Funds");
    }

    $cardID = $card['cardID'];
    $card_lvl = $card['card_lvl'];
    // Check if user has card
    $sql = "SELECT * FROM Owns WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl";
    $result = mysqli_query($conn, $sql);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (empty($resultArray)){
        // Inserting card into user collection
        $sql = "INSERT INTO Owns(userID, cardID, card_lvl) VALUES ($userID, $cardID, 1)";
        mysqli_query($conn, $sql);
        mysqli_commit($conn);
    }
    else{
        // Updating card quantity
        $sql = "UPDATE Owns SET Owns.quantity = Owns.quantity + 1 WHERE Owns.userID = '$userID' AND Owns.cardID = '$cardID' AND Owns.card_lvl = $card_lvl";
        mysqli_query($conn, $sql);
        mysqli_commit($conn);
    }
    
    $sql = "SELECT * FROM User WHERE User.userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    $resultArray = mysqli_fetch_assoc($result);
    $_SESSION['user_currency'] = $resultArray['currency'];

} catch (exception $exception){
    mysqli_rollback($conn);
    ?>
    <script> 
        window.location = "../views/pack.php"; 
        alert('Insufficient Funds!');
    </script> 
    <?php
}
?>