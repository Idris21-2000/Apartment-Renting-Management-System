<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/config_session.inc.php";
require_once "../includes/models/publish.model.inc.php";
require_once "../includes/views/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/crud.css">
    <title>Document</title>
</head>
<?php
$photo = display_photo($pdo, $_SESSION['user_id']);
?>

<body>
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>

            <li><a href="../about.html">About us</a></li>
        </ul>
    </div>
    <br /><br /><br>
    <h1>Welcome dear <?php echo $_SESSION['name'] ?></h1>
    <hr><br>
    <div class="sidebar">
        <div class="dp-image">
            <img src="../assets/uploads/<?php echo $photo['display_photo']; ?>" alt="profile picture of the admin">
            <br>
            <p>You are logged-in as <?php echo $_SESSION['user_type']; ?></p>
        </div>
        <br>
        <ul>
            <li><a href="">Lease Agreement</a></li>
            <li><a href="../Forms/payment.php">Payment details</a></li>
            <li><a href="apartments.php">Apartments</a></li>
            <li><a href="../forms/message.php">Message portal</a></li>
            <li><a href="../Forms/change_profile.php">Profile picture</a></li>
        </ul>
        <form action="../includes/logout.inc.php" method="POST" class="form-button">
            <button>logout</button>
        </form>
    </div>
    <?php
    require_once "../includes/models/leaseAgreement_model.inc.php";
    $results = get_lease_details($pdo, $_SESSION['name']);
    ?>
    <?php
    if (!empty(get_lease_details($pdo, $_SESSION['name']))) { ?>
        <h1>Rented in apartment <?php echo $results['apartment_name']; ?></h1>
        <div class="content">
            <table class="table">
                <tr>
                    <th>Room No.</th>
                    <th>Apartment name</th>
                    <th>Landlord name</th>
                    <th>Amount of rent paid</th>
                    <th>Rental time</th>
                </tr>
                <tr>
                    <td><?php echo $results['id'] ?></td>
                    <td><?php echo $results['apartment_name'] ?></td>
                    <td><?php echo $results['landlord_name'] ?></td>
                    <td><?php echo $results['total_amount'] ?></td>
                    <td><?php echo $results['stay_time'] ?>(months)</td>
                </tr>
            </table>
        </div>
    <?php } ?>

</body>