<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $conf_password = $_POST["conf_pwd"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $user_type = $_POST["user_type"];

    try {
        require_once "./dbh.inc.php";
        require_once "models/reg_model.inc.php";
        require_once "controllers/reg_contr.inc.php";

        //error handling functions
        $errors = []; //array to store our error messages

        if (is_input_empty(
            $firstname,
            $lastname,
            $username,
            $email,
            $password,
            $conf_password,
            $phone,
            $address,
            $user_type
        )) {
            $errors['empty_input'] = 'Fill in all the fields!';
        }

        if (is_email_invalid($email)) {
            $errors['invalid_email'] = 'The email given is invalid!';
        }

        if (is_username_taken($pdo, $username)) {
            $errors['username_taken'] = 'Username is already taken!';
        }

        if (is_email_taken($pdo, $email)) {
            $errors['email_taken'] = 'Email is already registered!';
        }

        if (confpassword_unmatch($password, $conf_password)) {
            $errors['passwords_unmatched'] = "Confirmation password doesn't match";
        }

        require_once 'config_session.inc.php';
        if ($errors) {
            $_SESSION['registration_errors'] = $errors;

            $registrationData = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'address' => $address
            ];

            $_SESSION['registration_data'] = $registrationData;

            header('Location:../Authentication/Reg_form.php');

            die();
        }

        create_user(
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

        header('Location:../Authentication/Reg_form.php?register=success');

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
} else {
    header('Location:../Aunthetication/Reg_form.php');
    die();
}
