<?php

declare(strict_types=1);

function is_input_empty(
    string $fullname,
    string $username,
    string $phone,
    string $apartment_name,
    string $apartment_location,
    string $password
) {
    if (
        empty($fullname) || empty($username) || empty($phone) || empty($apartment_name)
        || empty($apartment_location) || empty($password)
    ) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username)
{
    if (get_user($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_apartment_exist(object $pdo, string $apartment_name)
{
    if (get_apartment($pdo, $apartment_name)) {
        return true;
    } else {
        return false;
    }
}
