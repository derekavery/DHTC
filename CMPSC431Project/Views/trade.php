<?php 
include('../controllers/db_conn.php');
session_start();

$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM Owns INNER JOIN Card ON Card.cardID = Owns.cardID AND Card.card_lvl = Owns.card_lvl WHERE Owns.userID = '$userID'";
$result = mysqli_query($conn, $sql);
$CurrentUserCards = mysqli_fetch_all($result, MYSQLI_ASSOC);


$userID2 = $_POST['userid'];
$sql = "SELECT * FROM Owns INNER JOIN Card ON Card.cardID = Owns.cardID AND Card.card_lvl = Owns.card_lvl WHERE Owns.userID = '$userID2'";
$result = mysqli_query($conn, $sql);
$FriendsCards = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT User.userID, User.uname FROM User WHERE User.userID = '$userID2'";
$result = mysqli_query($conn, $sql);
$Friend = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <title>Trade</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/trade.css">
        <link rel="stylesheet" href="../CSS/navigation.css">
    </head>

<body>

    <div class="topnav">
        <a class="nav-element-left" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left active" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right" href="accountmanagement.php"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>
    
    <form action="../controllers/createtrade.php" method="post">
        <div class="your-card-div"> 
            <div class="container">
                <h1>Your Cards</h1><br>
                <select name="card1" id="card1">
                    <option value="">--- Choose a card ---</option>
                        <?php foreach ($CurrentUserCards as $card) {?>
                            <option value='<?php echo $card['cardID']?>,<?php echo $card['card_lvl']?>,<?php echo $userID?>' ><?php echo $card['player_name'] . ', ' . 'Level: ' . $card['card_lvl'] . ', ' . 'Quantity: ' . $card['quantity']?></option>
                        <?php } ?>
                </select>
                <br>
            </div>
        </div>

        <div class="friend-card-div"> 
            <div class="container">
                <h1><?php echo $Friend[0]['uname'] ?> Cards</h1><br>
                <select name="card2" id="card2">
                    <option value="">--- Choose a card ---</option>
                        <?php foreach ($FriendsCards as $card) {?>
                            <option value='<?php echo $card['cardID']?>,<?php echo $card['card_lvl']?>,<?php echo $userID2?>'> <?php echo $card['player_name'] . ', ' . 'Level: ' . $card['card_lvl'] . ', ' . 'Quantity: ' . $card['quantity']?></option>
                        <?php } ?>
                </select>
                <br>
            </div>
        </div>
    

        <div class="submit-card-div"> 
            <button type="submit">Trade</button>
        </div> 
    </form>

</body>
</html>
