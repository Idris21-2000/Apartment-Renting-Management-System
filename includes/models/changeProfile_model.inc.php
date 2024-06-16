<?php

declare(strict_types=1);

function display_photo(object $pdo, string $userID)
{
    $query = "SELECT display_photo FROM users WHERE id= :userID;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':userID', $userID);

    $stmt->execute();
    $display_photo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $display_photo;
}

function change_display_photo(object $pdo, string $fileNameNew, string $userID)
{
    $query = "UPDATE users SET display_photo = :display_photo WHERE id = :userID;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':display_photo', $fileNameNew);
    $stmt->bindParam(':userID', $userID);

    $stmt->execute();
}
