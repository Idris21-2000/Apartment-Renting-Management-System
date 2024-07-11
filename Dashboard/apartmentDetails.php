<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/dbh.inc.php";
require_once "../includes/models/apartments_model.inc.php";
?>

<?php
if (isset($_SESSION['user_id']) || isset($_SESSION['name'])) { ?>

    <?php
    if (isset($_GET['id'])) { ?>

        <?php
        $apartments = get_apartments($pdo, $_GET['id']);
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/apartmentDetails.css">
            <link rel="stylesheet" href="../css/reg-form.css">
            <title>All about this apartment</title>
        </head>

        <body>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <div class="navbar">
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <!-- <li><a href="">Guest-view</a></li> -->
                    <li><button onclick="goBack()">Back</button></li>
                </ul>
            </div>
            <br /><br /><br>
            <div class="main-card">
                <h1 class="header">Apartment Details</h1>
                <div class="lease-card">
                    <div class="apart-details">
                        <h1>All you need to know about <?php echo $apartments['apartment_name']; ?>;</h1>
                        <hr><br>
                        <p><span>Apartment name:</span> <?php echo $apartments['apartment_name']; ?></p>
                        <p><span>Owner's name:</span> <?php echo $apartments['owners_name']; ?> </p>
                        <p><span>Price per month:</span> <?php echo $apartments['price_per_month']; ?></p>
                        <p><span>Available rooms:</span> <?php echo $apartments['vacancy']; ?></p><br>
                        <p><span>Apartment description:</span></p>
                        <p><?php echo $apartments['description']; ?></p>
                    </div>
                    <div class="apart-attach">
                        <br>
                        <img src="../assets/uploads/<?php echo $apartments['images_url']; ?>" alt="">
                    </div>
                </div>
                <div class="rent-button">
                    <a href="../Forms/leaseAgreement.php?id=<?php echo htmlspecialchars($apartments['id']); ?>">
                        <button>Rent this apartment</button></a>
                </div>
            </div>
        </body>

        </html>
    <?php } else {
        echo "Your attempt has failed";
    } ?>

<?php } else {
    echo "You are not logged-in";
} ?>