<!DOCTYPE html>
<html>
    <title>Packs</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/pack.css">
        <link rel="stylesheet" href="../CSS/navigation.css">
        <?php session_start(); ?>
    </head>

<body>
    <div class="topnav">
        <a class="nav-element-left" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left active" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right" href="accountmanagement.php"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>

    <div class="grid-container-top">
        <div class="grid-item platinum">Platinum Pack
            <div class="buy-button"><button onclick="window.location = 'packbuyplatinum.php'">1000</button></div>
        </div>
        <div class="grid-item gold">Gold Pack
            <div class="buy-button"><button onclick="window.location = 'packbuygold.php'">800</button></div>
        </div>
        
        <div class="grid-item silver">Silver Pack
            <div class="buy-button"><button onclick="window.location = 'packbuysilver.php'">600</button></div>
        </div>  
    </div>
    <div class="grid-container-bottom"> 
        <div class="grid-item bronze">Bronze Pack
            <div class="buy-button"><button onclick="window.location = 'packbuybronze.php'">400</button></div>
        </div>
        <div class="grid-item tin">Tin Pack
            <div class="buy-button"><button onclick="window.location = 'packbuytin.php'">200</button></div>
        </div>
    </div>

</body>
</html>
