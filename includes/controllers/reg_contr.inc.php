<?php

declare(strict_types=1);

function is_input_empty(
    string $firstname,
    string $lastname,
    string $username,
    string $email,
    string $password,
    string $conf_password,
    string $phone,
    string $address,
    string $user_type
) {
    if (
        empty($firstname || $lastname || $username || $email || $password
            || $conf_password || $phone || $address || $user_type)
    ) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_taken(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function confpassword_unmatch(string $password, string $conf_password)
{
    if (!($password === $conf_password)) {
        return true;
    } else {
        return false;
    }
}

function create_user(
    object $pdo,
    string $firstname,
    string $lastname,
    string $username,
    string $email,
    string $password,
    string $conf_password,
    string $phone,
    string $address,
    string $user_type
) {
    send_regristration_data(
        $pdo,
        $firstname,
        $lastname,
        $username,
        $email,
        $password,
        $conf_password,
        $phone,
        $address,
        $user_type
    );
}
