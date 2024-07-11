<?php

declare(strict_types=1);

function get_apartments_details(object $pdo)
{
    $query = "SELECT * FROM apartments;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $apartmments = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $apartmments;
}

function get_apartments(object $pdo, string $apart_id)
{
    $query = "SELECT * FROM apartments WHERE id = :apart_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':apart_id', $apart_id);

    $stmt->execute();

    $apartment = $stmt->fetch(PDO::FETCH_ASSOC);
    return $apartment ? $apartment : [];
}
