<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/views/llReg_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/message.css">
    <title>Registration</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="">Guest-view</a></li>
            <li><a href="">About us</a></li>
        </ul>
    </div>
    <br><br><br><br>
    <div class="reg-form">
        <form action="../includes/landlordsReg.inc.php" method="post">
            <br>
            <h1>Landlord registration</h1>
            <hr><br>
            <br>
            <input type="text" name="fullname" placeholder="Your full name">
            <input type="text" name="username" placeholder="User-name">
            <br><br>
            <input type="tel" name="phone" placeholder="Phone number">
            <input type="text" name="apartment_name" placeholder="Apartment name">
            <br /><br>
            <input type="address" name="apartment_location" placeholder="Apartment located at">
            <input type="password" name="pwd" placeholder="Password">
            <br /><br>
            <?php
            display_errors()
            ?>
            <button type="submit">Register</button><br>
            <br>
            <p><span>You have an account already? login here</span> <a href="./Login.php">Login</a></p>
        </form>
    </div>


</body>

</html>