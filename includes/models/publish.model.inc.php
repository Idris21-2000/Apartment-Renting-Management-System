<?php

declare(strict_types=1);

function get_apartments(object $pdo)
{
    $query = "SELECT * FROM apartments;";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $apartmments = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $apartmments;
}

function get_landlords(object $pdo)
{
    $query = "SELECT * FROM users WHERE user_type = 'landlord';";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $landlords = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $landlords;
}

function set_apartment_image(object $pdo, string $fileNameNew, string $apartment_name)
{
    $query = "UPDATE apartments SET images_url = :image_url WHERE apartment_name = :apartment_name;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':image_url', $fileNameNew);
    $stmt->bindParam(':apartment_name', $apartment_name);

    $stmt->execute();
}

function change_display_photo(object $pdo, string $fileNameNew, string $userID)
{
    $query = "UPDATE users SET display_photo = :display_photo WHERE id = :userID;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':display_photo', $fileNameNew);
    $stmt->bindParam(':userID', $userID);

    $stmt->execute();
}

function display_photo(object $pdo, string $userID)
{
    $query = "SELECT * FROM users WHERE id= :userID;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':userID', $userID);

    $stmt->execute();
    $display_photo = $stmt->fetch(PDO::FETCH_ASSOC);
    return $display_photo;
}


function send_apartment_details(
    object $pdo,
    string $apartment_name,
    string $located_at,
    string $owners_name,
    string $no_of_rooms,
    string $vacancy,
    string $price_per_month,
    string $description
) {
    $sql = "INSERT INTO apartments(apartment_name, located_at, owners_name, no_of_rooms,
    vacancy, price_per_month, description) VALUES(:apartment_name, :located_at, :owners_name, :no_of_rooms,
    :vacancy, :price_per_month, :description);";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":apartment_name", $apartment_name);
    $stmt->bindParam(":located_at", $located_at);
    $stmt->bindParam(":owners_name", $owners_name);
    $stmt->bindParam(":no_of_rooms", $no_of_rooms);
    $stmt->bindParam(":vacancy", $vacancy);
    $stmt->bindParam(":price_per_month", $price_per_month);
    $stmt->bindParam(":description", $description);

    $stmt->execute();
}

function get_tenants(object $pdo, string $landlord)
{
    $query = "SELECT * FROM leaseagreement WHERE landlord_name = :landlord;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":landlord", $landlord);
    $stmt->execute();

    $results = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $results;
}
