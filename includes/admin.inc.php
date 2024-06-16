<?php

if (isset($_SESSION['user_id'])) {
    require_once "dbh.inc.php";
    require_once "models/reg_model.inc.php";
    require_once "models/admin.model.inc.php";
    require_once "controllers/admin.contr.inc.php";


    $rows = get_users_count($pdo);

    echo $rows;
} else {
    echo "you are not logged in!!";
}
