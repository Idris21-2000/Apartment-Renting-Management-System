<?php

declare(strict_types=1);

function is_input_empty(
    string $username,
    string $password,
) {
    if (
        empty($username || $password)
    ) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong(array|bool $result)
{
    if (!$result['username']) {
        return true;
    } else {
        return false;
    }
}

function user_password_wrong(string $password, string $hashed_password)
{
    if (!password_verify($password, $hashed_password)) {
        return true;
    } else {
        return false;
    }
}
