<?php

require_once "config_session.inc.php";
require_once "dbh.inc.php";
require_once "models/requests_model.inc.php";
require_once "controllers/requests_contr.inc.php";


if (isset($_POST['id'])) {

    $user_id = $_POST['id'];
    grant_access($pdo, $user_id);
    header('location:../Forms/requests.php?request=granted');
} else {
    echo "Nothing here!!";
    die();
}
