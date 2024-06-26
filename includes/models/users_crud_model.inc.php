<?php

declare(strict_types=1);

function get_users(object $pdo)
{
    $query = "SELECT * FROM users;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function get_tenants(object $pdo)
{
    $query = "SELECT * FROM users WHERE user_type='tenant';";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $tenants = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $tenants;
}

function get_landlord_request(object $pdo)
{
    $query = "SELECT * FROM users WHERE user_type='landlord' AND access_status IS NULL;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $requests = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $requests;
}
