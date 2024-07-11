<?php
if (isset($_POST['accept'])) {
    if (isset($_GET['id'])) {
        require_once "config_session.inc.php";
        require_once "dbh.inc.php";
        require_once "models/leaseAgreement_model.inc.php";

        $apart_id = $_GET['id'];
        $apartment = get_apartment($pdo, $apart_id);
        $apartment_name = $apartment['apartment_name'];
        $landlord_name = $apartment['owners_name'];
        $apartment_id = $apartment['id'];
        $price = $apartment['price_per_month'];

        $tenant_name = $_SESSION['name'];
        $security_deposit = $_POST['security_deposit'];

        // Step 1: Extract the numeric part
        $numeric_value = preg_replace('/[^0-9]/', '', $price);

        // Step 2: Convert the string to an integer (or float if needed)
        $numeric_value = (int)$numeric_value;
        $stay_time = $_POST['stay_time'];
        $total_amount = ($stay_time * $numeric_value) . "$";

        send_leaseAgreement_data(
            $pdo,
            $apartment_name,
            $landlord_name,
            $tenant_name,
            $apartment_id,
            $stay_time,
            $total_amount,
            $security_deposit
        );

        header('location:../Forms/printAgreement.php?id=' . $apart_id);
        $stmt = null;
        $pdo = null;
        die();
    } else {
        echo "failed to pass and ID";
        die();
    }
} elseif (isset($_POST['decline'])) {
    echo "declined";
    die();
} else {
    echo "post error";
    die();
}
