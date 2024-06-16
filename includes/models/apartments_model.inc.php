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
