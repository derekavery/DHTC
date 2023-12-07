<!DOCTYPE html>
<html>
    <title>Dashboard</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/dashboard.css">
        <link rel="stylesheet" href="../CSS/navigation.css">
        <?php session_start(); ?>
    </head>

<body>

    <div class="topnav">
        <a class="nav-element-left active" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right" href="accountmanagement.php"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>

    
    <div class="sector" id="NW">
       <a class="links" href="pack.php"> Card Packs </a>
    </div>
    <div class="sector" id="NE">
        <a class="links" href="collection.php"> Collection </a>
    </div>
    <div class="sector" id="SW">
        <a class="links" href="firepit.php"> Fire Pit </a>
    </div>
    <div class="sector" id="SE">
        <a class="links" href="friends.php"> Friends </a>
    </div>



</body>
</html>