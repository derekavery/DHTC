<!DOCTYPE html>
<html>
    <title>Account Managment</title>
    
    <head>
    <link rel="stylesheet" href="../CSS/accountmanagement.css">
    <link rel="stylesheet" href="../CSS/navigation.css">
        <?php session_start(); 
        include('../controllers/useraccount.php');
        ?>
    </head>

<body>
    <div class="topnav">
        <a class="nav-element-left" href="dashboard.php"><?php echo 'Dashboard'?></a>
        <a class="nav-element-left" href="pack.php"><?php echo 'Packs'?></a>
        <a class="nav-element-left" href="collection.php"><?php echo 'Collection'?></a>
        <a class="nav-element-left" href="firepit.php"><?php echo 'Firepit'?></a>
        <a class="nav-element-left" href="friends.php"><?php echo 'Friends'?></a>
        <a class="nav-element-left" href="cardlvl.php"><?php echo 'Card Leveling'?></a>
        <a class="nav-element-right active" href="accountmanagement.php"><?php echo $_SESSION['user_name']?></a>
        <a class="info-element">Currency: <?php echo $_SESSION['user_currency']?></a>
    </div>

    <div class="card-div">
        <form action="../controllers/edituser.php" method="post">

            <div class="container">
                <h1>Edit User Info</h1><br>

                <label for="email"><b>Email: </b></label>
                <input type="text" value="<?php echo $resultArray['email'] ?>" placeholder="<?php echo $resultArray['email'] ?>" name="email" id='register_email'>
                <br>

                <label for="name"><b>Name: </b></label>
                <input type="text" value="<?php echo $resultArray['uname'] ?>" placeholder="<?php echo $resultArray['uname'] ?>" name="uname" id='register_name'>
                <br>

                <label for="psw"><b>Password: </b></label>
                <input type="password" placeholder="Enter New Password" name="psw" id='register_psw'>
                <br>

                <button type="submit">Update</button>
            </div>
        </form>

    </div> 

    <div class="bottom-card-div">
        <form action="../controllers/deleteuser.php" method="post">

            <div class="container">
                <h1>Delete Account?</h1><br>

                <button type="submit">Delete</button>
            </div>
        </form>

    </div> 

    <div class="logout-card-div">
        <form action="../controllers/logout.php" method="post">

            <div class="container">
                <h1>Logout of Account?</h1><br>

                <button type="submit">Logout</button>
            </div>
        </form>

    </div> 

    
</body>
</html>
