<?php

require_once "./dbh.inc.php";

function send_image(object $pdo, $fileNameNew)
{
    $query = "INSERT INTO images(image_url) VALUES(:pathname);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':pathname', $fileNameNew);

    $stmt->execute();
}
