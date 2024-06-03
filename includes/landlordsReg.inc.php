<?php

declare(strict_types=1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $apartment_name = $_POST["apartment_name"];
    $apartment_location = $_POST["apartment_location"];
    $password = $_POST["pwd"];


    try {
        require_once "dbh.inc.php";
        require_once "models/llReg_model.inc.php";
        require_once "controllers/llReg_contr.inc.php";

        //Error handlers 
        $errors = [];

        if (is_input_empty(
            $fullname,
            $username,
            $phone,
            $apartment_name,
            $apartment_location,
            $password
        )) {
            $errors['empty_input_error'] = "Fill all the fields!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors['username_taken_error'] = "Username is already exist!";
        }
        if (is_apartment_exist($pdo, $apartment_name)) {
            $errors['apartment_exist_error'] = "Apartment name already exist!";
        }

        require_once 'config_session.inc.php';

        if (!(empty($errors))) {
            $_SESSION['landlords_reg_errors'] = $errors;

            header('Location:../Authentication/landlordsReg.php');
            die();
        }

        register_user(
            $pdo,
            $fullname,
            $username,
            $phone,
            $apartment_name,
            $apartment_location,
            $password
        );

        header('Location:../Authentication/landlordsReg.php?register=success');

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
