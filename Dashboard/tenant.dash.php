<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/views/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/reg-form.css">
    <title>Document</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>

            <li><a href="">About us</a></li>
        </ul>
    </div>
    <br /><br /><br>
    <h1>Tenant Dashboard</h1>
    <hr>
    <div class="sidebar">
        <div class="dp-image">
            <img src="../assets/images/pic1.jpg" alt="profile picture of the admin">
        </div>
        <br>
        <ul>
            <li><a href="">Lease Agreement</a></li>
            <li><a href="">Payment details</a></li>
            <li><a href="apartments.php">Apartments</a></li>
            <li><a href="../forms/message.php">Message portal</a></li>
            <li><a href="../Forms/change_profile.php">Profile picture</a></li>
        </ul>
        <form action="../includes/logout.inc.php" method="POST" class="form-button">
            <button>logout</button>
        </form>
    </div>

    <?php
    user_view();
    ?>
    <br>

</body>