<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/dbh.inc.php";
require_once "../includes/models/leaseAgreement_model.inc.php";

$name = $_SESSION['name'];
$getid = $_GET['id'];

$details = get_lease_details($pdo, $name);
$apartments = get_apartment($pdo, $getid);
$staytime = $details['stay_time'];

// Set the timezone
date_default_timezone_set('Africa/Dar_es_Salaam');

// Get the current date
$startDate = date('d-m-Y');

// Calculate the end date
$endDate = date('d-m-Y', strtotime("+$staytime months", strtotime($startDate)));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reg-form.css">
    <link rel="stylesheet" href="../css/leaseagreement.css">
    <title>Print lease agreement</title>
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
            <li><button onclick="goBack()">Back</button></li>
        </ul>
    </div><br><br><br>
    <div class="form-styling">
        <form id="leaseForm" action="" method="POST">
            <h1>Lease Agreement for <?php echo $details['apartment_name'] ?></h1>
            <hr><br>
            <div class="label-heads">
                <label><span>Landlord of this property: </span> <?php echo $details['landlord_name'] ?></label>
                <label><span>Tenant to sign this agreement: </span><?php echo $details['tenant_name']; ?></label>
                <label><span>Apartment ID: </span><?php echo $details['apartment_id'] ?></label>
                <label><span>Total paid amount: </span><?php echo $details['total_amount'] ?></label>
            </div><br><br>
            <div class="input-style">
                <label><span>Time of stay paid (months): </span> <?php echo $details['stay_time'] ?></label>
                <label><span>Security deposit paid: </span><?php echo $details['security_deposit'] ?></label>
            </div><br><br>
            <span>Lease Term and Rent:</span><br>
            The lease term starts on <?php echo $startDate; ?> and ends on <?php echo $endDate; ?>.
            The monthly rent is <?php echo $apartments['price_per_month'] ?>, payable on the first day of each month.
            Late payments will incur a fee of 25$ after fifteen days.
            <br><br>
            <span>Security Deposit:</span><br>
            A security deposit of <?php echo $details['security_deposit'] ?> is required before moving in.
            The security deposit will be returned within five days after the lease ends, provided no damage beyond normal wear and tear is found.
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
            Guests may stay for a maximum of fifteen days unless otherwise agreed upon with the landlord.
            Tenants are responsible for the behavior of their guests and any damage caused by them. <br><br>
            <div class="signing-gap">
                <label><span>signature: </span>........................................</label>
            </div>
            <br><br>
            <div class="button-style">
                <button type="button" onclick="printForm()">Print</button>
            </div>
        </form>
    </div>
    <script>
        function printForm() {
            const printContents = document.getElementById('leaseForm').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>