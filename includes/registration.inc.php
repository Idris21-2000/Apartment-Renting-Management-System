<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $conf_password = $_POST["conf_pwd"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    try {
        require_once './dbh.inc.php';
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
} else {
    header('Location:../Aunthetication/Reg_form');
    die();
}
