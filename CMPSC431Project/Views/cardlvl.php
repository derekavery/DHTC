<!DOCTYPE html>
<html>
    <title>Card Level Up</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/cardlvl.css">
        <link rel="stylesheet" href="../CSS/navigation.css">
        <?php session_start();
        include('../controllers/cardsforlvl.php'); ?>
    </head>

<body>
    <div class="topnav">
        <a class="nav-element-left" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left active" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right" href="accountmanagement.php"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>

    <div class="body-background">
        <!-- <div> <?php print_r($resultArray) ?> </div> -->

        <div class="card-div"> 
            <form action="../controllers/levelup.php" method="post">
                <div class="container">
                    <h1>Level up a card</h1><br>
                    <select name="card" id="card">
                        <option value="">--- Choose a card ---</option>
                            <?php foreach ($resultArray as $card) {?>
                                <option value='<?php echo $card['cardID']?>,<?php echo $card['card_lvl']?>,<?php echo $card['discard_value']?>'><?php echo $card['player_name'] . ', ' . 'Level: ' . $card['card_lvl'] . ', ' . 'Quantity: ' . $card['quantity']?></option>
                            <?php } ?>
                    </select>
                    <br>
                    <button type="submit">Level Up</button>
                </div>
            </form>
        </div>
        
    </div>

</body>
</html>
