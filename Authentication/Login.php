<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/views/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/message.css">
    <title>Login</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="">Guest-view</a></li>
            <li><a href="">About us</a></li>
        </ul>
    </div>
    <br><br>
    <br><br>
    <div class="form">
        <form action="../includes/login.inc.php" method="post">
            <br>
            <h1>Login</h1>
            <hr>
            <br><br>
            <input type="text" name="username" placeholder="Enter username"><br>
            <br><br>
            <input type="password" name="pwd" placeholder="Enter password"><br>
            <?php
            display_errors()
            ?>
            <br>
            <button type="submit">Login</button><br><br>
            <p>Forgot password? click here <a href="">reset</a></p>
        </form>
    </div>
</body>

</html>