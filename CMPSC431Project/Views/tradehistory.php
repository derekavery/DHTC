<?php 
include('../controllers/db_conn.php');
session_start();

$userID = $_SESSION['user_id'];
$sortby = $_POST['sort'];

//Card that current user traded in trade
$sql1 = "SELECT * FROM Trade 
INNER JOIN Trader1 ON Trader1.tradeID = Trade.tradeID
INNER JOIN Trader2 ON Trader2.tradeID = Trade.tradeID
INNER JOIN User ON Trader1.userID = User.userID
INNER JOIN Card ON Trader1.cardID = Card.cardID AND Trader1.card_lvl = Card.card_lvl
WHERE Trader1.userID = '$userID' OR Trader2.userID = '$userID'
ORDER BY $sortby";

$result = mysqli_query($conn, $sql1);
if(!empty($result)){
    $tradehistoryTrader1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//Card that was traded to current user
$sql2 = "SELECT * FROM Trade 
INNER JOIN Trader1 ON Trader1.tradeID = Trade.tradeID
INNER JOIN Trader2 ON Trader2.tradeID = Trade.tradeID
INNER JOIN User ON Trader2.userID = User.userID
INNER JOIN Card ON Trader2.cardID = Card.cardID AND Trader2.card_lvl = Card.card_lvl
WHERE Trader1.userID != '$userID' OR Trader2.userID != '$userID'
ORDER BY $sortby";

$result = mysqli_query($conn, $sql2);
if(!empty($result)){
    $tradehistoryTrader2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
    <title>Trade</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/trade-history.css">
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
    <h1> Trade History </h1>
    <div class="card-div">
        <table> 
            <tr>
                <th>Trader 1 Name</th>
                <th>Trader 1 Card</th>
                <th>   </th>
                <th>Trader 2 Name</th>
                <th>Trader 2 Card</th>
                <th>   </th>
                <th>Date</th>
            </tr>   
            
            <?php foreach ($tradehistoryTrader1 as $t1) {
                    foreach ($tradehistoryTrader2 as $t2) {
                        if ($t1['tradeID'] == $t2['tradeID']) {?>
                        <tr>
                            <td><?php echo $t1['uname'] ?></td>
                            <td><?php echo $t1['player_name'] ?></td>
                            <td>Traded</td>
                            <td><?php echo $t2['uname'] ?></td>
                            <td><?php echo $t2['player_name'] ?></td>
                            <td>On</td>
                            <td><?php echo $t1['date'] ?></td>
                        </tr>
                <?php
                        }
                    }
                }?>

        </table>
    </div>
</body>
</html>
