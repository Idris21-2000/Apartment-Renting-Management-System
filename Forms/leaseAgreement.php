<?php
require_once "../includes/config_session.inc.php";
?>

<?php
if ($_SESSION['user_type'] === 'tenant') { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/reg-form.css">
        <link rel="stylesheet" href="../css/leaseagreement.css">
        <title>Lease agreement</title>
    </head>
    <?php
    require_once "../includes/dbh.inc.php";
    require_once "../includes/models/leaseAgreement_model.inc.php";
    require_once "../includes/controllers/leaseAgreement_contr.inc.php";


    already_rented($pdo, $_SESSION['user_id']);
    $apartment = get_apartment($pdo, $_GET['id']);
    $details = get_lease_details($pdo, $_SESSION['name']);

    if (isset($_SESSION['user_id'])) {
        $tenant_name = $_SESSION['name'];
    } else {
        echo "session not initiated!!";
        die();
    }
    // Set the timezone
    date_default_timezone_set('Africa/Dar_es_Salaam');

    // Get the current date
    $startDate = date('d-m-Y');
    $staytime = 5;
    // Calculate the end date (1 year from the start date)
    $endDate = date('Y-m-d', strtotime("+$staytime months", strtotime($startDate)));
    ?>

    <body>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
        <div class="navbar">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><button onclick="goBack()">Back</button></li>
            </ul>
        </div><br><br><br>
        <div class="form-styling">
            <form action="../includes/leaseAgreement.inc.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="POST">
                <h1>Lease Agreement for <?php echo $apartment['apartment_name'] ?></h1>
                <hr><br>
                <div class="label-heads">
                    <label for=""><span>Landlord of this property: </span> <?php echo $apartment['owners_name'] ?></label>
                    <label for=""><span>Tenant to sign this agreement: </span><?php echo $tenant_name ?></label>
                    <label for=""><span>Apartment ID: </span><?php echo $apartment['id'] ?></label>
                    <label for=""><span>Apartment located at: </span><?php echo $apartment['located_at'] ?></label>
                </div><br><br>
                <div class="input-style">
                    <input type="number" placeholder="Period of rent (months)" name="stay_time">
                    <input type="text" placeholder="Enter security amount" name="security_deposit">
                </div><br><br>
                <span>Lease Term and Rent:</span><br>
                The lease term starts on <?php echo $startDate; ?> and ends on <?php echo $endDate; ?>
                The monthly rent is <?php echo $apartment['price_per_month'] ?>, payable on the first day of each month.
                Late payments will incur a fee of 25$ after of fifteen days.
                <br><br>
                <span>Security Deposit:</span><br>
                A security deposit of not less than 1500$ is required before moving in.
                The security deposit will be returned within fifteen days after the lease ends, provided no damage beyond normal wear and tear is found.
                <br><br>
                <span>Maintenance and Repairs:</span><br>
                Tenants are responsible for keeping the apartment clean and in good condition.
                Any maintenance requests or repairs must be reported promptly to the landlord.
                Tenants are responsible for the cost of repairs due to their negligence or misuse.
                <br><br>
                <span>Utilities:</span><br>
                The landlord will provide [List of Utilities Provided] (e.g., water, gas).
                Tenants are responsible for setting up and paying for [List of Utilities Tenant is Responsible For] (e.g., electricity, internet).
                <br><br>
                <span>Subletting and Guests:</span><br>
                Subletting the apartment or assigning the lease to another person is not allowed without the landlord's written consent.
                Guests may stay for a maximum of thirty days unless otherwise agreed upon with the landlord.
                Tenants are responsible for the behavior of their guests and any damage caused by them. <br><br>
                <div class="button-style">
                    <button type="submit" name="accept">Accept</button>
                    <button type="submit" name="decline">Decline</button>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php } else {
    header('location:../Dashboard/apartmentDetails.php?id=' . $_GET['id'] . '?status=error');
} ?>