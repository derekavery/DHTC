<?php
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);
unset($_SESSION['user_currency']);
?>

<script> 
    window.location = "../views/index.php"; 
    alert('Logged Out');
</script> 