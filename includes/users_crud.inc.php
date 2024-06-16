<?php

try {
    require_once "dbh.inc.php";
    require_once "models/users_crud_model.inc.php";
    require_once "controllers/users_crud_contr.inc.php";

    $results = get_users($pdo);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    die();
}
