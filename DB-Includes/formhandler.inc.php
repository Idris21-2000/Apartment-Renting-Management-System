<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $conf_password = $_POST["conf_pwd"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    try {
        require_once "./dbh.inc.php";
        $query = "INSERT INTO customer (fname, lname, username, email, pwd, conf_pwd, phone, address) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = $pdo->prepare($query);

        if ($password == $conf_password) {
            $stmt->execute([
                $firstname, $lastname, $username, $email, $password, $conf_password,
                $phone, $address
            ]);

            $pdo = null;
            $stmt = null;

            header("Location:../Authentication/Reg-form.php");

            die();
        } else {
            echo "Password doesn't match";
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location:../Authentication/Reg-form.php");
}
