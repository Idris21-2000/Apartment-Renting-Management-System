<?php

declare(strict_types=1);

function get_apartments(object $pdo)
{
    $query = "SELECT * FROM apartments;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}
