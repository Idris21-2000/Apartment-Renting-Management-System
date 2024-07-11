<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/dbh.inc.php";
require_once "../includes/models/leaseAgreement_model.inc.php";
?>

<?php
if (!empty(get_rented_details($pdo, $_SESSION['name']))) { ?>
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
    $results = get_rented_details($pdo, $_SESSION['name']);
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
            <?php foreach ($results as $result) : ?>
                <tr>
                    <td><?php echo $result['id'] ?></td>
                    <td><?php echo $result['total_amount'] ?></td>
                    <td><?php echo $result['stay_time'] ?></td>
                    <td><?php echo $result['security_deposit'] ?></td>
                    <td>Paid</td>
                </tr>
            <?php endforeach; ?>
        </table>

    </body>

    </html>
<?php } else {
    echo "no data";
} ?>