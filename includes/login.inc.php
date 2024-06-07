<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $username = $_POST['username'];
        $password = $_POST['pwd'];

        require_once 'dbh.inc.php';
        require_once 'models/login_model.inc.php';
        require_once 'views/login_view.inc.php';
        require_once 'controllers/login_contr.inc.php';

        $tables = [
            'apartments',
            'customer',
            'images',
            'landlords',
        ];

        //error handling functions
        $errors = []; //array to store our error messages

        if (is_input_empty(
            $username,
            $password

        )) {
            $errors['empty_input'] = 'Fill in all the fields!';
        }

        $result = get_users($pdo, $username);
        $fetched_pwd = user_password($pdo, $username);

        if (is_username_wrong($result)) {
            $errors['login_incorrect'] = 'Incorrect login info!';
        }

        if (!is_username_wrong($result) && user_password_wrong($password, $fetched_pwd['pwd'])) {
            $errors['login_incorrect'] = "Wrong password entered!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION['login_errors'] = $errors;
            header('Location:../Authentication/Login.php');

            die();
        }

        // $new_session = session_create_id();
        // $sessionId = $new_session . '_' . $result['id'];
        // session_id($sessionId);

        // echo $sessionId;
        // die();

        $_SESSION['user_id'] = htmlspecialchars($result["ID"]);
        $_SESSION['user_type'] = htmlspecialchars($result["user_type"]);

        $_SESSION['name'] = htmlspecialchars($result["fname"]);

        $_SESSION['last_regeneration'] = time();

        sleep(2);

        return_view();
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
