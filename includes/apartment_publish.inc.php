<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apartment_name = $_POST["apartment_name"];
    $located_at = $_POST["located_at"];
    $owners_name = $_POST["owners_name"];
    $no_of_rooms = $_POST["no_of_rooms"];
    $vacancy = $_POST["vacancy"];
    $price_per_month = $_POST["price_per_month"];
    $description = $_POST["description"];

    try {
        require_once "dbh.inc.php";
        require_once "models/publish.model.inc.php";
        require_once "controllers/publish_contr.inc.php";

        send_apartment_details(
            $pdo,
            $apartment_name,
            $located_at,
            $owners_name,
            $no_of_rooms,
            $vacancy,
            $price_per_month,
            $description
        );
        $stmt = null;
        $pdo = null;
        header('location:../forms/apartment_publish.php?upload=success');
        die();
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
} else {
    header('location:../forms/apartment_publish.php');
    die();
}
