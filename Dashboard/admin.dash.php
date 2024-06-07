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
    <title>Admin panel</title>
</head>

<body>
    <div class="navbar">
        <?php
        user_view();
        ?>
    </div>
    <div class="sidebar">
        <div class="dp-image">
            <img src="../assets/images/pic1.jpg" alt="profile picture of the admin">
        </div>
        <br>
        <ul>
            <li><a href="">Admin stats</a></li>
            <li><a href="">Admin stats</a></li>
            <li><a href="../uploadImages.php">Publish Apartments</a></li>
            <li><a href="">Admin stats</a></li>
            <li><a href="">Admin stats</a></li>
        </ul>
        <form action="../includes/logout.inc.php" method="POST">
            <button>logout</button>
        </form>
    </div>
    <div class="content">
        <div class="box-0">
            <h3>Users</h3>
            <hr><br>
            <p>40</p>
        </div>
        <div class="box-1">
            <h3>Landlords</h3>
            <hr><br>
            <p>20</p>
        </div>
        <div class="box-2">
            <h3>Apartments</h3>
            <hr><br>
            <p>10</p>
        </div>
        <div class="box-3">
            <h3>Requests</h3>
            <hr><br>
            <p>30</p>
        </div>
    </div>
</body>

</html>