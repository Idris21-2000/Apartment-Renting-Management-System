<?php

declare(strict_types=1);

function send_message(object $pdo, string $comment, string $username)
{
    $query = "INSERT INTO comments (comments, username) VALUES (:comment, :username );";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':comment', $comment);
    $stmt->bindParam(':username', $username);

    $stmt->execute();
}
