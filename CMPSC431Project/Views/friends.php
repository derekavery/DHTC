<!DOCTYPE html>
<html>
    <title>Friends</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/friends.css">
        <link rel="stylesheet" href="../CSS/navigation.css">
        <?php session_start();
        include('../controllers/getusers.php');
        include('../controllers/getfriends.php'); ?>
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

    <div class="body-background">

        <div class="friend-card-div"> 
            <form action="../controllers/frienduser.php" method="post">
                <div class="container">
                    <h1 class="text-white">Friend a User</h1><br>
                    <select name="userid" id="userid">
                        <option value="">--- Choose a user ---</option>
                            <?php foreach ($Users as $u) {?>
                                <option value='<?php echo $u['userID']?>'><?php echo $u['uname'] ?></option>
                            <?php } ?>
                    </select>
                    <br>
                    <button class="friend-button" type="submit">Friend</button>
                </div>
            </form>
        </div>

        
        <div class="defriend-card-div"> 
            <form action="../controllers/defrienduser.php" method="post">
                <div class="container">
                    <h1 class="text-white">Unfriend a User</h1><br>
                    <select name="userid" id="userid">
                        <option value="">--- Choose a user ---</option>
                            <?php foreach ($Friends as $u) {?>
                                <option value='<?php echo $u['userID']?>'><?php echo $u['uname'] ?></option>
                            <?php } ?>
                    </select>
                    <br>
                    <button class="unfriend-button" type="submit">Unfriend</button>
                </div>
            </form>
        </div>

        <div class="trade-card-div"> 
            <form action="trade.php" method="post">
                <div class="container">
                    <h1 class="text-white">Trade a User</h1><br>
                    <select name="userid" id="userid">
                        <option value="">--- Choose a user ---</option>
                            <?php foreach ($Friends as $u) {?>
                                <option value='<?php echo $u['userID']?>'><?php echo $u['uname'] ?></option>
                            <?php } ?>
                    </select>
                    <br>
                    <input type="hidden" name='request' value='1' required>
                    <button class="trade-button" type="submit">Trade</button>
                </div>
            </form>
        </div>

        <div class="trade-history-card-div"> 
            <form action="tradehistory.php" method="post">
                <div class="container">
                    <h1 class="text-black">Trade History</h1><br>
                    <select name="sort" id="sort">
                        <option value="">--- Sort By ---</option>
                        <option value="date ASC">Date Acending</option>
                        <option value="date DESC">Date Descending</option>
                        <option value="uname ASC">Trader Name Acending</option>
                        <option value="uname DESC">Trader Name Descending</option>
                    </select>
                    <br>
                    <button class="trade-button" type="submit">View</button>
                </div>
            </form>
        </div>
        
        
    </div>

</body>
</html>
