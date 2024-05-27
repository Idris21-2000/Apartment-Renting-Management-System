<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = 'SELECT username FROM customer WHERE username = :username;';

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = 'SELECT username FROM customer WHERE email = :email;';

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':email', $email);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function send_regristration_data(
    object $pdo,
    string $firstname,
    string $lastname,
    string $username,
    string $email,
    string $password,
    string $conf_password,
    string $phone,
    string $address
) {
    $query = "INSERT INTO customer (fname, lname, username, email, pwd, 
        conf_pwd, phone, address) 
        VALUES (:firstname, :lastname, :username, :email, :password, 
        :conf_password, :phone, :address);";

    $stmt = $pdo->prepare($query);

    $options = [
        'const' => 12
    ];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    $hashed_confpassword = password_hash($conf_password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashed_password);
    $stmt->bindParam(":conf_password", $hashed_confpassword);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":address", $address);

    $stmt->execute();
}
