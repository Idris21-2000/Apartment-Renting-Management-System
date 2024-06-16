<?php

declare(strict_types=1);

function get_users_count(object $pdo)
{
    try {
        $query = "SELECT COUNT(*) AS user_count FROM users;";
        $stmt = $pdo->prepare($query);

        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        $counts = $rows['user_count'];

        return $counts;
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
}

function get_tenant_count(object $pdo)
{
    try {
        $query = "SELECT COUNT(*) AS user_count FROM users WHERE user_type='tenant';";
        $stmt = $pdo->prepare($query);

        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        $counts = $rows['user_count'];

        return $counts;
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
}

function get_apartment_count(object $pdo)
{
    try {
        $query = "SELECT COUNT(*) AS user_count FROM apartments;";
        $stmt = $pdo->prepare($query);

        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        $counts = $rows['user_count'];

        return $counts;
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
}
