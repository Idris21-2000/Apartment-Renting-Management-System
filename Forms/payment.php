<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/dbh.inc.php";
require_once "../includes/models/leaseAgreement_model.inc.php";
?>

<?php
if (!empty(get_lease_details($pdo, $_SESSION['name']))) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/reg-form.css">
        <link rel="stylesheet" href="../css/crud.css">
        <title>Payment details</title>
    </head>
    <?php

    $results = get_lease_details($pdo, $_SESSION['name']);
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
        </div>
        <br /><br /><br>
        <table class="table">
            <caption>
                <h2>Payment Details</h2>
            </caption>
            <tr>
                <th>Id</th>
                <th>Total amount</th>
                <th>Duration paid</th>
                <th>Security deposit</th>
                <th>Payment status</th>
            </tr>
            <tr>
                <td><?php echo $results['id'] ?></td>
                <td><?php echo $results['total_amount'] ?></td>
                <td><?php echo $results['stay_time'] ?></td>
                <td><?php echo $results['security_deposit'] ?></td>
                <td>Paid</td>
            </tr>
        </table>

    </body>

    </html>
<?php } else {
    echo "no data";
} ?>