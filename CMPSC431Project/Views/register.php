<!DOCTYPE html>
<html>
    <title>Register</title>
    
    <head>
        <link rel="stylesheet" href="../CSS/index.css">
    </head>

<body class='bg'>

    <div class='center'>
        <form action="../controllers/login.php" method="post">

            <div class="container">
                <h1>Register an account for DHTC</h1><br>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id='register_email' required>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="uname" id='register_name' required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id='register_psw' required>
    
                <input type="hidden" name='register' value='1' required>
                <button type="submit"> Register</button>
            </div>
            <div style="color:white">
                <span class="psw">Already have an account? <a href="index.php" style="color:white">Login</a></span>
            </div>
        </form>
    </div>

</body>
</html>
