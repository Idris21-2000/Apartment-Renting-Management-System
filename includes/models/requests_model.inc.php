<?php

declare(strict_types=1);

function grant_access(object $pdo, string $user_id)
{
    $query = "UPDATE users SET access_status = 'granted' WHERE id = :user_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $user_id);

    $stmt->execute();
}

function get_landlords(object $pdo)
{
    $query = "SELECT * FROM users WHERE user_type='landlord';";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}
