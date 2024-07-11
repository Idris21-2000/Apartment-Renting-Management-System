<?php

declare(strict_types=1);

function send_message(object $pdo, string $comment, string $username, string $user_type)
{
    $query = "INSERT INTO comments (comments, username, user_type) VALUES (:comment, :username, :user_type);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':user_type', $user_type);

    $stmt->execute();
}

function get_tenant_messages(object $pdo, string $username)
{
    $query = "SELECT * FROM comments WHERE username = :username AND user_type = 'tenant';";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function get_landlord_messages(object $pdo, string $username)
{
    $query = "SELECT * FROM comments WHERE username = :username AND user_type = 'landlord';";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}

function get_messages(object $pdo)
{
    $query = "SELECT * FROM comments ORDER BY posted_at ASC;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}
