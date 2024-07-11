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

function delete_users(object $pdo, string $user_id)
{
    $query = "DELETE FROM users WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
}

function change_admin(object $pdo, string $user_id)
{
    $query = $query = "UPDATE users SET user_type = 'admin' WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':user_id', $user_id);

    $stmt->execute();
}

function get_admin_requests(object $pdo)
{
    $query = "SELECT * FROM users WHERE user_type='other' AND access_status IS NULL;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $requests = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $requests;
}
