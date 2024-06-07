<?php

declare(strict_types=1);

function get_user(object $pdo, string $username)
{
    $query = 'SELECT username FROM landlords WHERE
    username=:username;';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_apartment(object $pdo, string $apartment_name)
{
    $query = 'SELECT apartment_name FROM landlords WHERE
    apartment_name=:apartment_name;';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":apartment_name", $apartment_name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function register_user(
    object $pdo,
    string $fullname,
    string $username,
    string $phone,
    string $apartment_name,
    string $apartment_location,
    string $password
) {
    $query = "INSERT INTO landlords(fullname, username, phone, 
    apartment_name, apartment_location, pwd) VALUES(:fullname, 
    :username, :phone, :apartment_name, :apartment_location, :password);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":apartment_name", $apartment_name);
    $stmt->bindParam(":apartment_location", $apartment_location);
    $stmt->bindParam(":password", $password);

    $stmt->execute();
}
