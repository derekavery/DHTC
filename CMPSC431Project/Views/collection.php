<!DOCTYPE html>
<html>
    <title>Collection</title>
    
    <head>
    <link rel="stylesheet" href="../CSS/collection.css">
        <?php session_start(); 
        include('../controllers/cardcollection.php');
        ?>
    </head>

<body>
    <div class="topnav">
        <a class="nav-element-left" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left active" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right" href="accountmanagement.php"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>

    <div class="grid-container">
        <?php foreach ($resultArray as $card) {?>
            <?php if ($card['card_type'] == 'Platinum') {?>
                <div class="grid-item-plat">
                    <div class="card-type"> <?php echo $card['card_type']?> </div>
                    <div class="card-quantity">Quantity <?php echo $card['quantity']?> </div>
                    <div class="card-lvl"> Level <?php echo $card['card_lvl']?> </div>
                    <div class="player-name"> <?php echo $card['player_name']?> </div>
                    <div class="player-num"> Number: <?php echo $card['num']?> </div>
                    <div class="player-team"> Team: <?php echo $card['team_name']?> </div>
                    <div class="player-info"> Goals: <?php echo $card['goals']?> </div>
                    <div class="player-info"> Assists: <?php echo $card['assists']?> </div>
                    <div class="player-info"> Games Player: <?php echo $card['games_played']?> </div>
                    <div class="player-info"> Plus/Minus: <?php echo $card['plus_minus']?> </div>
                </div>
            <?php } ?>

            <?php if ($card['card_type'] == 'Gold') {?>
                <div class="grid-item-gold">
                    <div class="card-type"> <?php echo $card['card_type']?> </div>
                    <div class="card-quantity">Quantity <?php echo $card['quantity']?> </div>
                    <div class="card-lvl"> Level <?php echo $card['card_lvl']?> </div>
                    <div class="player-name"> <?php echo $card['player_name']?> </div>
                    <div class="player-num"> Number: <?php echo $card['num']?> </div>
                    <div class="player-team"> Team: <?php echo $card['team_name']?> </div>
                    <div class="player-info"> Goals: <?php echo $card['goals']?> </div>
                    <div class="player-info"> Assists: <?php echo $card['assists']?> </div>
                    <div class="player-info"> Games Player: <?php echo $card['games_played']?> </div>
                    <div class="player-info"> Plus/Minus: <?php echo $card['plus_minus']?> </div>
                </div>
            <?php } ?>

            <?php if ($card['card_type'] == 'Silver') {?>
                <div class="grid-item-silver">
                    <div class="card-type"> <?php echo $card['card_type']?> </div>
                    <div class="card-quantity">Quantity <?php echo $card['quantity']?> </div>
                    <div class="card-lvl"> Level <?php echo $card['card_lvl']?> </div>
                    <div class="player-name"> <?php echo $card['player_name']?> </div>
                    <div class="player-num"> Number: <?php echo $card['num']?> </div>
                    <div class="player-team"> Team: <?php echo $card['team_name']?> </div>
                    <div class="player-info"> Goals: <?php echo $card['goals']?> </div>
                    <div class="player-info"> Assists: <?php echo $card['assists']?> </div>
                    <div class="player-info"> Games Player: <?php echo $card['games_played']?> </div>
                    <div class="player-info"> Plus/Minus: <?php echo $card['plus_minus']?> </div>
                </div>
            <?php } ?>

            <?php if ($card['card_type'] == 'Bronze') {?>
                <div class="grid-item-bronze">
                    <div class="card-type"> <?php echo $card['card_type']?> </div>
                    <div class="card-quantity">Quantity <?php echo $card['quantity']?> </div>
                    <div class="card-lvl"> Level <?php echo $card['card_lvl']?> </div>
                    <div class="player-name"> <?php echo $card['player_name']?> </div>
                    <div class="player-num"> Number: <?php echo $card['num']?> </div>
                    <div class="player-team"> Team: <?php echo $card['team_name']?> </div>
                    <div class="player-info"> Goals: <?php echo $card['goals']?> </div>
                    <div class="player-info"> Assists: <?php echo $card['assists']?> </div>
                    <div class="player-info"> Games Player: <?php echo $card['games_played']?> </div>
                    <div class="player-info"> Plus/Minus: <?php echo $card['plus_minus']?> </div>
                </div>
            <?php } ?>

            <?php if ($card['card_type'] == 'Tin') {?>
                <div class="grid-item-tin">
                    <div class="card-type"> <?php echo $card['card_type']?> </div>
                    <div class="card-quantity"> Quantity <?php echo $card['quantity']?> </div>
                    <div class="card-lvl"> Level <?php echo $card['card_lvl']?> </div>
                    <div class="player-name"> <?php echo $card['player_name']?> </div>
                    <div class="player-num"> Number: <?php echo $card['num']?> </div>
                    <div class="player-team"> Team: <?php echo $card['team_name']?> </div>
                    <div class="player-info"> Goals: <?php echo $card['goals']?> </div>
                    <div class="player-info"> Assists: <?php echo $card['assists']?> </div>
                    <div class="player-info"> Games Player: <?php echo $card['games_played']?> </div>
                    <div class="player-info"> Plus/Minus: <?php echo $card['plus_minus']?> </div>
                </div>
            <?php } ?>
            
        <?php } ?>
    </div>
</body>
</html>
