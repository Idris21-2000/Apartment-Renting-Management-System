<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = 'SELECT username FROM users WHERE username = :username;';

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_email(object $pdo, string $email)
{
    $query = 'SELECT email FROM users WHERE email = :email;';

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
    string $address,
    string $user_type
) {
    $query = "INSERT INTO users (fname, lname, username, email, pwd, 
        conf_pwd, phone, address, user_type) 
        VALUES (:firstname, :lastname, :username, :email, :password, 
        :conf_password, :phone, :address, :user_type);";

    $stmt = $pdo->prepare($query);

    // $options = [
    //     'const' => 12
    // ];

    // $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    // $hashed_confpassword = password_hash($conf_password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":conf_password", $conf_password);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":user_type", $user_type);

    $stmt->execute();
}
