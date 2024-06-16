<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/apartments.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/apartments.css">
    <title>Apartments</title>
</head>

<body>
    <div class="navbar">
        <ul><?php
            if (isset($_SESSION['user_id'])) { ?>
                <li class="special-li">Welcome dear <?php echo $_SESSION['name']; ?></li>
            <?php } ?>
            <?php
            if (!(isset($_SESSION['user_id']))) { ?>
                <li class="special-li">You are not logged-in yet!</li>
            <?php } ?>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Authentication/Reg_form.php">Register</a></li>
            <li><a href="../Authentication/Login.php">Login</a></li>
            <li><a href="">About us</a></li>
        </ul>
    </div>
    <br><br><br>
    <div class="card">
        <?php foreach ($results as $result) : ?>
            <div class="image">
                <img src="../assets/uploads/<?php echo $result['images_url'] ?>" alt="">
                <div class="p-style">
                    <h3><?php echo $result['apartment_name'] ?></h3>
                    <p>Located at <?php echo $result['located_at'] ?></p>
                    <p>Price per month:<?php echo $result['price_per_month'] ?></p>
                </div>
                <br>
                <div class="ap-button">
                    <button>Apartment details...</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
</body>

</html>