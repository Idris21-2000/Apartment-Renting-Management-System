<?php

$password = "1234";

$options = [
    'const' => 12
];

$hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

if (password_verify($password, $hashed_password)) {
    echo "Verification successfully" . "_" . $hashed_password . "_" . $password;
} else {
    echo "Not matched";
}
