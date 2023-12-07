<!DOCTYPE html>
<html>
    <title>Dashboard</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/navigation.css">
        <link rel="stylesheet" href="../CSS/openedcard.css">
        <?php session_start(); 
        include('../controllers/packopentin.php');
        ?>

    </head>

<body>
    <div class="topnav">
        <a class="nav-element-left" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left active" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right" href="accountmanagement.phps"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>

    <div class="div-p"> 
        <div class="card-div-tin"> 
            <div class="player-name"> <?php echo $card['player_name']?> </div>
            <div class="player-num"> Number: <?php echo $card['num']?> </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="player-num"> Goals: <?php echo $card['goals']?> </div>
            <div class="player-num"> Assists: <?php echo $card['assists']?> </div>
            <div><button onclick="window.location = 'pack.php'">Return</button></div>
        </div>
    
    </div>

</body>
</html>