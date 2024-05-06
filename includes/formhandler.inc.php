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
        $query = "INSERT INTO customer (fname, lname, username, email, pwd, 
        conf_pwd, phone, address) 
        VALUES (:firstname, :lastname, :username, :email, :password, 
        :conf_password, :phone, :address);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":conf_password", $conf_password);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);

        $pdo = null;
        $stmt = null;

        header("Location:../Authentication/Reg-form.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location:../Authentication/Reg_form.php");
}
