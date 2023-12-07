<!DOCTYPE html>
<html>
    <title>Login</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/index.css">
    </head>

<body class='bg'>

    <div class='center'>
        <form action="../controllers/login.php" method="post">

            <div class="container">
                <h1>Login to DHTC</h1><br>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="email" id='login_email' required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id='login_psw' required>

                <input type="hidden" name='login' value='1' required>
                <button type="submit">Login</button>
            </div>
            <div style="color:white">
                <span class="psw">New to DHTC? Register <a href="register.php" style="color:white">Here</a></span>
            </div>
        </form>
    </div>

</body>
</html>