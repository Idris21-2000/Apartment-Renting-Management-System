<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/views/requests_view.inc.php";
?>

<?php
if ($_SESSION['access_status'] === "granted") { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/reg-form.css">
        <link rel="stylesheet" href="../css/crud.css">
        <title>Landlord dashboard</title>
    </head>

    <body>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <?php
        require_once "../includes/models/publish.model.inc.php";
        // require_once "../includes/models/leaseAgreement_model.inc.php";
        require_once "../includes/dbh.inc.php";
        $tenants = get_tenants($pdo, $_SESSION['name']);

        if (isset($_SESSION['user_id'])) {
            $results = display_photo($pdo, $_SESSION['user_id']);
        } ?>
        <div class="navbar">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><button onclick="goBack()">Back</button></li>
            </ul>
        </div>
        <br /><br /><br>
        <h1>Landlord Dashboard</h1>
        <hr>
        <div class="sidebar">
            <div class="dp-image">
                <?php
                if ($results['display_photo'] == null) { ?>
                    <img src="../assets/images/dpplaceholder.jpg" alt="Profile picture of logged-in admin">
                <?php } else { ?>
                    <img src="../assets/uploads/<?php echo $results['display_photo']; ?>" alt="Profile picture of logged-in admin">
                <?php } ?>
            </div>
            <br>
            <ul>
                <li><a href="">Lease Agreement</a></li>
                <li><a href="../Forms/payment_details.php">Payment details</a></li>
                <li><a href="apartments.php">Apartments</a></li>
                <li><a href="../forms/message.php">Message portal</a></li>
                <li><a href="../Forms/change_profile.php">Profile picture</a></li>
            </ul>
            <form action="../includes/logout.inc.php" method="POST" class="form-button">
                <button>logout</button>
            </form>
        </div>
        <?php
        if (!empty(get_tenants($pdo, $_SESSION['name']))) { ?>
            <h1>Tenants details</h1>
            <div class="content">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Apartment name</th>
                        <th>Tenant name</th>
                        <th>Amount of rent paid</th>
                        <th>Rental time</th>
                    </tr>
                    <?php foreach ($tenants as $tenant) : ?>
                        <tr>
                            <td><?php echo $tenant['id'] ?></td>
                            <td><?php echo $tenant['apartment_name'] ?></td>
                            <td><?php echo $tenant['tenant_name'] ?></td>
                            <td><?php echo $tenant['total_amount'] ?></td>
                            <td><?php echo $tenant['stay_time'] ?>(months)</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php } ?>

    </body>
<?php } else {
    header("location:landlord_req.dash.php");
} ?>