<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $username = $_POST['username'];
        $password = $_POST['pwd'];

        require_once 'dbh.inc.php';
        require_once 'models/login_model.inc.php';
        require_once 'controllers/login_contr.inc.php';

        //error handling functions
        $errors = []; //array to store our error messages

        if (is_input_empty(
            $username,
            $password

        )) {
            $errors['empty_input'] = 'Fill in all the fields!';
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors['login_incorrect'] = 'Incorrect login info!';
        }

        if (!is_username_wrong($result) && user_password_wrong($password, $result["pwd"])) {
            $errors['login_incorrect'] = "Wrong password entered!";
        }

        require_once 'config_session.inc.php';
        if ($errors) {
            $_SESSION['login_errors'] = $errors;
            header('Location:../Authentication/Login.php');

            die();
        }

        $new_session = session_create_id();
        $sessionId = $new_session . '_' . $result['id'];
        session_id($sessionId);

        $_SESSION['user_id'] = $result["id"];
        $_SESSION['username'] = htmlspecialchars($result["username"]);

        $_SESSION['last_regeneration'] = time();

        header('location:../Authentication/Login.php?login=sucess');
        $stmt = null;
        $pdo = null;

        die();
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        die();
    }
} else {
    header('locaton:../Authentication/Login.php');
    die();
}
