<?php
function getUserTableAffiliation($pdo, $userId, $tables)
{
    foreach ($tables as $table => $result) {
        $sql = "SELECT COUNT(*) FROM $table WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            return $result;
        }
    }
    return null; // User does not belong to any table
}

// Example usage
try {
    $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userId = 1; // The user ID you want to check

    // Define the tables and corresponding results
    $tables = [
        'tableA' => 'User belongs to table A',
        'tableB' => 'User belongs to table B',
        'tableC' => 'User belongs to table C'
    ];

    $result = getUserTableAffiliation($pdo, $userId, $tables);

    if ($result) {
        echo $result;
    } else {
        echo "User does not belong to any specified table.";
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
